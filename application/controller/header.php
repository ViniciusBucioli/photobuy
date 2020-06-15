<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
    // header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Lang");

    ini_set("allow_url_fopen", true);
    global $_DELETE;
    $_DELETE = array();
    global $_PUT;
    $_PUT = array();

    if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
        parse_str(file_get_contents('php://input'), $_DELETE);
    }
    if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
        parse_str(file_get_contents('php://input'), $_PUT);
    }
?>