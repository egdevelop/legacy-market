<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";

$id = $_POST['idProduct'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/uploads/";
$ext = explode('/', $_FILES['gambar']['type'])[1];
$newImageName = "Review_" . time() . "." . $ext;

if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $newImageName)) {
    $query = "INSERT INTO reviews (id_product, id_user, rate, review, photo) VALUES ('$id', '" . $_SESSION['userid'] . "', '$rating', '$comment', '$newImageName')";
    $result = mysqli_query($conn, $query);
    if($result) {
        header('Location: /');
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}