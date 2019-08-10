<?php 
namespace View\Classes;
//transformar em uma classe abstrata. 
class View
{   
    private $view_paths = [
        "edit_salesman"     => "./view/salesman/edit_salesman.php",
        "salesman_list"     => "./view/salesman/salesman_list.php",
        "salesman_register" => "./view/salesman/salesman_register.php"
    ];

    public function returnViewPage(string $view = null)
    {   
       if (\array_key_exists($view, $this->view_paths)) {
           return $this->view_paths[$view];
       }
       return $this->view_paths["salesman_list"];

    }


}