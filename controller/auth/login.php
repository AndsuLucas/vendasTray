<?php
    $auth = new Model\Auth;
    use Helpers\Classes\Message;
    $user_form_data = sanitize([
        "email" => "e"
    ]);
    
    $auth_row = $auth->login($user_form_data["email"], sha1($user_form_data["password"]));
    
    if ($auth_row == 0) {
        Message::setMessage("Login ou senha inválidos.", "error");
        header("location: /?page=login");
        return;
    }
    
    $_SESSION["authenticate"] = true;
    Message::setMessage("Login efetuado com sucesso.", "success");
    header("location: /");
    





    