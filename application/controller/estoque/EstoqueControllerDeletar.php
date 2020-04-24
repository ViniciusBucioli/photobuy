<?php
    require_once '../../model/EstoqueModel.php.php';
    require '../header.php';

    if(
        empty($_POST['id'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $estoqueModel = new EstoqueModel();

    if($estoqueModel->delete($id)){
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Estoque criado."));
        
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o estoque."));
    }
?>