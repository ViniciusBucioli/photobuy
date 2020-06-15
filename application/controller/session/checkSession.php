<?php
    require_once '../../model/LoginModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas GET."));
        exit();
    }
    
    session_start();

    if(isset($_SESSION['id'])) {
        http_response_code(200);
        echo json_encode(array("valid" => "true"));
    }
    else{
        http_response_code(200);
        echo json_encode(array("valid" => "false"));
    }
?>