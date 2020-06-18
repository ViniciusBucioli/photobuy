<?php

    require_once '../../MultipartParser/ParserInterface.php';
    require_once '../../MultipartParser/ParserException.php';
    require_once '../../MultipartParser/Parser/AbstractParser.php';
    require_once '../../MultipartParser/Parser/MultipartParser.php';
    require_once '../../MultipartParser/ParserSelector.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Lang");

    global $_DELETE;
    $_DELETE = array();
    global $_PUT;
    $_PUT = array();
    global $RETURN;
    $RETURN = array();
    global $REQUEST;

    $content = file_get_contents('php://input');
    $REQUEST = $_SERVER['REQUEST_METHOD'];

    if (!strcasecmp($REQUEST, 'DELETE')) {
        parse_str($content, $_DELETE);
    }
    if (!strcasecmp($REQUEST, 'PUT')) {
        parse_str($content, $_PUT);
    }
    if (!strcasecmp($REQUEST, 'OPTIONS')) {
        echo "{\"message\":\"$content\"}";
        exit();
    }
?>