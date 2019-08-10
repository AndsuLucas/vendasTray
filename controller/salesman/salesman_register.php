<?php 
use Helpers\Classes\Message;
use Model\Salesman;

$salesman_model = new Salesman();
//limpando dados vindo de POST e retornando eles limpos.
$salesman_form_data = sanitize([
    "name"  => "s",
    "email" => "e"
]);

if (isEmpty($salesman_form_data)){
    Message::setMessage(
        "Todos os dados devem ser preenchidos", 
        "error"
    );
    header("location: /?page=salesman_register");
    return;
}

$insert_result = $salesman_model->insert($salesman_form_data);

if (!$insert_result){
    Message::setMessage(
        "Ocorreu um erro. Talvez o e-mail já exista."
        , "error"
    );
    header("location: /?page=salesman_register");
    return;
}
Message::setMessage(
    "Dados preenchidos com sucesso!"
    , "success"
);
header("location: /?page=salesman_list");