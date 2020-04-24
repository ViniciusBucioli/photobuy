<?php
    require_once '../model/VendaModel.php';

    header('Access-Control-Allow-Origin: *');
    // $data = $_POST['Data'];
    // $idProduto = $_POST['Produto'];
    $word = $_GET['word'];

    // $respostaModel = VendaModel::selectAll();
    // $respostaModel = VendaModel::selectByIdProduto($idProduto);
    // $respostaModel = VendaModel::selectByData($data);
    $vendaModel = new VendaModel();
    $searchResult = $vendaModel->searchByNome($word);

    if($searchResult == false)
        echo ('error');
    else
        echo $searchResult;

// //Conexao
// require "db.php";

// function selectAll() {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Venda a INNER JOIN Venda_Produto b ON a.id_venda = b.id_venda";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar as vendas!");
// }

// function selectByIdVenda($id_venda) {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Venda a INNER JOIN Venda_Produto b ON a.id_venda = b.id_venda WHERE a.id_venda = '$id_venda'";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar a venda!");
// }

// function selectByIdProduto($id_produto) {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Venda a INNER JOIN Venda_Produto b ON a.id_venda = b.id_venda WHERE b.id_produto = '$id_produto'";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar as vendas!");
// }

// function selectByDate($data_venda) {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Venda a INNER JOIN Venda_Produto b ON a.id_venda = b.id_venda WHERE a.data_venda = '$data_venda'";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar as vendas!");
// }
 
?>