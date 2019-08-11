<?php
namespace Model;

use PDO;
//classe responsável por fazer a conexão com o banco de dados
abstract class Database
{
    public static function connect()
    {   
        $host     = DATABASE["host"];
        $charset  = DATABASE["charset"]; 
        $dbname   = DATABASE["dbname"];
        $user     = DATABASE["user"];
        $password = DATABASE["password"];
        $db       = new PDO("mysql:host=$host;charset=$charset;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
