<?php
    require_once '../../model/PortifolioModel.php';
    require '../header.php';
    
    if(
        empty($_POST['id'])|| 
        empty($_POST['arquivo']) &&
        empty($_POST['nome'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $arquivo = $_POST['arquivo'];
    $nome = $_POST['nome'];

    $portifolioModel = new PortifolioModel();
    $portifolioModel->setId($id);
    $portifolioModel->setArquivo($arquivo);
    $portifolioModel->setNome($nome);

    if($portifolioModel->atualizar()){
        // Produto criado
        http_response_code(200);
        // tell the user
        echo json_encode(array("message" => "Portifolio atualizado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o portifolio."));
    }
?>