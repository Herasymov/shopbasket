<?php
header('Content-Type: text/html; charset=utf-8');
define('HOST', 'localhost');
define('LOGIN', 'root');
define('PASSWORD', 'root');
define('NAME', 'shop');
global $link;
$basket = array();
$count = 0;
$link = mysqli_connect(HOST, LOGIN, PASSWORD, NAME) or die(mysqli_connect_error());
