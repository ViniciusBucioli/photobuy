<?php
    require_once '../../model/PortifolioModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['Arquivo']) &&
        empty($_POST['Nome'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $arquivo = $_POST['Arquivo'];
    $nome = $_POST['Nome'];

    $portifolioModel = new PortifolioModel();
    $portifolioModel->setArquivo($arquivo);
    $portifolioModel->setNome($nome);

    if($portifolioModel->cadastrar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Portifolio criado."));
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o portifolio."));
    }
?>