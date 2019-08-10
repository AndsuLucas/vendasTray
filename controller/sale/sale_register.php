<?php 
    use Helpers\Classes\Message;
    $sale_model     = new Model\Sale();
    $sale_form_data = sanitize([
       "salevalue"   => "f",
       "id_salesman" => "i" 
    ]);
        
    if (!$sale_form_data["salevalue"] > 0) {
        Message::setMessage("Valor inválido!", "error");
        header("location: /?page=sale_register");
        return;
        
    }

    if (isEmpty($sale_form_data)) {
        Message::setMessage("Todos os campos devem ser preenchidos!", "error");
        header("location: /?page=sale_register");
        return;
    }

    $result = $sale_model->registerSale($sale_form_data);

    if (!$result) {
        Message::setMessage("Ocorreu um erro. Tente novamente mais tarde.", "error");
        header("location: /?page=sale_register");
        return;
    }
    
    Message::setMessage("Venda registrada com sucesso", "success");
    header("location: /?page=sale_register");
    
