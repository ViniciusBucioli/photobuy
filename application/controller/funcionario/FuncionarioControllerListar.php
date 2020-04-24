<?php
    require_once '../model/FuncionarioModel.php';

    header("Access-Control-Allow-Origin: *");
    // $cpf = $_POST['CPF'];
    // $nome = $_POST['Nome'];
    $word = $_GET['word'];

    // $respostaModel = FuncionarioModel::selectAll();
    // $respostaModel = FuncionarioModel::selectByID();
    // $respostaModel = FuncionarioModel::selectByCPF($cpf);
    // $respostaModel = FuncionarioModel::selectByName($nome);

    $funcionarioModel = new FuncionarioModel();
    $searchResult = $funcionarioModel->searchByName($word);
    if($searchtaModel == false)
        header('error');
    else
        echo $searchResult;
?>