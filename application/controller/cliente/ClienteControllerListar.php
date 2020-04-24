<?php
    require_once '../model/ClienteModel.php';

    header("Access-Control-Allow-Origin: *");
    // $cpf = $_POST['CPF'];
    // $nome = $_POST['Nome'];
    $word = $_GET['word'];

    $clienteModel = new ClienteModel();
    $searchResult = $clienteModel->searchByName($word);
    if($searchResult == false)
        // header('');
        echo 'error';
    else
        echo $searchResult;
?>