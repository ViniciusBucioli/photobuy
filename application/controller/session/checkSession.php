<?php
    require_once '../../model/LoginModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas GET."));
        exit();
    }
    
    if(
        empty($_SESSION['email']) ||
        empty($_SESSION['pass'])
    ) {
        http_response_code(200);
        echo json_encode(array("message" => "Credenciais inválidos.", "valid" => "false"));
        exit();
    }
        
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];

    $login = new LoginModel();
    $login->setEmail($email);
    $login->setPass($pass);
    $result = $login->login();

    if($result){
        http_response_code(200);
        echo json_encode(array("message" => "Sucesso.", "valid" => "true"));
    }
    else{
        http_response_code(200);
        echo json_encode(array("message" => "Credenciais inválidos.", "valid" => "false"));
    }
?>