<?php
    require_once "../vendor/autoload.php";
    $saleReport = new Model\Sale;
    $mailReport     = new PHPMailer\PHPMailer\PHPMailer;         
    /* 
        TESTADO E FUNCIONANDO PARA O SEGUINTE HOST: smtp.gmail.com 
        DEMAIS DADOS COMO username, password, setFrom e setAdress
        FORAM EDITADOS E SÃO MERAMENTE ILUSTRATIVOS POR MOTIVOS DE SEGURANÇA. 

    */
    
    /* CONFIGURAÇÕES */
    
    $mailReport->isSMTP();
    $mailReport->SMTPOptions = [
        "ssl" => [
            "verify_peer"       => false,
            "verify_peer_name"  => false,
            "allow_self_signed" => true
        ]
    ];
    $mailReport->Username   = "sistemadegerenciamento@net.br";
    $mailReport->Password   = "password";
    $mailReport->SMTPDebug  = 0;
    $mailReport->Host       = "servidor.smpt";
    $mailReport->SMTPSecure = "tls";
    $mailReport->Port       = 587;
    $mailReport->SMTPAuth   = true;
    
    /* -------------*/
    
    /*ENVIO DE E-EMAIL EM SÍ */

    $mailReport->setFrom("enviadopor@net.com", "Fechamento do caixa"); //quem envia
    $mailReport->addAddress("emailalvo@net.com"); //quem recebe
    $mailReport->Subject    = "Referente ao dia: ".date("Y-m-d"); //assunto
    $mailReport->Body       = "Total de vendas: ";   //conteúdo
    
    /*----------------------*/
    
    if (!$mailReport->send()) {
        echo "erro";
    }


    