<?php
    require_once '../../model/ClienteModel.php.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['CPF']) ||
        empty($_POST['Nome']) ||
        empty($_POST['Email']) ||
        empty($_POST['Telefone'])&&
        empty($_POST['Endereco'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $CPF = $_POST['CPF'];
    $nome_cliente = $_POST['Nome'];
    $email_cliente = $_POST['Email'];
    $telefone_cliente = $_POST['Telefone'];
    $endereco_cliente = $_POST['Endereco'];

    $novoCliente = new ClienteModel();
    $novoCliente->setCpf($contato);
    $novoCliente->setNome($nome);
    $novoCliente->setEmail($email);
    $novoCliente->setTelefone($telefone);
    $novoCliente->setEndereco($endereco);

    if($novoCliente->cadastrar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Produto criado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o produto."));
    }
         
?>