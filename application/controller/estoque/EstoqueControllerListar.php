<?php
    require_once '../model/EstoqueModel.php';
    require '../header.php';

    header("Access-Control-Allow-Origin: *");
    // $respostaModel = EstoqueModel::selectAll();
    $word = $_GET['word'];
    
    $estoqueModel = new EstoqueModel();
    $searchResult = $estoqueModel->searchByName($word);
    if($respostaModel == false)
        // header('');
        echo 'error';
    else
        echo $respostaModel;
?>