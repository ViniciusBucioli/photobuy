<?php
    require_once '../../model/ClienteModel.php';
    require '../header.php';

    if($REQUEST != 'PUT') {
        // Bad request
        // http_response_code(400);
        
        echo json_encode(array("message" => "Apenas PUT."));
        exit();
    }
    if(
        empty($_PUT['id']) ||
        empty($_PUT['endereco']) ||
        empty($_PUT['nome']) ||
        empty($_PUT['email']) ||
        // empty($_PUT['password']) ||
        empty($_PUT['tel']) 
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }
    $id = $_PUT['id'];
    $endereco = $_PUT['endereco'];
    $nome = $_PUT['nome'];
    $email = $_PUT['email'];
    // $password = $_PUT['pass'];
    $tel = $_PUT['tel'];

    $cliente = new ClienteModel();
    $cliente->setId($id);
    $cliente->setEndereco($endereco);
    $cliente->setNome($nome);
    $cliente->setEmail($email);
    $cliente->setTel($tel);
    // $cliente->setPass($password);

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