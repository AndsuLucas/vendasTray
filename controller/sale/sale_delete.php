<?php
    $sale_model = new Model\Sale();
    $id_sale    = preg_replace("/[^0-9]/", trim(" "), $_POST["id"]);
    $result     = $sale_model->delete("id", $id_sale);

    if (!$result) {
        Helpers\Classes\Message::setMessage(
            "Ocorreu um erro. Tente novamente mais tarde", "error"
        );
        header("location: /?page=sale_list");
        return;
    }

    Helpers\Classes\Message::setMessage(
        "Registro deletado com sucesso", "success"
    );
    header("location: /?page=sale_list");



