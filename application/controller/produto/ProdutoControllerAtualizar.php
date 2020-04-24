<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';
    
    if(
        empty($_POST['id']) ||
        empty($_POST['nome']) ||
        empty($_POST['categoria']) ||
        empty($_POST['preco']) ||
        empty($_POST['descricao'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $produtoModel = new ProdutoModel();
    $produtoModel->setId($id);
    $produtoModel->setNome($nome);
    $produtoModel->setCategoria($categoria);
    $produtoModel->setPreco($preco);
    $produtoModel->setDescricao($descricao);

    if($produtoModel->atualizar()) {

        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Produto atualizado."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o produto."));
    }
?>