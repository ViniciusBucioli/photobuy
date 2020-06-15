<?php
    require '../header.php';
    require_once '../../model/UserModel.php';

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

    $user = new UserModel();
    $user->setEmail($email);
    $user->setPass($pass);
    $result = $user->login();

    if($result["valid"]){
        
        http_response_code(200);
        
        echo json_encode(array("message" => "Sucesso.", "valid" => true, "path" => $result["path"]));
    }
    else{
        http_response_code(200);
        echo json_encode(array("message" => "Credenciais inválidos.", "valid" => false));
    }
?>