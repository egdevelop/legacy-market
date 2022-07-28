<?php
session_start();
// include "../../config/tripay.php";
// Data Function
// ref ,  amount , method , name , email , product


$apiKey       = 'DEV-Q8VnECL05fHRpe6KFlaQPHtdA4P38UHIHmidXhT2';
$privateKey   = 'Lwfav-mLXH1-8s1Di-T2SLT-Uoz1l';
$merchantCode = 'T8127';
function createPayment($data){
global $merchantCode;
global $privateKey;
global $apiKey;
$merchantRef  = $data['ref'];
$amount       = (int)$data['amount'];

$data = [
    'method'         => $data['method'],
    'merchant_ref'   => $merchantRef,
    'amount'         => $amount,
    'customer_name'  => $data['name'],
    'customer_email' => $data['email'],
    'order_items'    => $data['product'],
    'callback_url' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/server/Tripay/Callback/callbackHandler.php",
    'return_url'   => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/success.php",
    'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
    'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_FRESH_CONNECT  => true,
    CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
    CURLOPT_FAILONERROR    => false,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data),
    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

return empty($error) ? $response : $error;
}

?>