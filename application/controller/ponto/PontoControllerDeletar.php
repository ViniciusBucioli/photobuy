<?php
    require_once '../../model/PontoModel.php';
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

    $pontoModel = new PontoModel();

    if($pontoModel->delete()){
        // Produto criado
        http_response_code(200);
        // tell the user
        echo json_encode(array("message" => "Ponto deletado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível deletar o ponto."));
    }
?>