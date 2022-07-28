<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'] . '/server/APIs/google-api/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/db.php';

$clientID = '732962289241-c84nrcgmth05p4p65qedd0ukbaee4l1t.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://legacy-market.egdev.co/server/Login/google-login.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if($_GET['code']) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];
    
    $google_service = new \Google\Service\Oauth2($client);
    $google_account_info = $google_service->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $gender = $google_account_info->gender;
    $picture = $google_account_info->picture;
    $referal = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ"), 0, 6);
    
    $exist = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($exist) === 1) {
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
        $token = substr(str_shuffle(MD5(microtime())), 0, 10);
        $msg = $token . "." . $user['id'];
        $expiry = date("Y-m-d", strtotime("+1 month"));
        mysqli_query($conn, "INSERT INTO cookies (userid, token, expiry) VALUES ('$user[id]', '$token',DATE '$expiry')");
        if(mysqli_affected_rows($conn) === 1) {
            if($user['password'] == null){
                $_SESSION['create_password'] = "true";
            }
            setcookie("cookie", $msg, strtotime("+1 month"), "/");
            $_SESSION['userid'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $name;
            $_SESSION['picture'] = $picture;
            header('Location: ../../index.php');
            exit;
        } else {
            echo '<script>alert("Error: Could not create token.");</script>';
            echo mysqli_error($conn);
            echo $userid, $token, $expiry, $msg;
        }
    } else {
        $query = "INSERT INTO users (name, email, password, address, no_hp, ttl, role, photo,gender,referal) VALUES ('$name', '$email', null, null, null, null, 0, '$picture','$gender','$referal')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
            $token = substr(str_shuffle(MD5(microtime())), 0, 10);
            $msg = $token + "." + $user['id'];
            $expiry = date("Y-m-d", strtotime("+1 month"));
            mysqli_query($conn, "INSERT INTO cookies (userid, token, expiry) VALUES ('$user[id]', '$token',DATE '$expiry')");
            if (mysqli_affected_rows($conn) === 1) {
                setcookie("cookie", $msg, strtotime("+1 month"), "/");
                $_SESSION['userid'] = $user['id'];
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $name;
                $_SESSION['picture'] = $picture;
                $_SESSION['create_password'] = "true";
                header('Location: ../../ubah-sandi.php');
                exit;
            } else {
                echo '<script>alert("Error: Could not create token.");</script>';
                echo mysqli_error($conn);
                echo $userid, $token, $expiry, $msg;
            }
        }else{
            echo mysqli_error($conn);
            echo $nama, $email, $picture;
        }
    }
}

?>