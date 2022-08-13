<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['addressId'];
$nama = $_POST['name'];
$Nohp = $_POST['nohp'];
$province = $_POST['tempat'];
$city_id = $_POST['kota'];
$oldCity = $_POST['oldCity'];
$city_name = $_POST['nama'];
$district = $_POST['kecamatan'];
$code = $_POST['kodepos'];
$alamat = $_POST['alamat'];

$query = "UPDATE `address` SET `name` = '$nama', `no` = '$Nohp', `province` = '$province', `city` = '$city_name', `city_id` = '$city_id', `district` = '$district', `code` = '$code', `detail` = '$alamat' WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);
if($result){
    header("Location: /alamat.php");
}else{
    header("Location: /alamat.php");
}