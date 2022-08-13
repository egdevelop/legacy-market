<?php
require_once '../config/functions.php';
session_start();

$name = $_POST['name'];
$gender = $_POST['gender'];
$ttl = $_POST['tanggal'] . "/" . $_POST['bulan'] . "/" . $_POST['tahun'];

mysqli_query($conn, "UPDATE users SET name = '$name', gender = '$gender', ttl = '$ttl' WHERE id = '$_SESSION[userid]'");
if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
    window.location = '../../profilDetail.php';
    </script>";
} else {
    echo "
    <script>
    window.location = '../../profilDetail.php';
    </script>";
}