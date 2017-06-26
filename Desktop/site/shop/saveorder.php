<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require"lib.inc.php";
require"db.inc.php";

$n= clearStr($_POST['name']);
$p= clearStr($_POST['phone']);
$e= clearStr($_POST['email']);
$a= clearStr($_POST['address']);
$oid= $basket['orderid'];
if (empty(selectCustoms($e))){
	saveCustomer($n, $p, $e, $a);
}
saveOrder(selectCustoms($e));

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