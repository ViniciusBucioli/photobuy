<?php
    require_once '../../model/ClienteModel.php';
    require '../header.php';

    if($REQUEST != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['endereco']) ||
        empty($_POST['name']) ||
        empty($_POST['tel']) ||
        empty($_POST['password']) ||
        empty($_POST['email'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $endereco = $_POST['endereco'];
    $nome = $_POST['name'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $novoCliente = new ClienteModel();
    $novoCliente->setNome($nome);
    $novoCliente->setEmail($email);
    $novoCliente->setTel($tel);
    $novoCliente->setEndereco($endereco);
    $novoCliente->setPass($password);

    if($novoCliente->cadastrar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Cliente cadastrado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o produto."));
    }
         
?>