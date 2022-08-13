<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$name = $_POST['nama'];
$desc = $_POST['desc'];
$stock = $_POST['stok'];

$sql = "UPDATE products SET name = '$name', description = '$desc', stock = '$stock' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    header('Location: /admin/pages/produk.php');
} else {
    header('Location: /admin/pages/produk.php');
}

