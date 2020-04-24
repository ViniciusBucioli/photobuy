<?php
    require_once '../../model/ProdutoModel.php';
    
    header("Access-Control-Allow-Origin: *");
    // $matriculaFuncionario = $_POST['Matricula'];
    $word = $_GET['word'];

    
    $pontoModel = new PontoModel();
    $searchResult = $pontoModel->searchByName($word);
    if($searchResult == false)
        header('error');
    else
        echo $searchResult;
?>