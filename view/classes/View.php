<?php 
namespace View\Classes;
//transformar em uma classe abstrata. 
class View
{   
    private $view_paths = [
        "edit_salesman"     => "view/salesman/edit_salesman.php",
        "salesman_list"     => "view/salesman/salesman_list.php",
        "salesman_register" => "view/salesman/salesman_register.php",
        "sale_register"     => "view/sale/sale_register.php",
        "sale_list"         => "view/sale/sale_list.php",
        "show_sale"         => "view/sale/show_sale.php",
        "report_log"        => "view/sale/boxclosing_report.php",
        "login"             => "view/auth/login.php",
        "create_user"       => "view/auth/create_user.php"
    ];

    public function returnViewPage(string $view = null)
    {   
       if (\array_key_exists($view, $this->view_paths)) {
           return $this->view_paths[$view];
       }
       return $this->view_paths["sale_list"];

    }


}