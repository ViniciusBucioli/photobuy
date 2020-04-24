<?php
    require_once '../../model/LoginModel.php';
    require '../header.php';

    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas GET."));
        exit();
    }
    
    unset($_session['email']);
    unset($_SESSION['pass']);
    http_response_code(200);
?>