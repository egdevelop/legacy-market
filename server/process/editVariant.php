<?php
session_start();
require_once $_SERVER ['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stock = $_POST['stok'];

$trigger = $_POST['trigger'];
if($trigger == 1) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/';
    $newImageName = "Image - " . rand(0, 999999999);
    $ext = explode('/', $_FILES['gambar']['type'])[1];
    
    if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $newImageName . '.' . $ext)) {
        $oldImageName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id = '$id'"))['photo'];
        unlink($target_dir . $oldImageName);
        $sql = "UPDATE variants SET name = '$nama', retail_price = '$harga', stock = '$stock', photo = 'https://legacy-market.egdev.co/assets/uploads/$newImageName.$ext' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)) {
            header('Location: /admin/pages/produk.php');
        } else {
            header('Location: /admin/pages/produk.php');
        }
    } else {
        echo 'Error: ' . $_FILES['gambar']['error'];
    }
} else {
    $sql = "UPDATE variants SET name = '$nama', retail_price = '$harga', stock = '$stock' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)) {
        header('Location: /admin/pages/produk.php');
    } else {
        header('Location: /admin/pages/produk.php');
    }
}
