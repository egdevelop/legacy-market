<?php
session_start();
require './server/Login/google-login.php';
if(isset($_SESSION['userid'])) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">

<head>
     <?php include "components/headMember.php"; ?>
     
    <title>Login</title>
</head>

<body>
    <div class="container-fluid container-md position-relative ">
        <div class="row d-flex justify-content-start  ">

            <div class="col-md-6 pt-5 mt-1 px-0 mx-0">
                <div class="d-none d-md-block">
                    <div class="col-12">
                        <h1 class="f-40 fw-bold">Selamat Datang </h1>
                    </div>
                    <div class="col-7 ">
                        <p class="f-24 pt-3">Masuk untuk mendapatkan akses lebih banyak</p>
                    </div>
                </div>
                <div class="d-flex d-md-none">
                    <div class="col-9 mx-auto ">
                        <p class="f-24 pt-1 text-center">Masuk untuk mendapatkan akses lebih banyak</p>
                    </div>
                </div>
                <div class="d-none d-md-flex">
                    <img src="assets/img/underline.png" class="position-absolute " style="margin-top: -10px;" alt="">
                </div>
                <div class="d-flex d-md-none justify-content-center">
                    <img src="assets/img/underline.png" class="position-absolute pt-2" style="margin-top: -10px;" alt="">
                </div>
                <div class="d-flex d-md-none pt-5 mx-0 px-0">
                    <img src="assets/img/login.svg" class="w-100" alt="">
                </div>
                <div class="d-none d-md-block col-md-6 mt-5 ">
                    <a href="<?= $client->createAuthUrl(); ?>" class="btn btnlogin py-2 px-3 f-16 fw-semibold text-decoration-none text-dark" style="height: 55px;">
                        <img src="assets/img/google.png" class="mx-1 py-1 pe-2" alt=""> Masuk Dengan Google
                    </a>
                    <!-- >
                    <a href="#" class="btn btnlogin py-2 px-3 f-14 fw-semibold text-decoration-none text-dark mt-4" style="height: 55px;" onclick="FBLOGIN();">
                        <img src="assets/img/facebook.png" class="mx-2 py-1 mt-1 pe-2 " alt=""> Masuk Dengan Facebook
                    </a> -->
                </div>
                <p class="d-none d-md-block f-16 pt-4 w-60 mt-5 fw-semibold">FAQ:join member untuk dapatkan akses
                    pembelian lebih banyak</p>
                <p class="d-none d-md-block f-16 mt-5 fw-semibold">Copyright @ 2022</p>
            </div>

            <div class=" d-none d-xl-flex col-xl-6 h-100 position-fixed top-0 bottom-0 end-0">
                <img src="assets/img/backgroundd.svg" class=" d-flex-justify-content-end align-items-end position-absolute end-0 h-100" alt="">
            </div>
        </div>
    </div>

    <footer class="d-flex d-md-none pt-4  mt-5 fixed-bottom" style="background-color: #29AAE3;">
        <div class="col-10 mx-auto mt-2">
            <a href="<?= $client->createAuthUrl(); ?>" style="width: 100px;">
                <button class="btnmobile2 py-2 mx-0 fw-semibold f-16 w-100">
                    <img src="assets/img/google.png" class="mx-2 " alt=""> Masuk Dengan Google
                </button>
            </a>

            <p class="f-12 text-light text-center  mx-5 mt-4 fw-semibold">FAQ:join member untuk dapatkan akses pembelian
                lebih banyak</p>
            <p class="f-12 text-light text-center mt-3 fw-semibold">Copyright @ 2022</p>
        </div>

    </footer>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <!-- FB LOGIN -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: "668763634429084",
                cookie: true, // Enable cookies to allow the server to access the session.
                xfbml: true, // Parse social plugins on this webpage.
                version: "v13.0", // Use this Graph API version for this call.
            });
        }

        function FBLOGIN() {
            FB.login(function(response) {
                if (response.authResponse) {
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me?locale=en_US&fields=name,email', function(response) {
                        FB.api('/me/picture?redirect=false', function(hasil) {
                            console.log('Good to see you, ' + response.name + '.');
                            window.location.href = "server/Login/fb-login.php?email=" + response
                                .email +
                                "&nama=" + response.name +
                                "&foto=" + encodeURIComponent(hasil.data.url);
                            // window.location.href = "../pages/signin.php";
                        });
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {
                scope: 'email',
                return_scopes: true
            });
        }
    </script>
</body>

</html>