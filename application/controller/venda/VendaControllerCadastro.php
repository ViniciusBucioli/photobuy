<?php

    require_once '../../model/VendaModel.php.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // Bad request
    http_response_code(400);
    
    echo json_encode(array("message" => "Apenas POST."));
    exit();
    }
        
    if(
    empty($_POST['id_produto']) ||
    empty($_POST['data']) ||
    empty($_POST['preco']) ||
    empty($_POST['desconto']) &&
    empty($_POST['total']) 
    ){
    // Bad request
    http_response_code(400);
    echo json_encode(array("message" => "Dados incompletos."));
    exit();
    }

    $id_produto = $_POST['id_produto'];
    $data_venda = $_POST['data'];
    $preco_venda = $_POST['preco'];
    $desconto_venda = $_POST['desconto'];
    $preco_total_venda = $_POST['total'];

    $vendaModel = new VendaModel();
    $vendaModel->setIdProduto($id_produto);
    $vendaModel->setData($data);
    $vendaModel->setPreco($preco);
    $vendaModel->setDesconto($desconto);
    $vendaModel->setPrecoTotal($total);

    if($novoProduto->cadastrar()){
        
        http_response_code(201);
        
        echo json_encode(array("message" => "Produto criado."));
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível cria o produto."));
    }

// //Conexao
// require "db.php";

// //SQL Command
// $sqlinsert = "INSERT INTO Venda (id_venda, data_venda, preco_venda, desconto_venda, preco_total_venda) VALUES (NULL , '$data_venda', '$preco_venda', '$desconto_venda', '$preco_total_venda')";
// $sqlinsert = "INSERT INTO Venda_Produto (id_produto, id_venda, desconto_venda_produto, preco_venda_produto) VALUES ('$id_produto', '$id_venda', '$desconto_venda_produto', '$preco_venda_produto')";

// //envio da query para o BD
// mysqli_query($connection, $sqlinsert)or die("Não foi possível registrar a venda fornecida!");

//     require_once '../model/VendaModel.php';

//     $data = $_POST['Data'];
//     $preco = $_POST['Preco'];
//     $desconto = $_POST['Desconto'];
//     $precoTotal = $_POST['Total'];
//     $idProduto = $_POST['Produto'];

//     $novaVenda = new VendaModel();
//     $novaVenda->setData($data);
//     $novaVenda->setPreco($preco);
//     $novaVenda->setDesconto($desconto);
//     $novaVenda->setTotal($precoTotal);
//     $novaVenda->setIdProduto($idProduto);

//     if(VendaModel::cadastrar($novaVenda))
//         header('');
//     else
//         header('');
?>