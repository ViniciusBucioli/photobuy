<?php
    require_once '../../model/ProdutoModel.php';
    
    header("Access-Control-Allow-Origin: *");
    //$nome = $_GET['Nome'];
    //$categoria = $_GET['Categoria'];
    $word = $_GET['word'];

    // $respostaModel = ProdutoModel::selectAll();
    // $respostaModel = ProdutoModel::selectByNome($nome);
    // $respostaModel = ProdutoModel::selectByCategory($categoria);

    // Alterei para searchByNome pois era a mesma coisa do method search no ProdutoModel
    $produtoModel = new ProdutoModel();
    $searchResult = $produtoModel->searchByNome($word);
    if($searchResult == false)
        //header('');
        echo 'error';
    else
        echo $searchResult;
?>