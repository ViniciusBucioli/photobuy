<?php
    require_once '../../model/ServicoModel.php.php';
    require '../header.php';
    
    if(
        empty($_POST['id']) ||
        empty($_POST['oferecido_por']) ||
        empty($_POST['categoria']) ||
        empty($_POST['preco']) ||
        empty($_POST['desconto'])&&
        empty($_POST['nome'])
    ) {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $nome = $_POST['oferecido_por'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $nome = $_POST['nome'];

    $servico = new ServicoModel();
    $servico->setId($id);
    $servico->setNome($oferecido_por);
    $servico->setCategoria($categoria);
    $servico->setPreco($preco);
    $servico->setDescricao($descricao);
    $servico->setNome($nome);

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