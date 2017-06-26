<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require"lib.inc.php";
require"db.inc.php";
?>
<html>
<head>
	<title>Заказ</title>
</head>
<body>
	<h1>Оформление заказа</h1>
	<form action="saveorder.php" method="post">
		<p>Заказчик: <input type="text" name="name" size="50"></p>
		<p> Email заказчик: <input type="text" name="email" size="50"></p>
		<p>Телефон для связи: <input type="text" name="phone" size="50"></p>
		<p>Адресс доставки: <input type="text" name="address" size="50"></p>
	<div>
		<input type="submit" value="Заказать" onclick="location.href='saveorder.php'"/>
	</div>
</form>
</body>
</html>