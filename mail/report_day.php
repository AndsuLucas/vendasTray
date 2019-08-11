<?php
    require_once "../vendor/autoload.php";
    
    $sale_report_model = new Model\Sale;
    $mail_report       = new PHPMailer\PHPMailer\PHPMailer;   
    
    $current_date_time = date("Y-m-d H:m:s");
    $current_date      = date("Y-m-d");
    
    $register_total_sale   = $sale_report_model->boxClosingSaveLog(
        $current_date_time, $current_date
    ); 
    $total_sales           = $sale_report_model->returnLastBoxClosing();
    
    
    if (!$register_total_sale){
        Helpers\Classes\Message::setMessage(
            "Ocorreu um erro. Provavelmente o caixa já foi fechado.", "error"
        );

        header("location: /?page=boxclosingreport");
        return;
    }
    
  
    /* 
        TESTADO E FUNCIONANDO PARA O SEGUINTE HOST: smtp.gmail.com 
        DEMAIS DADOS COMO username, password, setFrom e setAdress
        FORAM EDITADOS E SÃO MERAMENTE ILUSTRATIVOS POR MOTIVOS DE SEGURANÇA. 

    */
    
    /* CONFIGURAÇÕES */
    
    $mail_report->isSMTP();
    $mail_report->SMTPOptions = [
        "ssl" => [
            "verify_peer"       => false,
            "verify_peer_name"  => false,
            "allow_self_signed" => true
        ]
    ];
    $mail_report->Username   = "sistemadegerenciamento@net.br";
    $mail_report->Password   = "password";
    $mail_report->SMTPDebug  = 0;
    $mail_report->Host       = "servidor.smpt";
    $mail_report->SMTPSecure = "tls";
    $mail_report->Port       = 587;
    $mail_report->SMTPAuth   = true;
    
    /* -------------*/
    
    /* ENVIO DE E-EMAIL EM SÍ */

    $mail_report->setFrom("enviadopor@net.com", "Fechamento do caixa"); //quem envia
    $mail_report->addAddress("emailalvo@net.com"); //quem recebe
    $mail_report->Subject    = "Referente a data: ".$current_date; //assunto
    $mail_report->Body       = "Total de vendas: ".$total_sales;   //conteúdo
    
    /*----------------------*/
    
    if (!$mail_report->send()) {
        
        Helpers\Classes\Message::setMessage(
            "Ocorreu um erro. Por favor cheque o servidor smtp.", "error"
        );

        header("location: /");
        return;
    }

    Helpers\Classes\Message::setMessage(
        "Relatório enviado com sucesso.", "success"
    );

    header("location: /");
    return;




    