<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$type = $_POST['type'];
$id = $_POST['id'];

if($type == 'selesai') {
    $query = "UPDATE orders SET `status` = '3' WHERE `id` = '$id'";
    $sql = mysqli_query($conn, $query);
    if($sql) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if($type == 'batal') {
    $query = "UPDATE orders SET `status` = '4' WHERE `id` = '$id'";
    $sql = mysqli_query($conn, $query);
    if($sql) {
        echo 'success';
    } else {
        echo 'error';
    }
}