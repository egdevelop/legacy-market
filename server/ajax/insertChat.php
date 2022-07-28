<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));
$name = $_POST['name'];
$text = $_POST['text'];
$role = $data['role'];
$id = $data['id'];
$date = date("Y-m-d H:i:s");

if($role == 1) {
    $to = $_POST['to'];
    $sql = "INSERT INTO chats (sender_id, receiver_id, message, timestamp) VALUES ('0', '$to', '$text', '$date')";
} else {
    $sql = "INSERT INTO chats (sender_id, receiver_id, message, timestamp) VALUES ('$id', '0', '$text', '$date')";
}
$result = mysqli_query($conn, $sql);
if($result) {
    echo "success";
} else {
    echo mysqli_error($conn);
}