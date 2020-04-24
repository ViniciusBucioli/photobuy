<?php
    require_once '../../model/PontoModel.php.php';
    require '../header.php';
    
    if(
        empty($_POST['id']) ||
        empty($_POST['Matricula']) ||
        empty($_POST['Entrada']) &&
        empty($_POST['Saida']) 
       ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $matricula_funcionario = $_POST['matricula'];
    $entrada_funcionario = $_POST['entrada'];
    $saida_funcionario = $_POST['saida'];

    $pontoModel = new PontoModel();
    $pontoModel->setId($id);
    $pontoModel->setMatriculaFuncionario($matricula_funcionario);
    $pontoModel->setEntrada($entrada_funcionario);
    $pontoModel->setSaida($saida_funcionario);

    if($pontoModel->atualizar()){
        // Produto criado
        http_response_code(200);
        // tell the user
        echo json_encode(array("message" => "Ponto atualizado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o ponto."));
    }
?>