<?php
    require_once '../model/ServicoModel.php';

    header("Access-Control-Allow-Origin: *");
    // $nome = $_POST['Nome'];
    // $categoria = $_POST['Categoria'];
    $word = $_GET['word'];

    // $respostaModel = ServicoModel::selectAll();
    // $respostaModel = ServicoModel::selectByNome($nome);
    // $respostaModel = ServicoModel::selectByCategory($categoria);

    $servicoModel = new ServicoModel();
    $searchResult = $servicoModel->searchByNome($word);
    if($searchResult == false)
        // header('');
        echo 'error';
    else
        echo $searchResult;
?>