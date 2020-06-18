<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';

    if(empty($_DELETE['id'])){
        // Bad request
        // http_response_code(400);
        http_response_code(503);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }
    
    $id = $_DELETE['id'];
    $produtoModel = new ProdutoModel();

    if($produtoModel->delete($id)) {
        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Produto deletado."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível deletar o produto."));
    }
?>