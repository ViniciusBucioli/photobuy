<?php
    require_once '../../model/EstoqueModel.php.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['QTD_Movimento']) &&
        empty($_POST['QTD'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $qtd_movimento_estoque = $_POST['qtd'];
    $quantidade = $_POST['quantidade'];

    $novoEstoque = new EstoqueModel();
    $novoEstoque->setMovimentoEstoque($qtd_movimento_estoque);
    $novoEstoque->setQuantidade($quantidade);

    if($novoEstoque->cadastrar()){
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Estoque criado."));
        
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o estoque."));
    }
?>