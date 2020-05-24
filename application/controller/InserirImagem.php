<?php

///
/// Aditional path $path = 'Produtos'
function InsertImg($imgPath, $path) {
    // $imgPath = $_FILES["productImg"];

    $target_dir = "../../assets/img/" . $path;
    $target_file = $target_dir . basename($imgPath["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $message = '';

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($imgPath["tmp_name"]);
        if($check !== false) {
            $message = "File is an image - " . $check["mime"] . ".";
        } else {
            $message = "File is not an image.";
            exit();
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        exit();
    }
    // Check file size
    if ($imgPath["size"] > 2000000) { //2MB
        $message = "Sorry, your file is too large.";
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    exit();
    }

    // if everything is ok, try to upload file
    if (move_uploaded_file($imgPath["tmp_name"], $target_file)) {
        $message = null;
    } else {
        $message = "Sorry, there was an error uploading your file.";
        exit();
    }

    if ($message != null) {
        return "{ 'message' : '" . $message . "' }";
    } else {
        return null;
    }
}
?>