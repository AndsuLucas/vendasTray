<?php 
namespace Model;
use Model\Model;

class Auth extends Model
{
    protected $table = "user";


    public function login($email, $password)
    {
       
        $sql   = "SELECT * FROM user WHERE email = ? AND password = ?";
        $login = $this->database->prepare($sql);
        $login->bindValue(1, $email);
        $login->bindValue(2, $password);
        $login->execute();

        return $login->rowCount();
    }
}