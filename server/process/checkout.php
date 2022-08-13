<?php
require_once '../config/functions.php';
require_once '../Tripay/clossedPayment/index.php';
session_start();
$idProduct = $_POST['idProduct'];
$idVariant = $_POST['idVariant']; $v = explode(",", $idVariant);
$qty = $_POST['qty']; $q = explode(",", $qty);
array_shift($v); array_shift($q);
$v = implode(",", $v); $q = implode(",", $q);
$id_user = $_SESSION['userid'];
$amount = $_POST['amount'];
$referance = "JC-" . rand();
$courier = $_POST['courier'];
$method = $_POST['method'];
$tanggal = date("Y-m-d H:i:s");

$query = mysqli_query($conn, "INSERT INTO orders (date_order,id_product, id_variant, qty, id_user, courier_package,amount, reference,method, third_ref, paid_at, status) VALUES ('$tanggal','$idProduct', '$v', '$q', '$id_user', '$courier','$amount', '$referance','$method', null, null, '0')");
if($query){
    $b = explode(",", $_POST['idCart']);
    foreach($b as $a) {
        $query2 = mysqli_query($conn, "DELETE FROM carts WHERE id = '$a'");
    }
    if($query2) {
        $barang = Array();
        $variant = explode(",", $idVariant);
        $jumlah = explode(",", $qty);
        $ongkir = $amount;
        for($i = 1 ; $i < count($variant); $i++){
            $barangs = Array();
            $detailVariant = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM variants WHERE id = '$variant[$i]'"));
            $detailBarang = getProductByVariant($variant[$i]);
            $barangs["name"] = $detailBarang['name'];
            $barangs["quantity"] = (int)$jumlah[$i];
            if($_SESSION['role'] == 3) {
                $barangs['price'] = whichPrice($detailVariant['wholesaler_price_1'], $detailVariant['retail_price'], $barangs['quantity']);
            } else {
                $barangs['price'] = $detailVariant['retail_price'];
            }
            $ongkir -= $barangs["price"] * $barangs["quantity"];
            array_push($barang, $barangs);
        }
        array_push($barang, Array("name" => "Ongkir", "price" => $ongkir, "quantity" => 1));
        // ref ,  amount , method , name , email , product
        $data = [
            'ref'           => $referance,
            'amount'        => $amount,
            'method'        => $method,
            'name'          => $_SESSION['name'],
            'email'         => $_SESSION['email'],
            'product'       => $barang
        ];
        $response = createPayment($data);
        $responseDecode = json_decode($response, true);
        $third_ref = $responseDecode['data']['reference'];
        echo $response;

        $update = mysqli_query($conn, "UPDATE orders SET third_ref = '$third_ref' WHERE reference = '$referance'");
        if(isset($_SESSION['idVariant'])) {
            unset($_SESSION['idVariant']);
            unset($_SESSION['idCart']);
        }
        header("Location: ".$responseDecode['data']['checkout_url']);
        // echo $response;
    } else {
        echo mysqli_error($conn);
        echo "Failed to add order";
    }
}else{
    echo mysqli_error($conn);
    echo "Failed to add order";
}