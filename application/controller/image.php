<?php

header("Access-Control-Allow-Origin: *");

header('Content-type: image/png;');
$image = file_get_contents('../assets/img/Camera01.png');

echo $image;

?>