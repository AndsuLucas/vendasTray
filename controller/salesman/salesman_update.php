<?php
use Helpers\Classes\Message;
use Model\Salesman;

$salesman_model     = new Salesman();

$salesman_form_data = sanitize([
    "name"  => "s",
    "email" => "e",
    "id"    => "i"
]);
    
$id_salesman = $salesman_form_data["id"];
unset($salesman_form_data["id"]);
    
if (isEmpty($salesman_form_data)) {
    Message::setMessage(
        "Todos os dados devem ser preenchidos",
        "danger"
    );
    header("location: /?page=salesman_list");
    return;
}

$update_result = $salesman_model->update("id", $id_salesman, $salesman_form_data);

if (!$update_result) {
    Message::setMessage(
        "Ocorreu um erro. Talvez este e-mail já esteja cadastrado.",
        "danger"
    );
    header("location: /?page=salesman_list");
    return;
}

Message::setMessage(
    "Registro atualizado com sucesso.",
    "success"
);
header("location: /?page=salesman_list");