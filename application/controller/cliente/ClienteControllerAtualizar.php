<?php
    require_once '../../model/ClienteModel.php';
    require '../header.php';

    if(
        empty($_POST['id']) ||
        empty($_POST['username']) ||
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
    $user_name = $_POST['username'];
    $cpf = $_POST['CPF'];
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $endereco = $_POST['Endereco'];

    $cliente = new ClienteModel();
    $cliente->setId($id);
    $cliente->setUserName($user_name);
    $cliente->setCpf($cpf);
    $cliente->setNome($nome);
    $cliente->setEmail($email);
    $cliente->setTelefone($telefone);
    $cliente->setEndereco($endereco);

    if($cliente->atualizar()) {

        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Cliente atualizado."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o cliente."));
    }
         
?>