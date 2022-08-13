<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
session_start();
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
     <?php include "components/head.php"; ?>

    <title>Member</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Member</span>
                </a>
                <ul class="nav nav-pills mb-3 d-flex d-lg-none gap-2 justify-content-center my-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fz-12 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Refferalku</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fz-12" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Memberku</button>
                    </li>
                </ul>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Flash Sale -->
        <section class="mtProfil py-2 py-lg-4 px-0 px-lg-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                <?php include "partials/sidebarProfil.php" ?>
                    <div class="col-12 col-lg-9 bg-white borad-10 p-4 d-flex flex-column">
                        <div class="bg-white borad-10 p-lg-4">
                            <ul class="nav nav-pills mb-3 d-none d-lg-flex gap-2 justify-content-center my-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fz-12 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Refferalku</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fz-12" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Memberku</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active gap-3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="d-flex flex-column align-items-center gap-3">
                                        <img src="assets/img/kado.png" alt="Gift" class="mt-5">
                                        <span class="fz-14 fw-600 text-center">Daftar member dan dapatkan benefitnya</span>
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                                <span class="fz-12 fw-600">1</span>
                                                <img src="assets/img/iconList.png" alt="" class="iconList">
                                                <span class="fz-10">Temanmu daftar member menggunakan link kamu</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                                <span class="fz-12 fw-600">2</span>
                                                <img src="assets/img/iconList.png" alt="" class="iconList">
                                                <span class="fz-10">Temanmu membeli barang grosir di marketplace</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                                <span class="fz-12 fw-600">3</span>
                                                <img src="assets/img/iconList.png" alt="" class="iconList">
                                                <span class="fz-10">Kamu akan mendapatkan benefit 5% dari pembelian</span>
                                            </div>
                                        </div>
                                        <div class="refferal d-flex w-100 d-flex justify-content-center py-3 borad-10">
                                            <div class="d-flex flex-column align-items-center gap-2">
                                                <span class="fz-12">Link Refferal Saya</span>
                                                <i class="blue ri-file-copy-line"></i>
                                            </div>
                                        </div>
                                        <button class="btn btn-blue w-100 text-light fz-12 py-2">Bagikan Sekarang</button>
                                        <span class="fz-12">Syarat & Ketentuan berlaku</span>
                                        <?php include "partials/navBottom.php" ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="d-flex flex-column align-items-center gap-3">
                                        <!-- Member Non Aktif -->
                                        <img src="assets/img/starBig.png" alt="Gift" class="mt-5 starBig">
                                        <span class="fz-14 fw-600 text-center">Member</span>
                                        <div class="d-flex justify-content-center gap-2">
                                            <span class="fz-10">Beli Paket tahunan dan dapatkan</span>
                                            <div class="badge bg-warning fz-10">Hemat 50%</div>
                                        </div>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <span class="fz-18 fw-600">Rp200.000,-</span>
                                                    <span class="fz-12">per 2 bulan</span>
                                                </div>
                                            </div>
                                        <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <span class="fz-18 fw-600">Rp500.000,-</span>
                                                    <span class="fz-12">per 5 bulan</span>
                                                </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <span class="fz-18 fw-600">Rp1.000.000,-</span>
                                                    <span class="fz-12">per 1 tahun</span>
                                                </div>
                                        </div>
                                        </div>
                                        <ul class="nav nav-pills mb-3 d-flex justify-content-center my-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fz-12 active" id="pills-one-tab" data-bs-toggle="pill" data-bs-target="#pills-one" type="button" role="tab" aria-controls="pills-one" aria-selected="true">2 bulan</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fz-12" id="pills-two-tab" data-bs-toggle="pill" data-bs-target="#pills-two" type="button" role="tab" aria-controls="pills-two" aria-selected="false">5 bulan</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link fz-12" id="pills-three-tab" data-bs-toggle="pill" data-bs-target="#pills-three" type="button" role="tab" aria-controls="pills-three" aria-selected="false">1 tahun</button>
                                            </li>
                                        </ul>
                                        <div class="d-none d-lg-block bg-blue py-3">
                                            <a href="daftar.php" class="fz-12 text-light d-flex justify-content-center px-3 mx-2">
                                                Gabung Member Sekarang</a>
                                        </div>

                                        <!-- End -->

                                        <!-- Member Aktif -->
                                        <!-- <img src="assets/img/starBig.png" alt="Gift" class="mt-5">
                                        <span class="fz-14 fw-600 text-center">Member - 2 Bulan</span>
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="badge bg-primary">Aktif</div>
                                        </div>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
                                                <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                                    <span class="fz-18 fw-600">120:24:20</span>
                                                    <span class="fz-10">Waktu Berakhir Member Tersisa</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-3 d-flex justify-content-between mt-3">
                                            <span class="fz-10 fw-600">Teman yang berhasil diundang</span>
                                            <span class="fz-10">Bonus 5% yang didapat</span>
                                        </div>
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <img src="assets/img/human.jpg" class="imgMember" alt="...">
                                                            <div class="d-flex flex-column gap-2">
                                                                <span class="fz-11 fw-600">Falch12</span>
                                                                <span class="fz-10">Diundang 09/20/22</span>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <span class="fz-12 text-success">Rp.5000</span>
                                                        </div>
                                                    </div>
                                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <img src="assets/img/human.jpg" class="imgMember" alt="...">
                                                            <div class="d-flex flex-column gap-2">
                                                                <span class="fz-11 fw-600">Falch12</span>
                                                                <span class="fz-10">Diundang 09/20/22</span>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <span class="fz-12 text-success">Rp.5000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <img src="assets/img/human.jpg" class="imgMember" alt="...">
                                                            <div class="d-flex flex-column gap-2">
                                                                <span class="fz-11 fw-600">Falch12</span>
                                                                <span class="fz-10">Diundang 09/20/22</span>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <span class="fz-12 text-success">Rp.5000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <img src="assets/img/human.jpg" class="imgMember" alt="...">
                                                            <div class="d-flex flex-column gap-2">
                                                                <span class="fz-11 fw-600">Falch12</span>
                                                                <span class="fz-10">Diundang 09/20/22</span>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <span class="fz-12 text-success">Rp.5000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            </div>
                                        <hr> -->
                                        <!-- End -->
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fz-12 fw-600">Benefit Member</span>
                                            <img src="assets/img/kadoSmall.png" alt="Icon Gift" class="kadoSmall">
                                        </div>
                                        <ul class="fz-12">
                                            <li>Terbuka fitur pembelian Grosir</li>
                                            <li>Dapatkan Akses pemberitahuan barang yang akan hadir</li>
                                            <li>Dapatkan Promo Khusus Member</li>
                                        </ul>
                                        <div class="position-fixed w-100 d-block d-lg-none start-0 bottom-0 bg-blue py-3">
                                            <a href="daftar.php" class="text-light d-flex justify-content-center px-3 mx-2">
                                                Gabung Member Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
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