<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$qty = $_POST['qty'];

$query = "UPDATE carts SET total = '$qty' WHERE id = '$id'";
$result = mysqli_query($conn, $query);

$qty = mysqli_fetch_assoc(mysqli_query($conn, "SELECT total FROM carts WHERE id = '$id'"))['total'];

if($result) {
    echo $qty;
} else {
    echo mysqli_error($conn);
}
?>