<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";

$id = $_GET['id'];
$sql = "DELETE FROM variants WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
if($query) {
    header('Location: /admin/pages/pages/varian.php?id=' . $id);
} else {
    header('Location: /admin/pages/pages/varian.php?id=' . $id);
}