<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
?>

<?php
require"lib.inc.php";
require"db.inc.php";
$author= clearStr($_POST['author']);
$title= clearStr($_POST['title']);
$pubyear= clearStr($_POST['pubyear']);
$price= clearStr($_POST['price']);
if(!addItemToCatalog($title, $author, $pubyear, $price)){
	echo 'errrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrooooooooooorrrr';
}else{
	header('Location: add2cat.php');
	exit;
}
?>