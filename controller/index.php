<?php
require_once "../vendor/autoload.php";
session_init();

$controller = new Controller\Classes\Controller;
$sale = new Model\Sale();
$date = date("Y-m-d H:i:s");
$result = $sale->returnBoxClosingValue();
var_dump($result);
die();
//include_once $controller->returnControlPage($_GET["control_page"]);


