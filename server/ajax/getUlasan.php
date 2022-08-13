<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$value = $_POST['value'];

$text = '';
$sql = "SELECT * FROM reviews WHERE id_product = '$id'";
$result = mysqli_query($conn, $sql);
while($r = mysqli_fetch_assoc($result)) {
    $reviews[] = $r;
}
if($value == 1 || $value == 2 || $value == 3 || $value == 4 || $value == 5){
    foreach($reviews as $review){
        if($review['rate'] == $value) {
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$review[id_user]'"));
            $text .= "<div class='row d-flex my-4 ms-lg-4'>";
            $text .= "<div class='col-1 profile'>";
            $text .= "<img src='". $user['photo'] ."' alt='' class='profileImg'>";
            $text .= "</div>";
            $text .= "<div class='col-9 d-flex flex-column'>";
            $text .= "<span class='fz-10'>". $user['name'] ."</span>";
            $text .= "<div class='star'>";
            for($i = 0; $i < $review['rate']; $i++){
                $text .= "<span class='fz-10 yellow'><i class='ri-star-fill'></i></span>";
            }
            $text .= "</div>";
            $text .= "<span class='fz-12 mt-3'>". $review['review'] ."</span>";
            $text .= "<div class='d-flex gap-2'>";
            $text .= "<img src='". $review['photo'] ."' alt='' class='imgUlasan mt-3'>";
            $text .= "</div>";
            $text .= "</div>";
            $text .= "</div><hr />";
        }
    }
}
if($value == 'komentar') {
    foreach($reviews as $review) {
        if($review['review'] != null) {
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$review[id_user]'"));
            $text .= "<div class='row d-flex my-4 ms-lg-4'>";
            $text .= "<div class='col-1 profile'>";
            $text .= "<img src='". $user['photo'] ."' alt='' class='profileImg'>";
            $text .= "</div>";
            $text .= "<div class='col-9 d-flex flex-column'>";
            $text .= "<span class='fz-10'>". $user['name'] ."</span>";
            $text .= "<div class='star'>";
            for($i = 0; $i < $review['rate']; $i++){
                $text .= "<span class='fz-10 yellow'><i class='ri-star-fill'></i></span>";
            }
            $text .= "</div>";
            $text .= "<span class='fz-12 mt-3'>". $review['review'] ."</span>";
            $text .= "<div class='d-flex gap-2'>";
            $text .= "<img src='". $review['photo'] ."' alt='' class='imgUlasan mt-3'>";
            $text .= "</div>";
            $text .= "</div>";
            $text .= "</div><hr />";
        }
    }
}
if($value == 'media') {
    foreach($reviews as $review) {
        if($review['photo'] != null) {
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$review[id_user]'"));
            $text .= "<div class='row d-flex my-4 ms-lg-4'>";
            $text .= "<div class='col-1 profile'>";
            $text .= "<img src='". $user['photo'] ."' alt='' class='profileImg'>";
            $text .= "</div>";
            $text .= "<div class='col-9 d-flex flex-column'>";
            $text .= "<span class='fz-10'>". $user['name'] ."</span>";
            $text .= "<div class='star'>";
            for($i = 0; $i < $review['rate']; $i++){
                $text .= "<span class='fz-10 yellow'><i class='ri-star-fill'></i></span>";
            }
            $text .= "</div>";
            $text .= "<span class='fz-12 mt-3'>". $review['review'] ."</span>";
            $text .= "<div class='d-flex gap-2'>";
            $text .= "<img src='". $review['photo'] ."' alt='' class='imgUlasan mt-3'>";
            $text .= "</div>";
            $text .= "</div>";
            $text .= "</div><hr />";
        }
    }
}
if($value == 'all') {
    foreach($reviews as $review) {
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$review[id_user]'"));
        $text .= "<div class='row d-flex my-4 ms-lg-4'>";
        $text .= "<div class='col-1 profile'>";
        $text .= "<img src='". $user['photo'] ."' alt='' class='profileImg'>";
        $text .= "</div>";
        $text .= "<div class='col-9 d-flex flex-column'>";
        $text .= "<span class='fz-10'>". $user['name'] ."</span>";
        $text .= "<div class='star'>";
        for($i = 0; $i < $review['rate']; $i++){
            $text .= "<span class='fz-10 yellow'><i class='ri-star-fill'></i></span>";
        }
        $text .= "</div>";
        $text .= "<span class='fz-12 mt-3'>". $review['review'] ."</span>";
        $text .= "<div class='d-flex gap-2'>";
        $text .= "<img src='". $review['photo'] ."' alt='' class='imgUlasan mt-3'>";
        $text .= "</div>";
        $text .= "</div>";
        $text .= "</div><hr />";
    }
}
if($text == '') {
    $text = "<div class='row d-flex my-4 ms-lg-4'>";
    $text .= "<div class='col-12'>";
    $text .= "<span class='fz-12'>Tidak ada ulasan</span>";
    $text .= "</div>";
    $text .= "</div>";
}

echo $text;