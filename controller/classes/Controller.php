<?php
namespace Controller\Classes;

class Controller
{
    private $control_paths = [
        "salesman_delete"   => "salesman/salesman_delete.php",
        "salesman_register" => "salesman/salesman_register.php",
        "salesman_update"   => "salesman/salesman_update.php",
        "sale_register"     => "sale/sale_register.php",
        "sale_delete"       => "sale/sale_delete.php",
        "login"             => "auth/login.php",
        "create_user"       => "auth/create_user.php",
        "logout"            => "auth/logout.php"
    ];

    public function returnControlPage(string $page_name)
    {   
        
        if (\array_key_exists($page_name, $this->control_paths)) {
            return $this->control_paths[$page_name];
        }
    
    }
}