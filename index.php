<?php 
require_once "./vendor/autoload.php";
/* links para as funcionalidades estão na navbar */
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
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="/" class="navbar-brand">Gerenciamento de Vendas</a>
            <div class="collapes narvbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vendas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a target="_blank" class="dropdown-item" href="/?page=sale_list">Listagem</a>
                            <a target="_blank" class="dropdown-item" href="/?page=sale_register">Registrar Venda</a>
                            <a target="_blank" class="dropdown-item" href="mail/report_day.php">Fechar o caixa</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vendedores
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a target="_blank" class="dropdown-item" href="/?page=salesman_list">Listagem</a>
                            <a target="_blank" class="dropdown-item" href="/?page=salesman_register">Registrar Vendedor</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if ($_SESSION["authenticate"]): ?>  
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestão
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a target="_blank" class="dropdown-item" href="/?page=create_user">Cadastrar Usuário</a>
                                <a class="dropdown-item" href="controller/?control_page=logout">Sair</a>
                            </div>
                        <?php else: ?>
                            <a href="/?page=login" class="nav-link">Fazer Login</a>
                        <?php endif ?>
                    </li>
                </ul>
                
            </div>
        </nav>
    </header>
    <main class="container pt-5">    
        <
        <?php 
            //rendeniza as views
            require $view->returnViewPage($_GET["page"] ?? null) 
        ?>
    
    </main>
</body>
    <script src="public/js/bootstrap.js"></script>
</html>
