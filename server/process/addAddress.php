<?php
require_once '../config/db.php';
session_start();

$userid = $_SESSION['userid'];

$name = $_POST['name'];
$nohp = $_POST['nohp'];
$province = $_POST['province'];
$city = $_POST['city'];
$city_id = $_POST['city_id'];
$district = $_POST['district'];
$postcode = $_POST['postcode'];
$detail = $_POST['detail'];

$query = mysqli_query($conn, "INSERT INTO address (user_id, name, no, province, city, city_id, district, code, detail, isPrimary) VALUES ('$userid', '$name', '$nohp', '$province', '$city', '$city_id', '$district', '$postcode', '$detail', 0)");
if($query){
    echo "<script>alert('Alamat berhasil ditambahkan'); window.location = '../../alamat.php'</script>";
}else{
    echo "<script>alert('Alamat gagal ditambahkan')</script>";
    echo mysqli_error($conn);
}