<?php
    require_once '../model/ServicoModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['oferecido_por']) ||
        empty($_POST['categoria']) ||
        empty($_POST['preco']) ||
        empty($_POST['descricao'])&&
        empty($_POST['nome'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $nome = $_POST['Nome'];
    $categoria = $_POST['Categoria'];
    $preco = $_POST['Preco'];
    $descricao = $_POST['Descricao'];
    $oferecidopor = $_POST['oferecido_por'];

    $novoServico = new ServicoModel();
    $novoServico->setNome($nome);
    $novoServico->setCategoria($categoria);
    $novoServico->setPreco($preco);
    $novoServico->setDescricao($descricao);
    $novoServico->setOferecidopor($oferecidopor);
    

    if(ServicoModel::cadastrar($novoServico)){
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