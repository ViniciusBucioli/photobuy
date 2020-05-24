<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';
    require '../InserirImagem.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
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
        
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    if (isset($_FILES['imgFile'])) {
        $path = 'Produtos/';
        $imgPath = $path . $_FILES['imgFile']['name'];
        $errorMessage = InsertImg($_FILES['imgFile'], $path);
        if ($errorMessage != null) {
            echo $errorMessage;
            exit();
        }
    } else {
        $imgPath = null;
    }

    $produtoModel = new ProdutoModel();
    $produtoModel->setNome($nome);
    $produtoModel->setCategoria($categoria);
    $produtoModel->setPreco($preco);
    $produtoModel->setDescricao($descricao);
    $produtoModel->setImg($imgPath);

    if($produtoModel->cadastrar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Produto criado."));
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o produto."));
    }
?>