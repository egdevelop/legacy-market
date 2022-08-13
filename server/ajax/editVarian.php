<?php
session_start();
require_once $_SERVER ['DOCUMENT_ROOT'] . '/server/config/functions.php';

$text = '';
$id = $_POST['id'];

$sql = "SELECT * FROM variants WHERE id = '$id'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$text .= "<input type='text' name='id' id='id' value='". $id ."' hidden>";
$text .= "<input type='text' name='trigger' value='0' id='trigger' hidden>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Nama Varian</label>";
$text .= "<input type='text' class='form-control' name='nama' value='". $data['name'] ."'>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Harga Varian</label>";
$text .= "<input type='text' class='form-control' name='harga' value='". $data['retail_price'] ."'>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Harga Grosir</label>";
$text .= "<input type='text' class='form-control' name='harga_grosir' value='". $data['wholesaler_price_1'] ."'>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Gambar Varian</label>";
$text .= "<input type='file' class='form-control gambar' name='gambar' value=''>";
$text .= "</div>";
$text .= "<div class='form-group'>";
$text .= "<label for='exampleInputEmail1'>Stok</label>";
$text .= "<input type='text' class='form-control' name='stok' value='". $data['stock'] ."'>";
$text .= "</div>";

echo $text;