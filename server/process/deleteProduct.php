<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    $query2 = mysqli_query($conn, "DELETE FROM variants WHERE id_product = '$id'");
    if($query2) {
        header('Location: /admin/pages/produk.php');
    }
} else {
    header('Location: /admin/pages/produk.php');
}