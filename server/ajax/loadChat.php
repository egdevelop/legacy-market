<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
if($id != 0) {
    $chatss = mysqli_query($conn, "SELECT * FROM chats WHERE (sender_id = '$id' AND receiver_id = '0') OR (receiver_id = '$id' AND sender_id = '0') ORDER BY timestamp ASC");
} else {
    $chatss = mysqli_query($conn, "SELECT * FROM chats WHERE (sender_id = '0' AND receiver_id = '$_POST[to]') OR (receiver_id = '0' AND sender_id = '$_POST[to]') ORDER BY timestamp ASC");
}
while($cha = mysqli_fetch_assoc($chatss)) {
    $chats[] = $cha;
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));
$_SESSION['nameChat'] = $data['name'];

$text = "";
foreach($chats as $chat) {
    if($chat['status'] == 0 && $chat['receiver_id'] == $_SESSION['userid']) {
        mysqli_query($conn, "UPDATE chats SET status = 1 WHERE id = " . $chat['id']);
    }
    $hour = date("H:i", strtotime($chat['timestamp']));
    $name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $chat['sender_id']))['name'];
    if($id == 0) {
        if($chat['sender_id'] == 0) {
            $text .= "<div class='msg right-msg'>";
            $text .= "<div class='msg-bubble'>";
            $text .= "<div class='msg-info'>";
            $text .= "<div class='msg-info-name fz-14'>Admin</div>";
            $text .= "<div class='msg-info-time'>" . $hour . "</div>";
            $text .= "</div>";
            $text .= "<div class='msg-text fz-14'>";
            $text .= $chat['message']; 
            $text .= "</div>";
            $text .= "</div></div>";
        } else {
            $text .=    "<div class='msg left-msg'>
                        <div class='msg-bubble'>
                        <div class='msg-info'>";
            $text .= "<div class='msg-info-name fz-14'>" . $name . "</div>";
            $text .= "<div class='msg-info-time'>" . $hour . "</div>";
            $text .= "</div>";
            $text .= "<div class='msg-text fz-14'>" .$chat['message'] . "</div>";
            $text .= "</div></div>";
        }
    } else {
        if($chat['sender_id'] != $_SESSION['userid']) {
            $text .=    "<div class='msg left-msg'>
                        <div class='msg-bubble'>
                        <div class='msg-info'>";
            $text .= "<div class='msg-info-name fz-14'>Admin</div>";
            $text .= "<div class='msg-info-time'>" . $hour . "</div>";
            $text .= "</div>";
            $text .= "<div class='msg-text fz-14'>" .$chat['message'] . "</div>";
            $text .= "</div></div>";
        } else {
            $text .= "<div class='msg right-msg'>";
            $text .= "<div class='msg-bubble'>";
            $text .= "<div class='msg-info'>";
            $text .= "<div class='msg-info-name fz-14'>" . $name . "</div>";
            $text .= "<div class='msg-info-time'>" . $hour . "</div>";
            $text .= "</div>";
            $text .= "<div class='msg-text fz-14'>";
            $text .= $chat['message']; 
            $text .= "</div>";
            $text .= "</div></div>";
        }
    }
}

echo $text;