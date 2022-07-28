<?php
include "../../config/db.php";
$json = file_get_contents('php://input');
$datas = json_decode($json, true);

//CHECK REFERENCE NUMBER TYPE
$reference = $datas['merchant_ref'];
$reference_type = substr($reference, 0, 2);

if($reference_type == 'JC'){
    //CALLBACK ORDERS
        //READ STATUS
        $status = $datas['status'];
        //CHANGE STATUS ORDERS
        if($status == 'PAID'){
            $sql = "UPDATE orders SET status = '1' , paid_at = '$datas[paid_at]' WHERE reference = '$reference'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM orders WHERE reference = '$reference'"));
            $variant = explode(",", $data['id_variant']);
            $jumlah = explode(",", $data['qty']);
            for($i = 0 ; $i < count($variant); $i++){
                $update = mysqli_query($conn, "UPDATE variants SET stock = stock - '$jumlah[$i]' WHERE id = '$variant[$i]'");
            }

            //RESPONE 200
            if($result){
                http_response_code(200);
                $response = array(
                    'status' => 'true',
                    'message' => 'Successfully update status to paid'
                );
                echo json_encode($response);
            }else{
                http_response_code(503);
                $response = array(
                    'status' => 'false',
                    'message' => 'Failed to update status to paid'
                );
                echo json_encode($response);
            }
        }elseif($status == 'EXPIRED'){
            $sql = "UPDATE orders SET status = '9' WHERE reference = '$reference'";
            $result = mysqli_query($conn, $sql);
            
            //RESPONE
            if($result){
                http_response_code(200);
                $response = array(
                    'status' => 'true',
                    'message' => 'Successfully update status to expired'
                );
                echo json_encode($response);
            }else{
                http_response_code(503);
                $response = array(
                    'status' => 'false',
                    'message' => 'Failed to update status to expired'
                );
                echo json_encode($response);
            }
        }
}else if($reference_type == 'JS'){
    //CALLBACK SUBS
        $order_info = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM subscription_orders WHERE reference = '$reference'"));
        $user_info = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id = '$order_info[id_user]'"));
        //READ STATUS
        $status = $datas['status'];
        //CHANGE STATUS SUBS
        if($status == 'PAID'){
            $sql = "UPDATE subscription_orders SET status = '1' , paid_at = '$datas[paid_at]' WHERE reference = '$reference'";
            $result = mysqli_query($conn, $sql);
            //INSERT SUBS
            $month1 = date('Y-m-d', strtotime('+1 month'));
            $sqlSubs = "INSERT INTO subscriptions (id_user, purchased_at, expiry) VALUES ('$user_info[id]', '$tanggal', '$month1')";
            $resultSubs = mysqli_query($conn, $sqlSubs);

            //CHANGE ROLE
            $sqlRole = "UPDATE users SET role = '3' WHERE id = '$user_info[id]'";
            $resultRole = mysqli_query($conn, $sqlRole);

            //RESPONE 200
            if($result && $resultSubs && $resultRole){
                http_response_code(200);
                $response = array(
                    'status' => 'true',
                    'message' => 'Success'
                );
                echo json_encode($response);
            }else{
                http_response_code(500);
                $response = array(
                    'status' => 'false',
                    'message' => 'Error'
                );
                echo json_encode($response);
            }
        }elseif($status == 'EXPIRED'){
            $sql = "UPDATE subscription_orders SET status = '9' WHERE reference = '$reference'";
            $result = mysqli_query($conn, $sql);

            //RESPONE 200
            if($result){
                http_response_code(200);
                $response = array(
                    'status' => 'true',
                    'message' => 'Success'
                );
                echo json_encode($response);
            }else{
                http_response_code(500);
                $response = array(
                    'status' => 'false',
                    'message' => 'Error'
                );
                echo json_encode($response);
            }
        }
}else{
    echo $reference_type;
}
// var_dump($json);