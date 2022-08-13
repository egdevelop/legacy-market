<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$stock = (int) $_POST['stok'];
$varianName = $_POST['nama_produk'];
$harga = $_POST['harga_produk'];
$grosir = $_POST['harga_grosir'];
$target_dir = "/assets/uploads/";
$newImageName = "images-" . rand(1, 999999999);
$ext = explode('/', $_FILES['gambar_produk']['type'])[1];

if(move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_dir . $newImageName . "." . $ext)) {
    $sql = "INSERT INTO variants (name, retail_price, wholesale_price_1 id_product, stock, photo) VALUES ('$varianName', '$grosir', '$harga', '$id', '$stock', '$newImageName.$ext')";
    $query1 = mysqli_query($conn, $sql);
    if($query1) {
        header("Location: /admin/produk.php");
    } else {
        echo mysqli_error($conn);
    }
} else {
    echo "Sorry, there was an error uploading your file.";  
}
var_dump($_POST);