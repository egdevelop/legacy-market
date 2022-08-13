<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$text = '';

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'"));

$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Nama Produk</label>";
$text .= "<input type='text' class='form-control' name='nama' value='". $data['name'] ."' id='exampleInputEmail1' aria-describedby='emailHelp'>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Deskripsi</label>";
$text .= "<textarea class='form-control' name='desc' id='exampleInputEmail1' aria-describedby='emailHelp'>". $data['description'] ."</textarea>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Stok</label>";
$text .= "<input type='text' class='form-control' name='stok' value='". $data['stock'] ."' id='exampleInputEmail1' aria-describedby='emailHelp'>";
$text .= "</div>";
$text .= "<input type='hidden' name='id' value='". $data['id'] ."'>";

echo $text;