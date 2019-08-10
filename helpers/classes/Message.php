<?php
namespace Helpers\Classes;

abstract class Message
{
    public static function setMessage($msg, $type)
    {
        if ($type === "error") {
            
            $_SESSION["msg"] = "<p class='alert alert-danger'>".$msg."</p>";
            return;
        }
        
        $_SESSION["msg"] = "<p class='alert alert-success'>".$msg."</p>";

    }
    public static function returnMessage()
    {
        if (isset($_SESSION) && isset($_SESSION["msg"])){
            
            $msg = $_SESSION["msg"];
            unset($_SESSION["msg"]);
            return $msg;
        }
    }
}