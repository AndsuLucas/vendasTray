<?php
namespace Controller\Classes;

class Controller
{
    private $control_paths = [
        "salesman_delete"   => "./salesman/salesman_delete.php",
        "salesman_register" => "./salesman/salesman_register.php",
        "salesman_update"   => "./salesman/salesman_update.php",
    ];

    public function returnControlPage(string $page_name)
    {   
        
        if (\array_key_exists($page_name, $this->control_paths)) {
            return $this->control_paths[$page_name];
        }
    
    }
}