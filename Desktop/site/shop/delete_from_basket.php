<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require"lib.inc.php";
require"db.inc.php";

$id= clearInt($_GET['id']);
if($id){
	deleteItemFromBasket($id);
	header('Location: basket.php');
	exit;
}
?>