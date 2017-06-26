<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require"lib.inc.php";
require"db.inc.php";
	$id=clearInt($_GET['id']);
	$quantity = 1;
	basketInit();
	add2Basket($id, $quantity);
	header('Location: catalog.php');
	exit;
?>