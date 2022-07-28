<?php
require_once '../config/db.php';
session_start();

$userid = $_SESSION['userid'];

$query1 = mysqli_query($conn, "UPDATE address SET isPrimary = 0 WHERE user_id = '$userid'");
$query2 = mysqli_query($conn, "UPDATE address SET isPrimary = 1 WHERE user_id = '$userid' AND id = '$_GET[id]'");
if($query2){
    echo "<script>alert('Alamat berhasil diganti'); window.location = '../../alamat.php'</script>";
}else{
    echo "<script>alert('Alamat gagal diganti'); window.location = '../../alamat.php'</script>";
}