<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';
    require '../../Managers/ImageManager.php';
    require '../session/checkSession.php';

    if($REQUEST != 'PUT') {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Apenas PUT."));
        exit();
    }

    if(
        empty($_PUT['id']) ||
        empty($_PUT['nome']) ||
        empty($_PUT['categoria']) ||
        empty($_PUT['preco']) ||
        empty($_PUT['descricao'])
    ) {
        // Bad request
        http_response_code(400);
        $RETURN["message"] = "Dados incompletos.";
        echo json_encode($RETURN);
        exit();
    }
    
    $id = $_PUT['id'];
    $nome = $_PUT['nome'];
    $categoria = $_PUT['categoria'];
    $preco = $_PUT['preco'];
    $descricao = $_PUT['descricao'];

    if (isset($_FILES['imgFile'])) {

        $file = $_FILES['imgFile'];
        $imageManager = new ImageManager();

        $imgPath = $imageManager->UpdateProductImg($id, $file);
    } else {
        $imgPath = null;
    }

    $produtoModel = new ProdutoModel();
    $produtoModel->setId($id);
    $produtoModel->setNome($nome);
    $produtoModel->setCategoria($categoria);
    $produtoModel->setPreco($preco);
    $produtoModel->setDescricao($descricao);
    $produtoModel->setImg($imgPath);

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