<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(isset($_SESSION['userid']) && $_SESSION['userid'] == '0') {
    header('Location: /admin/pages');
}
$username = $_POST['username'];
$password = $_POST['pw'];

$checkUser = mysqli_query($conn, "SELECT * FROM users WHERE name = '$username'");
if(mysqli_num_rows($checkUser) > 0) {
    $user = mysqli_fetch_assoc($checkUser);
    if(password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['user'] = $user;
        header('Location: ../pages/');
    } else {
        header('Location: /admin/server/login.php?error=1');
    }
} else {
    header('Location: /admin/server/login.php?error=1');
}

echo "<pre>";
print_r($_POST);
echo "</pre>";