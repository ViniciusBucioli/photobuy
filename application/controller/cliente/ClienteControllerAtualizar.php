<?php
    require_once '../../model/ClienteModel.php.php';
    require '../header.php';

    if(
        empty($_POST['id']) ||
        empty($_POST['CPF']) ||
        empty($_POST['Nome']) ||
        empty($_POST['Email']) ||
        empty($_POST['Telefone']) &&
        empty($_POST['Endereco'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }
    $id = $_POST['id'];
    $CPF = $_POST['CPF'];
    $nome_cliente = $_POST['Nome'];
    $email_cliente = $_POST['Email'];
    $telefone_cliente = $_POST['Telefone'];
    $endereco_cliente = $_POST['Endereco'];

    $clienteModel = new ClienteModel();
    $cliente->setCpf($contato);
    $cliente->setNome($nome);
    $cliente->setEmail($email);
    $cliente->setTelefone($telefone);
    $cliente->setEndereco($endereco);

    if($produto->atualizar()) {

        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Cliente atualizado."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o cliente."));
    }
         
?>