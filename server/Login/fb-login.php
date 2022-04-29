<?php
require_once '../config/db.php';
session_start();

$email = $_GET['email'];
$name = $_GET['nama'];
$picture = $_GET['foto'];
$cekAvail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
if ($cekAvail > 0) {
    $_SESSION['email'] = $email;
    header("Location: ../../index.php");
} else {
    $query = "INSERT INTO users (name, email, password, address, no_hp, role, photo) VALUES ('$name', '$email', null, null, null, 0, '$picture')";
    $eks = mysqli_query($conn, $query);
    if ($eks) {
        echo "<script>
                alert('Berhasil mendaftar');
                window.location = '../../index.php';
              </script>";
    } else {
        echo $email, $name, $picture, "<br>";
        echo mysqli_error($conn);
    }
}