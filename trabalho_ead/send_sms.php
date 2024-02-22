<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados foram enviados via POST
    if(isset($_POST['tel']) && isset($_POST['msg'])) {
        // Dados do formulário
        $telefone = $_POST['tel'];
        $mensagem = $_POST['msg'];

        // Chamar a função para enviar SMS
        enviarSMS($telefone, $mensagem);
    } else {
        echo "Por favor, forneça um número de telefone e uma mensagem.";
    }
}

function enviarSMS($cep) {
    
    
    //$apiKey = "a1paTDBiYUtmam9HVGxsbGZHNVJNU1Fqa2xqYWlDUWo=";
    $url = "https://api.nvoip.com.br/v2/sms?napikey=" . $apiKey;

    $data = array(
        'cep' => $cep,
        'message' => $mensagem,
        'flashSms' => false
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result == false) {
        echo "Erro ao enviar SMS.";
    } else {
        echo "SMS enviado com sucesso.";
    }
}
?>
