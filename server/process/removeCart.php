<?php
require_once '../config/functions.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM carts WHERE id = '$id'");
if ($query) {
    header('location: /keranjang.php');
} else {
    $err = mysqli_error($conn);
    echo $err;
}