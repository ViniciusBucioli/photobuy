<?php
    require_once '../../model/LoginModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas POST."));
        exit();
    }
    
    if(
        empty($_POST['email']) ||
        empty($_POST['pass'])
    ) {
        // Bad request
        http_response_code(400);
        echo json_encode(array("message" => "Dados incompletos."));
        exit();
    }
        
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $login = new LoginModel();
    $login->setEmail($email);
    $login->setPass($pass);
    $result = $login->login();

    if($result["valid"]){
        
        http_response_code(200);
        
        echo json_encode(array("message" => "Sucesso.", "valid" => "true", "path" => $result["path"]));
    }
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Credenciais inválidos.", "valid" => "false"));
    }
?>