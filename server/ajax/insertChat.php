<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));
$from = $_POST['from'];
$to = $_POST['to'];
$text = $_POST['text'];
$role = $data['role'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO chats (sender_id, receiver_id, message, timestamp, status) VALUES ('$from', '$to', '$text', '$date', 0)";

$result = mysqli_query($conn, $sql);
if($result) {
    echo "success";
} else {
    echo mysqli_error($conn);
}