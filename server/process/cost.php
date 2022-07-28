<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

function asd($asal, $tujuan, $berat) {
  $data   = new rajaongkir(); // Inisiasi objek dari class rajaongkir. 
  $kota_asal    = isset($asal) ? $asal : ''; // kota asal
  $kota_tujuan  = isset($tujuan) ? $tujuan : ''; // kota tujuan
  $berat        = isset($berat) ? $berat : ''; // berat
  $list_courir = ['jne', 'pos', 'tiki']; // Untuk tipe akun starter ada 3 pilhan kurir
  $cost_per_courir = [];
  for ($i = 0; $i < 3; $i++) :
    $result = json_decode($data->get_cost($kota_asal, $kota_tujuan, $berat, $list_courir[$i]), true);
    $cost_per_courir[] = $result['rajaongkir']['results'][0];
  endfor;
  $data->array_sort_by_column($cost_per_courir, 'costs'); // Sort berdasarkan costs
  $row  = [];
  $no = 0;
  foreach ($cost_per_courir as $key => $value) :
    $no++;
    $row[$no]['name']  = $value['name'];
    $row[$no]['desc']  = $value['costs'][0]['description'];
    $row[$no]['harga']  = 'Rp.' . number_format($value['costs'][0]['cost'][0]['value']);
  endforeach;

  return $row;
}

$a = asd($_GET['kota_asal'], $_GET['kota_tujuan'], $_GET['berat']);
foreach($a as $key => $value) :
  echo $value['name'] . ' : ' . $value['harga'] . '<br>';
endforeach;