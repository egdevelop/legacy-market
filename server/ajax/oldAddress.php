<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";

$provinces = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
$districts = mysqli_query($conn, "SELECT * FROM districts ORDER BY name ASC");
$a = new rajaongkir();
$kota = $a->get_city();
$kota_array = json_decode($kota, true);
if ($kota_array['rajaongkir']['status']['code'] == 200) :
  $kota_result  = $kota_array['rajaongkir']['results'];
else :
  die('This key has reached the daily limit.');
endif;

$id = $_POST['id'];
$query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM address WHERE id = '$id'"));

$text = "";
$text .= "<div class='row'>";
$text .= "<div class='col-6'>";
$text .= "<div class='mb-3 fz-12'>";
$text .= "<label for='name' class='form-label abu fw-500'>Nama Lengkap</label>";
$text .= "<input type='text' class='fz-12 form-control' id='name' name='name' value='".$query['name']."'>";
$text .= "</div>";
$text .= "</div>";
$text .= "<div class='col-6'>";
$text .= "<div class='mb-3 fz-12'>";
$text .= "<label for='telp' class='form-label abu fw-500'>Nomor Telepon</label>";
$text .= "<input type='text' class='fz-12 form-control' id='telp' name='nohp' value='".$query['no']."'>";
$text .= "</div>";
$text .= "</div>";
$text .= "</div>";
$text .= "<div class='row'>";
$text .= "<div class='col-12'>";
$text .= "<div class='mb-3 fz-12'>";
$text .= "<label for='tempat' class='form-label abu fw-500'>Provinsi, Kota, Kecamatan, Kode Pos</label>";
$text .= "<select class='fz-12 form-control' id='search4' name='tempat'>";
$text .= "<option value='".$query['province']."'>".$query['province']."</option>";
foreach($provinces as $province){
    $text .= "<option value='".$province['name']."'>".$province['name']."</option>";
}
$text .= "</select>";
$text .= "<select class='fz-12 form-control' id='search5' name='kota'>";
$text .= "<option value='".$query['city_id']."'>".$query['city']."</option>";
foreach($kota_result as $key => $city){
    $text .= "<option value='".$city['city_id']."'>".$city['city_name']."</option>";
}
$text .= "</select>";
$text .= "<select class='fz-12 form-control' id='search6' name='kecamatan'>";
$text .= "<option value='".$query['district']."'>".$query['district']."</option>";
foreach($districts as $district){
    $text .= "<option value='".$district['name']."'>".$district['name']."</option>";
}
$text .= "</select>";
$text .= "<input type='text' class='fz-12 form-control' id='kodepos' name='kodepos' value='".$query['code']."'>";
$text .= "<input type='hidden' class='fz-12 form-control' id='id' name='oldId' value='". $query['city_id'] ."'>";
$text .= "<input type='hidden' class='fz-12 form-control' id='nama' name='nama' value='".$query['city']."'>";
$text .= "<input type='hidden' class='fz-12 form-control' id='addressId' name='addressId' value='".$id."'>";
$text .= "</div>";
$text .= "</div>";
$text .= "</div>";
$text .= "<div class='row'>";
$text .= "<div class='col-12'>";
$text .= "<div class='mb-3 fz-12'>";
$text .= "<label for='alamat' class='form-label abu fw-500'>Alamat Lengkap</label>";
$text .= "<textarea class='fz-12 form-control' id='alamat' name='alamat' rows='3'>".$query['detail']."</textarea>";
$text .= "</div>";
$text .= "</div>";
$text .= "</div>";

echo $text;