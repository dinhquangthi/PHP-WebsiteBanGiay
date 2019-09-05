<?php
require_once __DIR__ . "/user/autoload/autoload.php";
$key = intval(getInput('key'));

unset($_SESSION['cart'][$key]);
header("location: cart.php");


?>
