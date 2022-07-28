<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

$id = $_POST['id'];
$qty = $_POST['qty'];

$id = explode(',', $id);
$qty = explode(',', $qty);

for($i = 1; $i < count($id); $i++) {
    $arr[] = array(
        'id' => $id[$i],
        'qty' => $qty[$i]
    );
}

$c = 0;

foreach($arr as $item) {
    $id = $item['id'];
    $qty = $item['qty'];
    $sql = "SELECT * FROM variants WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $stock = $row['stock'];
    if($stock < $qty) {
        $err[] = "Item #$id is out of stock, please reduce the quantity. Current stock: $stock";
        mysqli_query($conn, "DELETE FROM carts WHERE id_user = " . $_SESSION['userid'] . " AND id_variant = $id");
    } else {
        $c++;
    }
}

if($c == count($arr)) {
    echo "true";
} else {
    echo implode('<br>', $err);
}