<?php
    require_once '../../model/PontoModel.php.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['Matricula']) ||
        empty($_POST['Entrada']) &&
        empty($_POST['Saida']) 
       ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $matricula_funcionario = $_POST['Matricula'];
    $entrada_funcionario = $_POST['Entrada'];
    $saida_funcionario = $_POST['Saida'];

    $pontoModel = new PontoModel();
    $pontoModel->setMatriculaFuncionario($matricula_funcionario);
    $pontoModel->setEntrada($entrada_funcionario);
    $pontoModel->setSaida($saida_funcionario);

    if($pontoModel->cadastrar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Ponto criado."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o Ponto."));
    }
?>