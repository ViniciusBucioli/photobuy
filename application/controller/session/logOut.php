<?php
    require '../header.php';

    if($REQUEST != 'GET') {
        // Bad request
        http_response_code(400);
        
        echo json_encode(array("message" => "Apenas GET."));
        exit();
    }
    
    session_start();
    if(isset($_SESSION['id'])) {
        unset($_SESSION['id']);
    }
    http_response_code(200);
?>