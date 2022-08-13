<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE orders SET status = '$status' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    echo 'success';
} else {
    echo 'error';
}
