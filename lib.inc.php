<?php
function clearInt($data) {
  return abs((int) $data);
}

function clearStr($data) {
  global $link;
  return mysqli_real_escape_string($link, trim(strip_tags($data)));
}

function basketInit() {
  session_start();
  global $basket, $count;
  if (!isset($_SESSION['basket'])) {
    $basket = [];
  }
  else {
    $basket = unserialize($_SESSION['basket']);
    $count = count($basket);
  }
}

function add2basket($id, $q) {
  global $basket;
  $basket[$id] += $q;
  $_SESSION['basket'] = serialize($basket);
}

function deleteItemFromBasket($id) {
  global $basket;
  basketInit();
  if ($basket[$id] > 1) {
    $basket[$id] -= 1;
    $_SESSION['basket'] = serialize($basket);
    print_r($basket[$id]);
  }
  else {
    unset($basket[$id]);
    $_SESSION['basket'] = serialize($basket);
  }
}

function addItemToCatalog($title, $author, $pubyear, $price) {
  global $link;
  print_r($link);
  $sql = "INSERT INTO catalog(
						title,
						author,
						pubyear,
						price)
			VALUES(?, ?, ?, ?)";
  if (!$stmt = mysqli_prepare($link, $sql)) {
    return FALSE;
  }
  mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return TRUE;

}

function selectALLItems() {
  global $link;
  $sql = 'SELECT id, title, author, pubyear, price
	    FROM catalog';
  if (!$result = mysqli_query($link, $sql)) {
    return FALSE;
  }
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  return $items;
}

function selectCustoms($e) {
  global $link;
  $sql = "SELECT id from customers WHERE email = '$e' LIMIT 1";
  $res = mysqli_query($link, $sql);
  $items = mysqli_fetch_assoc($res);
  return $items;
}

function saveOrder($order) {
  global $link, $basket;
  $goods = myBasket();
  $stmt = mysqli_stmt_init($link);
  $sql = 'INSERT INTO orders(
						title,
						author,
						pubyear,
						price,
						quantity,
						customer,
						datetime)
			VALUES(?, ?, ?, ?, ?, ?, ?)';
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    return FALSE;
  }
  else {
    foreach ($goods as $item) {
      $dt = (int) time();
      mysqli_stmt_bind_param($stmt, 'ssiiisi', $item['title'], $item['author'], $item['pubyear'], $item['price'], $item['quantity'], $order['id'], $dt);
      mysqli_stmt_execute($stmt);
    }
  }
  mysqli_stmt_close($stmt);
  session_unset('basket', '', time() - 3600);
  return TRUE;
}

function saveCustomer($name, $phone, $email, $address) {
  global $link;
  $stmt = mysqli_stmt_init($link);
  $sql = 'INSERT INTO customers(
						name,
						phone,
						email,
						address,
						datetime)
			VALUES(?, ?, ?, ?, ?)';
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    return FALSE;
  }
  else {
    $dt = (int) time();
    mysqli_stmt_bind_param($stmt, 'sissi', $name, $phone, $email, $address, $dt);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);
  return TRUE;
}

function myBasket() {
  global $link, $basket;
  basketInit();
  $goods = array_keys($basket);
  if (count($goods)) {
    $ids = implode(",", $goods);
  }
  else {
    $ids = 0;
  }
  $sql = "SELECT id, title, author, pubyear, price
	    FROM catalog
	    WHERE id IN ($ids)";
  if (!$result = mysqli_query($link, $sql)) {
    return FALSE;
  }
  $items = result2array($result);
  mysqli_free_result($result);
  return $items;
}

function result2array($data) {
  global $basket;
  $arr = array();
  while ($row = mysqli_fetch_assoc($data)) {
    $row['quantity'] = $basket[$row['id']];
    $arr[] = $row;
  }
  return $arr;
}
