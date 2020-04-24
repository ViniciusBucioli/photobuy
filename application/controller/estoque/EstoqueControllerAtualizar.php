<?php
    require_once '../../model/EstoqueModel.php.php';
    require '../header.php';
    
    if(
        empty($_POST['qtd']) &&
        empty($_POST['quantidade'])
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

    if($produto->atualizar()) {

        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Produto atualizado."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o produto."));
    }
?>