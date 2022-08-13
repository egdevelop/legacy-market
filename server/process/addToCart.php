<?php
require_once '../config/db.php';
session_start();

$id_user = $_SESSION['userid'];
$id = ($_POST['idVariant']) ? $_POST['idVariant'] : $_GET['id'];
$qty = ($_POST['qty']) ? $_POST['qty'] : $_GET['qty'];
echo $id;
$idProduct = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_product FROM variants WHERE id = '$id'"))['id_product'];

if($id_user == null) {
    echo '<script>window.location.href = "/login.php";</script>';
}
$query = mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$id_user' AND id_variant = '$id'");
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $qty = $row['total'] + $qty;
    mysqli_query($conn, "UPDATE carts SET total = '$qty' WHERE id_user = '$id_user' AND id_variant = '$id'");
} else {
    mysqli_query($conn, "INSERT INTO carts (id_user, id_variant, total) VALUES ('$id_user', '$id', '$qty')");
}

if (mysqli_affected_rows($conn) > 0) {
    if($_POST['type'] == 'member') {
        $_SESSION['idCart'] = mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$id_user' && id_variant = '$id'")->fetch_assoc()['id'];
        $_SESSION['idVariant'] = $id;
        header('Location: /checkout.php');
        exit;
    }
    $_SESSION['success'] = 'Product added to cart successfully!';
    if(isset($_GET['beli'])) {
        header('Location: /keranjang.php');
    } else {
        header('Location: /detail-produk.php?id=' . $idProduct . '&success=true');
    }
} else {
    $_SESSION['success'] = 'Product added to cart failed!';
    header('Location: /detail-produk.php?id=' . $idProduct . '&success=false');
}
