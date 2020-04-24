<?php
    require_once '../../model/FuncionarioModel.php';
    require '../header.php';
    
    if(
        empty($_POST['id']) ||
        empty($_POST['cpf']) ||
        empty($_POST['nome']) ||
        empty($_POST['cargo']) ||
        empty($_POST['hora']) ||
        empty($_POST['salario']) ||
        empty($_POST['telefone']) ||
        empty($_POST['endereco']) ||
        empty($_POST['meta']) ||
        empty($_POST['comissao']) &&
        empty($_POST['vendas'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];
    $CPF_funcionario = $_POST['cpf'];
    $nome_funcionario = $_POST['nome'];
    $cargo_funcionairo = $_POST['cargo'];
    $hora_trabalho_funcionario = $_POST['hora'];
    $salario_funcionario = $_POST['salario'];
    $telefone_funcionario = $_POST['telefone'];
    $endereco_funcionario = $_POST['endereco'];
    $meta_funcionario = $_POST['meta'];
    $comissao_funcionario = $_POST['comissao'];
    $vendas_funcionario = $_POST['vendas'];

    $novoFuncionario = new FuncionarioModel();
    $novoFuncionario->setId($id);
    $novoFuncionario->setCpf($CPF_funcionario);
    $novoFuncionario->setNome($nome_funcionario);
    $novoFuncionario->setCargo($cargo_funcionairo);
    $novoFuncionario->setHoraTrabalho($hora_trabalho_funcionario);
    $novoFuncionario->setSalario($salario_funcionario);
    $novoFuncionario->setTelefone($telefone_funcionario);
    $novoFuncionario->setEndereco($endereco_funcionario);
    $novoFuncionario->setMeta($meta_funcionario);
    $novoFuncionario->setComissao($comissao_funcionario);
    $novoFuncionario->setVendas($vendas_funcionario);

    if($novoFuncionario->atualizar()){
        // Produto criado
        http_response_code(201);
        // tell the user
        echo json_encode(array("message" => "Funcionario atualizado."));
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível atualizar o funcionario."));
    }
        header('');
?>