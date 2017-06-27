<?php

require "lib.inc.php";
require "db.inc.php";
?>
<html>
<head>
  <title>Каталог товаров</title>
</head>
<body>
<h1>Ваша корзина</h1>
<?php
$goods = myBasket();
if (!is_array($goods)) {
  echo 'eror';
  exit;
}
if ($goods) {
  echo '<p>Вернуться в <a href="catalog.php">Каталог</a></p>';
}
else {
  echo '<p>Корзина пуста. Вернитесь в <a href="catalog.php">Каталог</a></p>';
}
?>
<p> Товаров в <a href="basket.php">корзине</a>: <?php print $count ?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <th>N п/п</th>
    <th>Название</th>
    <th>Автор</th>
    <th>Год публикации</th>
    <th>Цена, руб.</th>
    <th>Количество</th>
    <th>Удалить</th>
  </tr>
  <?php
  $i = 1;
  $sum = 0;
  if ($goods === FALSE) {
    echo 'eror!';
  }
  foreach ($goods as $item) {
    ?>
    <tr>
      <td><?php print $i ?></td>
      <td><?php print $item['title'] ?></td>
      <td><?php print $item['author'] ?></td>
      <td><?php print $item['pubyear'] ?></td>
      <td><?php print $item['price'] ?></td>
      <td><?php print $item['quantity'] ?></td>
      <td><a href="delete_from_basket.php?id=<?= $item['id'] ?>"> Удалить</a>
      </td>
    </tr>
    <?php
    $i++;
    $sum += $item['price'] * $item['quantity'];
  }
  ?>
</table>
<p> Всего товаров в корзине на сумму:<?php print $sum ?> руб.</p>
<div align="center">
  <input type="button" value="Оформить заказ!"
         onclick="location.href='orderform.php'"/>
</div>
</body>
</html>