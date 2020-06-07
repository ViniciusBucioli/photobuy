<?php
    require_once '../../model/ClienteModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['username']) ||
        empty($_POST['CPF']) ||
        empty($_POST['Nome']) ||
        empty($_POST['Email']) ||
        empty($_POST['Telefone']) ||
        empty($_POST['Endereco'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $user_name = $_POST['username'];
    $cpf = $_POST['CPF'];
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $endereco = $_POST['Endereco'];

    $novoCliente = new ClienteModel();
    $novoCliente->setUserName($user_name);
    $novoCliente->setCpf($cpf);
    $novoCliente->setNome($nome);
    $novoCliente->setEmail($email);
    $novoCliente->setTelefone($telefone);
    $novoCliente->setEndereco($endereco);

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