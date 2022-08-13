<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$referal = $_GET['referal'];

$query = mysqli_query($conn, "SELECT * FROM subscriptions WHERE referal = '$referal'");
if(mysqli_num_rows($query) > 0) {
    $refUsed = mysqli_fetch_assoc($query)['referalUsed'];
    $refUsed++;
    $update = mysqli_query($conn, "UPDATE subscriptions SET referalUsed = $refUsed  WHERE referal = '$referal'");
    if($update) {
        echo "true";
    }
    echo mysqli_error($conn);
}
