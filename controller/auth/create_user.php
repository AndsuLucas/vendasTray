<?php
    $user = new Model\Auth;
    use Helpers\Classes\Message;

    $user_form_data = sanitize([
        "email" => "e"
    ]);
    $user_form_data["password"] = sha1($user_form_data["password"]);
    if (isEmpty($user_form_data)) {
        Message::setMessage("Preencha todos os campos", "error");
        header("location: /?page=create_user");
        return;
    }
    
    $result = $user->insert($user_form_data);

    if (!$result) {
        Message::setMessage(
            "Ocorreu um erro. Verifique se o e-mail já está cadastrado.",
            "error"
        );
        header("location: /?page=create_user");
        return;
    }
    
    Message::setMessage(
        "Cadastro efetuado com sucesso",
        "success"
    );
    header("location: /?page=login");
    



    