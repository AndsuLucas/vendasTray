<?php
use Helpers\Classes\Message;
use Model\Salesman;

$salesman_model     = new Salesman();

$salesman_form_data = sanitize([
    "id_salesman" => "i"
]);

$id_salesman = $salesman_form_data["id_salesman"]; 
$result      = $salesman_model->delete("id", $id_salesman);

if (!$result) {
    Message::setMessage(
        "O correu algum erro tente mais tarde.",
        "error"
    );
    header("location: /?page=salesman_list");
    return;

}

Message::setMessage(
    "Registro deletado com sucesso",
    "sucess"
);
header("location: /?page=salesman_list");