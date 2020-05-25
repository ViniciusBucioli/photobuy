<?php

class ImageManager {

    private $img_dir = "../../assets/img/";

    /// Aditional path $path = 'Produtos'
    function InsertImg($img, $path) {
        // $img = $_FILES["productImg"];

        $dir = $this->nameSanitizer($img["name"]);

        $target_dir = $this->img_dir . $path;
        $target_file = $target_dir . basename($dir);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (!$this->checkImg($img)) {
            $this->imgNotQualified("File is not an image.");
        }
        if ($this->checkFileExists($target_file)) {
            $this->imgNotQualified("Sorry, file already exists.");
        }
        if (!$this->checkFileSize($img)) {
            $this->imgNotQualified("Sorry, your file is too large.");
        }
        if (!$this->checkImgFormat($imageFileType)) {
            $this->imgNotQualified("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
        if (!$this->uploadImg($img, $target_file)) {
            $this->imgNotQualified("Sorry, there was an error uploading your file.");
        }
        return $path.$img["name"];
    }

    function imgNotQualified($message) {
        echo "{ 'message' : '" . $message . "' }";
        exit();
    }

    function nameSanitizer($name) {
        $name = str_replace(" ", "_", $name);
        $name = str_replace("ç", "c", $name);
        $name = str_replace("ã", "a", $name);
        return $name;
    }

    // Como é uma pequena aplição, o sistema estima o próximo id para nomear a imagem.
    function InsertProductImg($img) {
        $path = 'Produtos/';
        $product = new ProdutoModel();
        $id = $product->getNextId();
        $img['name'] = 'Produto'. $id;
        return $this->InsertImg($img, $path);
    }

    function UpdateProductImg($id, $img) {
        $this->deleteLastImg($id);
        $img['name'] = 'Produto' . $id . '-' . $img['name'];
        return $this->InsertImg($img, 'Produtos/');
    }

    private function deleteLastImg($id) {
        $product = new ProdutoModel();
        $product->get($id);
        if ($product->getImg() != null) {
            $target_file = $this->img_dir.$product->getImg();
            if($this->checkFileExists($target_file)) {
                unlink($target_file);
            }
        }
    }

    function checkImg($img){
        // Check if image file is a actual image or fake image
        $check = getimagesize($img["tmp_name"]);
        if($check !== true) {
            return true;
        }
        return false;
    }

    function checkFileExists($target_file) {
        // Check if file already exists
        return file_exists($target_file);
    }

    function checkFileSize($img) {
        return ($img["size"] < 2000000); //2MB
    }

    function checkImgFormat($imageFileType) {
        // Allow certain file formats
        return ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif");
    }
    function uploadImg($img, $target_file) {
        return move_uploaded_file($img["tmp_name"], $target_file);
    }
}
?>