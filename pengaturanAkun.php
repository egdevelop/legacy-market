<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Pengaturan Akun</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Pengaturan Akun</span>
                </a>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!--  -->
        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <span class="fz-12">Akun Saya</span>
                    <div class="d-block d-lg-none bg-white py-3 mt-2">
                        <a href="ubahProfil.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="blue ri-file-list-3-line"></i>
                                <span class="text-dark fz-12 fw-600">Profil Saya<span> 
                            </div>                     
                            <div class="right">
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="alamat.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="blue ri-coupon-2-line"></i>
                                <span class="text-dark fz-12 fw-600">Alamat Saya<span> 
                            </div>                     
                            <div class="right">
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="d-block d-lg-none bg-white py-3 mt-3 mb-5">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                               <i class="blue ri-message-3-line"></i>
                                 <span class="fz-12 fw-600">Bantuan Akun</span>                       
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                               <i class="blue ri-logout-box-line"></i>
                                 <span class="fz-12 fw-600">Logout</span>                       
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- Navbar Bottom -->
        <?php include "partials/navBottom.php" ;?>
    </div>

    <!-- Foot -->
    <?php include 'components/foot.php'; ?>
    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass('show1');
            $('nav ul .feat-show').removeClass('show');
        });
        $('.mainMenu').click(function() {
            $('nav ul .feat-show').removeClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('nav ul li').click(function() {
            $(this).addClass('activeMenuSide').siblings.removeClass('activeMenuSide');
        });

        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }

    </script>
</body>

</html>