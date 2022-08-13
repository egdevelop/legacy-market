<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$productName = $_POST['nama'];
$desc = $_POST['desc'];
$filteredDesc = filter_var($desc, FILTER_SANITIZE_STRING);
$stock = (int) $_POST['stok'];
$varianName = $_POST['varian'];
$harga = $_POST['harga'];
$target_dir = "/assets/uploads/";
$newImageName = "Images-" . rand(1, 999999999);
$ext = explode('/', $_FILES['gambar']['type'])[1];

$sql1 = "INSERT INTO products (name, description, stock, sold, flashsale) VALUES ('$productName', '$filteredDesc', '$stock', 0, 0)";

if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_dir .$newImageName . "." . $ext)) {
    $check = mysqli_query($conn, "SELECT * FROM products WHERE name = '$productName'");
    if(mysqli_num_rows($check) >= 1) {
        echo "Produk sudah ada";
    } else {
        $query = mysqli_query($conn, $sql1);
        if($query) {
            $query2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE name = '$productName'"));
            $id = $query2['id'];
            $sql3 = "INSERT INTO variants (name, retail_price, id_product, stock, photo) VALUES ('$varianName', '$harga', '$id', '$stock', 'https://legacy-market.egdev.co/assets/uploads/$newImageName.$ext')";
            $query3 = mysqli_query($conn, $sql3);
            if($query3) {
                header("Location: /admin/pages/produk.php");
            } else {
                // echo mysqli_query($conn, "SHOW ERRORS");
                // echo "ERROR: " . $sql3 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo mysqli_error($conn);
            echo "<br>";
            echo "ERROR: " . $sql1 . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
