<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'DELETE') {
        http_response_code(400);
       
        echo json_encode(array("message" => "Apenas DELETE."));
        exit();
    }

    // if(
    //     empty($_DELETE['id'])
    // ) {
    //     // Bad request
    //     http_response_code(400);
    //     echo json_encode(array("message" => "Dados incompletos."));
    //     exit();
    // }
    

    echo json_encode(array("message" => "Objetivo atingido."));
    
    // $id = $_DELETE['id'];
    // echo 'id = ' . $id . '\n';
    // $produtoModel = new ProdutoModel();

    // if($produtoModel->delete($id)) {
    //     // Produto criado
    //     http_response_code(200);
    //     echo json_encode(array("message" => "Produto deletado."));
    // } else {
    //     // set response code - 503 service unavailable
    //     http_response_code(503);
    //     echo json_encode(array("message" => "Não foi possível deletar o produto."));
    // }
?>