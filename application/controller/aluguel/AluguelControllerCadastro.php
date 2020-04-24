<?php
    require_once '../../model/ProdutoModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }

    if(
        empty($_POST['Data']) ||
        empty($_POST['Preco']) ||
        empty($_POST['Desconto']) ||
        empty($_POST['Total']) &&
        empty($_POST['Produto'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }

$data_aluguel = $_POST['Data'];
$preco_aluguel_produto = $_POST['Preco'];
$desconto_aluguel_produto = $_POST['Desconto'];
$preco_total_aluguel = $_POST['Total'];
$id_produto = $_POST['Produto'];

$novoAluguel = new ProdutoModel();
$novoAluguel->setNome($nome);
$novoAluguel->setCategoria($categoria);
$novoAluguel->setPreco($preco);
$novoAluguel->setDescricao($descricao);

//Conexao
require "db.php";

//SQL Command
$sqlinsert = "INSERT INTO Aluguel (id_aluguel, data_aluguel, preco_aluguel_produto, desconto_aluguel_produto, preco_total_aluguel) VALUES (NULL , '$data_aluguel', '$preco_aluguel_produto', '$desconto_aluguel_produto', '$preco_total_aluguel')";
$sqlinsert = "INSERT INTO Aluguel_Produto (id_produto, id_aluguel, desconto_aluguel_produto, preco_aluguel_produto) VALUES ('$id_produto', '$id_aluguel', '$desconto_aluguel_produto', '$preco_aluguel_produto')";

//envio da query para o BD
mysqli_query($connection, $sqlinsert)or die("Não foi possível registrar o aluguel fornecido!");
 
?>