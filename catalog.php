<?php
require "db.inc.php";
require "lib.inc.php";
basketInit();
$goods = selectALLItems();
?>
<html>
<head>
  <title>Каталог товаров</title>
</head>
<body>
<p> Товаров в <a href="basket.php">корзине</a>: <?php print $count; ?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <th>Название</th>
    <th>Автор</th>
    <th>Год публикации</th>
    <th>Цена, руб.</th>
    <th>В корзину</th>
  </tr>
  <?php
  if ($goods === FALSE) {
    echo 'eror!';
  }
  foreach ($goods as $item) {
    ?>
    <tr>
      <td><?php print $item['title'] ?></td>
      <td><?php print $item['author'] ?></td>
      <td><?php print $item['pubyear'] ?></td>
      <td><?php print $item['price'] ?></td>
      <td><a href="add2basket.php?id=<?= $item['id'] ?>"> В корзину</a></td>

    </tr>
    <?php
  }
  ?>
</table>
</body>
</html>