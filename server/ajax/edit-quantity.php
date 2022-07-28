<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$qty = $_POST['qty'];

$query = "UPDATE carts SET total = '$qty' WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if($result) {
    $_SESSION['asd'] = 'asd';
} else {
    $_SESSION['asd'] = 'dsa';
}
?>