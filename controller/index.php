<?php
require_once "../vendor/autoload.php";
session_init();

$controller = new Controller\Classes\Controller;
//retorna os arquívos de controller
include_once $controller->returnControlPage($_GET["control_page"]);