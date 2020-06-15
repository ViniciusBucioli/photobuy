<?php
    require_once '../../model/ProdutoModel.php';
    
    header("Access-Control-Allow-Origin: *");
    
    if(
        empty($_GET['id'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dado incompleto."));
        exit();
    }
    $id = $_GET['id'];
    $produtoModel = new ProdutoModel();
    if($produtoModel->getById($id)) {
        http_response_code(201);
        echo $produtoModel->getResultJSON();
    } else {
        http_response_code(503);
        json_encode(array("message" => "Não foi possível obter os dados."));
    }
?>