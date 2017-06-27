<?php

require "lib.inc.php";
require "db.inc.php";
$id = clearInt($_GET['id']);
$quantity = 1;
basketInit();
add2Basket($id, $quantity);
header('Location: catalog.php');
exit;