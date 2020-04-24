<?php

require_once '../../model/VendaModel.php.php';
    require '../header.php';
    
    if(
        empty($_POST['id'])
    ) {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

    $id = $_POST['id'];

    $venda = new VendaModel();

    if($produto->delete($id)) {
        // Produto criado
        http_response_code(200);
        echo json_encode(array("message" => "Venda deletada."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível deletar a venda."));
    }
// //Conexao
// require "db.php";

// //SQL Command
// $sqlinsert = "INSERT INTO Venda (id_venda, data_venda, preco_venda, desconto_venda, preco_total_venda) VALUES (NULL , '$data_venda', '$preco_venda', '$desconto_venda', '$preco_total_venda')";
// $sqlinsert = "INSERT INTO Venda_Produto (id_produto, id_venda, desconto_venda_produto, preco_venda_produto) VALUES ('$id_produto', '$id_venda', '$desconto_venda_produto', '$preco_venda_produto')";

// //envio da query para o BD
// mysqli_query($connection, $sqlinsert)or die("Não foi possível registrar a venda fornecida!");

//     $data = $_POST['Data'];
//     $preco = $_POST['Preco'];
//     $desconto = $_POST['Desconto'];
//     $precoTotal = $_POST['Total'];
//     $idProduto = $_POST['Produto'];

//     $novaVenda = new VendaModel();
//     $novaVenda->setData($data);
//     $novaVenda->setPreco($preco);
//     $novaVenda->setDesconto($desconto);
//     $novaVenda->setPrecoTotal($precoTotal);
//     $novaVenda->setIdProduto($idProduto);

//     if(VendaModel::cadastrar($novaVenda))
//         header('');
//     else
//         header('');
?>