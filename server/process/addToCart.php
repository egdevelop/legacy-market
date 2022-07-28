<?php
require_once '../config/db.php';
session_start();

$id_user = $_SESSION['userid'];
$idProduct = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_product FROM variants WHERE id = '$_GET[id]'"))['id_product'];

if($id_user == null) {
    echo '<script>alert("You must login first!");</script>';
    echo '<script>window.location.href = "/login.php";</script>';
}
$query = mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$id_user' AND id_variant = '$_GET[id]'");
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $qty = $row['total'] + $_GET['qty'];
    mysqli_query($conn, "UPDATE carts SET total = '$qty' WHERE id_user = '$id_user' AND id_variant = '$_GET[id]'");
} else {
    mysqli_query($conn, "INSERT INTO carts (id_user, id_variant, total) VALUES ('$id_user', '$_GET[id]', '$_GET[qty]')");
}

if (mysqli_affected_rows($conn) > 0) {
    $_SESSION['success'] = 'Product added to cart successfully!';
    if(isset($_GET['beli'])) {
        header('Location: /keranjang.php');
    } else {
        header('Location: ../../../detail-produk.php?id=' . $idProduct . '&success=true');
    }
} else {
    echo mysqli_error($conn);
}
