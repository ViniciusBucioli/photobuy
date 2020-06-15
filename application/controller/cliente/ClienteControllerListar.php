<?php
    require_once '../../model/ClienteModel.php';

    header("Access-Control-Allow-Origin: *");
    if(isset($_GET['word'])) {
        $word = $_GET['word'];
    } else {
        $word = '';
    }

    $clienteModel = new ClienteModel();
    if($clienteModel->searchByName($word)){
        echo $clienteModel->getResultJSON();
    }
    else{
        echo $searchResult;
    }

    


?>