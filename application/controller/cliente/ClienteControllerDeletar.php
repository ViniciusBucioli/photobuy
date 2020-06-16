<?php
    require_once '../../model/ClienteModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(400);
       
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }

    if(
        empty($_POST['id'])
    )   {
         // Bad request
         http_response_code(400);

         echo json_encode(array("message" => "Dados incompletos. Tenha certeza de utilizar x-www-form-urlencoded."));
         exit();
     }
    
     $id = $_POST['id'];
     $clienteModel = new ClienteModel();

     if($clienteModel->delete($id)) {
    //     // Produto criado
         http_response_code(200);
         echo json_encode(array("message" => "Cliente deletado."));
     } else {
         // set response code - 503 service unavailable
         http_response_code(503);
         echo json_encode(array("message" => "Não foi possível deletar o cliente."));
     }
         
?>