<?php

require './header.php';

// $value = $_GET['value'];

$url = 'https://api.exchangeratesapi.io/latest?base=BRL';

if (! function_exists ( 'curl_version' )) {
    exit ( "Enable cURL in PHP" );
}

$ch = curl_init ();
$timeout = 0; // 100; // set to zero for no timeout
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
$file_contents = curl_exec ( $ch );
if (curl_errno ( $ch )) {
    echo curl_error ( $ch );
    curl_close ( $ch );
    exit ();
}
curl_close ( $ch );

// dump output of api if you want during test
$exchange = json_decode("$file_contents", true);

if(isset($_GET['currency']) && isset($_GET['value'])) {
    $currency = $_GET['currency'];
    $coefficient = $exchange["rates"][$currency];
    $value = $_GET['value'];
    $result = $value * $coefficient;
    echo "{\"BRL_USD\": $result}";
} else {
    echo "$file_contents";
}
?>