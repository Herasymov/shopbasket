<?php

require "lib.inc.php";
require "db.inc.php";

$n = clearStr($_POST['name']);
$p = clearStr($_POST['phone']);
$e = clearStr($_POST['email']);
$a = clearStr($_POST['address']);
$oid = $basket['orderid'];
$customer = selectCustoms($e);
if (empty($customer)) {
  saveCustomer($n, $p, $e, $a);
}
saveOrder($customer);

?>
<html>
<head>
  <title>Сохранение данных заказа</title>
</head>
<body>
<p>Ваш заказ принят.</p>
<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>