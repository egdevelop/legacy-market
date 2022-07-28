<?php
//subscription_orders
include "../../config/db.php";
include "../../config/tripay.php";


//DATA ORDER
$id_user = $_POST['id_user'];
$amount = $_POST['amount'];
$refrence  = "JC-" + rand();
$method = $_POST['method'];

$data = [
    'method'        => $method,
    'merchant_ref'  => $refrence,
    'customer_name' => $nama,
    'signature'     => hash_hmac('sha256', $merchantCode.$method.$refrence, $privateKey)
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_FRESH_CONNECT  => true,
    CURLOPT_URL            => "https://tripay.co.id/api/open-payment/create",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
    CURLOPT_FAILONERROR    => false,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data)
]);

$response = curl_exec($curl);
$error = curl_error($curl);
$datas = json_decode($response, true);

curl_close($curl);

if(empty($error)){
    //QUERY TO DATABASE
    $query = mysqli_query($conn, "INSERT INTO subscription_orders (id_user, amount, reference, third_ref) VALUES ('$id_user', '$amount', '$refrence','$datas[reference]')");
    //Respone
    if($query){
        $response = array(
            'status' => 'true',
            'message' => 'Successfully add order'
        );
        echo json_encode($response);
    }else{
        $response = array(
            'status' => 'false',
            'message' => 'Failed to add order'
        );
        echo json_encode($response);
    }
}else{
    var_dump($error);
}

?>