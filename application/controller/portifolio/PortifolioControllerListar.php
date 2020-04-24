<?php
    require_once '../../model/PortifolioModel.php.php';
    
    header("Access-Control-Allow-Origin: *");
    //$nome = $_GET['Nome'];
    //$categoria = $_GET['Categoria'];
    $word = $_GET['word'];

    $portifolioModel = new PortifolioModel();
    $searchModel = $portifolioModel->searchByName($word);
    if($searchModel == false)
        echo 'error';
    else
        echo $searchModel;

//Conexao

// function selectAll() {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Portifolio";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar o portifolio!");
// }

// function selectByID($id_portifolio) {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Portifolio WHERE id_portifolio = '$id_portifolio'";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar o arquivo!");
// }

// function selectByName($nome_portifolio) {
//     //SQL Command
//     $sqlinsert = "SELECT * FROM Portifolio WHERE nome_portifolio = '$nome_portifolio'";
//     //envio da query para o BD
//     mysqli_query($connection, $sqlinsert)or die("Não foi possível listar os arquivos!");
// }

?>