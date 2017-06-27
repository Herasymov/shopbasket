<?php
require "lib.inc.php";
require "db.inc.php";
$author = clearStr($_POST['author']);
$title = clearStr($_POST['title']);
$pubyear = clearStr($_POST['pubyear']);
$price = clearStr($_POST['price']);
if (!addItemToCatalog($title, $author, $pubyear, $price)) {
  echo 'error';
}
else {
  header('Location: add2cat.php');
  exit;
}