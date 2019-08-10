<?php 
require_once "./vendor/autoload.php";

$view = new View\Classes\View; 
session_init();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <script src="./public/js/jquery.js"></script>
    <title>Gerenciador de Vendas</title>
</head>
<body>
    <main class="container">    
        <?php
            require $view->returnViewPage($_GET["page"] ?? null);
        ?>
    </main>
</body>
</html>