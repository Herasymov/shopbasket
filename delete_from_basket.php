<?php

require "lib.inc.php";
require "db.inc.php";

$id = clearInt($_GET['id']);
if ($id) {
  deleteItemFromBasket($id);
  header('Location: basket.php');
  exit;
}
