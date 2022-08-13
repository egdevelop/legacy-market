<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));

// SEMUA
$voucherGO = mysqli_query($conn, "SELECT * FROM vouchers WHERE category = 'gratis ongkir' AND owner_id = '$_SESSION[userid]'");
if(mysqli_num_rows($voucherGO) > 0){
    while($v = mysqli_fetch_assoc($voucherGO)){
        $voucherGOList[] = $v;
    }
}else{
    $voucherGOList = [];
}
$voucherDisc = mysqli_query($conn, "SELECT * FROM vouchers WHERE category = 'diskon' AND owner_id = '$_SESSION[userid]'");
if(mysqli_num_rows($voucherDisc) > 0){
    while($v = mysqli_fetch_assoc($voucherDisc)){
        $voucherDiscList[] = $v;
    }
}else{
    $voucherDiscList = [];
}

// Terbaru
$voucherGOTerbaru = mysqli_query($conn, "SELECT * FROM vouchers WHERE category = 'gratis ongkir' AND owner_id = '$_SESSION[userid]' ORDER BY id DESC");
if(mysqli_num_rows($voucherGOTerbaru) > 0){
    while($v = mysqli_fetch_assoc($voucherGOTerbaru)){
        $voucherGOListTerbaru[] = $v;
    }
}else{
    $voucherGOListTerbaru = [];
}
$voucherDiscTerbaru = mysqli_query($conn, "SELECT * FROM vouchers WHERE category = 'diskon' AND owner_id = '$_SESSION[userid]' ORDER BY id DESC");
if(mysqli_num_rows($voucherDiscTerbaru) > 0){
    while($v = mysqli_fetch_assoc($voucherDiscTerbaru)){
        $voucherDiscListTerbaru[] = $v;
    }
}else{
    $voucherDiscListTerbaru = [];
}

// Segera Berakhir
if(count($voucherGOList) > 0){
    foreach($voucherGOList as $v){
        $now = new DateTime();
        $future_date = new DateTime($v['expiry']);
        $interval = $future_date->diff($now)->format("%h jam");
        if($interval <= 24){
            $voucherGOS[] = $v;
        }
    }
} else {
    $voucherGOS = [];
}
if(count($voucherDiscList) > 0){
    foreach($voucherDiscList as $v){
        $now = new DateTime();
        $future_date = new DateTime($v['expiry']);
        $interval = $future_date->diff($now)->format("%h jam");
        if($interval <= 24){
            $voucherDiscS[] = $v;
        }
    }
} else {
    $voucherDiscS = [];
}

?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Voucher Saya</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Voucher Saya</span>
                </a>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Flash Sale -->
        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between mb-4">
                    <?php include "partials/sidebar2.php" ?>
                    <div class="col-12 col-lg-9 right bg-white borad-10 p-lg-4">
                        <div class="bg-white borad-10 p-lg-4">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="left d-none d-lg-block">
                                    <span class="fz-12 fw-600">Voucher Saya</span>
                                </div>
                                <div class="right d-none d-lg-block">
                                    <span class="fz-12 orange">Lihat Riwayat Voucher</span>
                                </div>
                            </div>
                            <div class="mt-2 mb-4 bg-voucher-abu py-4 d-flex align-items-center justify-content-center gap-2">
                                <div class="left d-none d-lg-block">
                                    <span class="fz-12 fw-600">Tambah Voucher</span>
                                </div>
                                <form class="d-flex">
                                    <input class="form-control me-2 fz-12" type="text" placeholder="Masukkan Kode Voucher">
                                    <button class="btn-voucher fz-12 text-light btn-voucher-abu px-3 d-flex align-items-center justify-content-center">
                                        Pakai
                                    </button>
                                </form>
                            </div>
                            <ul onclick="myFunction(event)" id='myTab' class="nav nav-tabs d-none d-lg-flex justify-content-start gap-3" role="tablist">
                                <li class="nav-item fz-14 fw-600 px-3" role="presentation">
                                    <button class="nav-link-custom activePesanan" id="act semua" data-bs-toggle="tab" data-bs-target="#Semua" type="button" role="tab" aria-controls="Semua" aria-selected="true">Semua</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-3" role="presentation">
                                    <button class="nav-link-custom" id="act terbaru" data-bs-toggle="tab" data-bs-target="#Terbaru" type="button" role="tab" aria-controls="Terbaru" aria-selected="false">Terbaru</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-3" role="presentation">
                                    <button class="nav-link-custom" id="act berakhir" data-bs-toggle="tab" data-bs-target="#Berakhir" type="button" role="tab" aria-controls="Berakhir" aria-selected="false">Segera Berakhir</button>
                                </li>
                            </ul>
                            
                            <?php $c = 0; $d = 0; ?>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade mb-3 show active" id="Semua" role="tabpanel" aria-labelledby="semua">
                                <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom ada">
                                    <span class="fz-14 fw-600" id="voucher1"></span>
                                </div>
                                    <?php if($voucherGOList != null) :?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom ada">
                                    <span class="fz-14 fw-600 vou">Voucher Gratis Ongkir</span>
                                        <?php foreach($voucherGOList as $aa) : ?>
                                            <?php if(date("Y-m-d") <= $aa['expiry']) : $c++?>
                                                <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                                    <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                                    <div class="d-flex flex-column">
                                                        <span class="fz-12">Min. Belanja Rp <?= $aa['min_buy'] ?>
                                                        </span>
                                                        <?php if(date("Y-m-d") == $aa['expiry']) : ?>
                                                            <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($aa['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span>
                                                        <?php else : ?>
                                                            <span class=" fz-10 blue">Berakhir pada <?= $aa['expiry'] ?></span>
                                                        <?php endif; ?>
                                                        <span class="fz-9 sk">S&K</span>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($voucherDiscList != null) :?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom">
                                        <?php foreach($voucherDiscList as $ab) : $d++; ?>
                                        <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                            <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12">Min. Belanja Rp <?= $ab['min_buy'] ?>
                                                </span>
                                                <?php if(date("Y-m-d") == $ab['expiry']) : ?>
                                                    <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($ab['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span>
                                                <?php else : ?>
                                                    <span class=" fz-10 blue">Berakhir pada <?= $ab['expiry'] ?></span>
                                                <?php endif; ?>
                                                <span class="fz-9 sk">S&K</span>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade mt-4" id="Terbaru" role="tabpanel" aria-labelledby="terbaru">
                                <span class="fz-14 fw-600" id="voucher1"></span>
                                <?php if($voucherGOListTerbaru != null) :?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom">
                                        <span class="fz-14 fw-600 vou">Voucher Gratis Ongkir</span>
                                        <?php foreach($voucherGOListTerbaru as $ba) : ?>
                                            <?php if(date("Y-m-d") <= $ba['expiry']) : $c++?>
                                                <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                                    <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                                    <div class="d-flex flex-column">
                                                        <span class="fz-12">Min. Belanja Rp <?= $ba['min_buy'] ?>
                                                        </span>
                                                        <?php if(date("Y-m-d") == $ba['expiry']) : ?>
                                                            <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($ba['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span>
                                                        <?php else : ?>
                                                            <span class=" fz-10 blue">Berakhir pada <?= $ba['expiry'] ?></span>
                                                        <?php endif; ?>
                                                        <span class="fz-9 sk">S&K</span>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($voucherDiscListTerbaru != null) :?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom">
                                        <span class="fz-14 fw-600">Voucher Diskon</span>
                                        <?php foreach($voucherDiscListTerbaru as $bb) : $d++; ?>
                                        <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                            <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12">Min. Belanja Rp <?= $bb['min_buy'] ?>
                                                </span>
                                                <?php if(date("Y-m-d") == $bb['expiry']) : ?>
                                                    <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($bb['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span>
                                                <?php else : ?>
                                                    <span class=" fz-10 blue">Berakhir pada <?= $bb['expiry'] ?></span>
                                                <?php endif; ?>
                                                <span class="fz-9 sk">S&K</span>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade mt-4" id="Berakhir" role="tabpanel" aria-labelledby="Berakhir">
                                <span class="fz-14 fw-600" id="voucher1"></span>
                                <?php $q = 1; if($voucherGOS != null) :?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom">
                                        <span class="fz-14 fw-600 vou">Voucher Gratis Ongkir</span>
                                        <?php foreach($voucherGOS as $ca) : ?>
                                            <?php if(date("Y-m-d") <= $ca['expiry']) : $c++?>
                                                <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                                    <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                                    <div class="d-flex flex-column">
                                                        <span class="fz-12">Min. Belanja Rp <?= $ca['min_buy'] ?>
                                                        </span>
                                                        <?php if(date("Y-m-d") == $ca['expiry']) : ?>
                                                            <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($ca['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span>
                                                        <?php else : ?>
                                                            <span class=" fz-10 blue">Berakhir pada <?= $ca['expiry'] ?></span>
                                                        <?php endif; ?>
                                                        <span class="fz-9 sk">S&K</span>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($voucherDiscS != null) : $d = 0; ?>
                                    <div class="my-4 row d-flex flex-wrap align-items-center justify-content-start gapCustom">
                                        <span class="fz-14 fw-600">Voucher Diskon</span>
                                        <?php foreach($voucherDiscS as $cb) : $d++; ?>
                                        <div class="col-11 col-lg-5 borderVoucher left d-flex align-items-center gap-3">
                                            <img src="assets/img/voucherImg.svg" alt="" class="voucherImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12">Min. Belanja Rp <?= $cb['min_buy'] ?>
                                                </span>
                                                <?php if(date("Y-m-d") == $cb['expiry']) : ?>
                                                <span class=" fz-10 blue">Berakhir dlm <span class=" fz-10 blue">Berakhir dlm <?php $future_date = new DateTime($cb['expiry']) ; echo 24 - $future_date->diff(new DateTime())->format("%h") ?> jam</span> jam</span>
                                                <?php else : ?>
                                                <span class=" fz-10 blue">Berakhir pada <?= $cb['expiry'] ?></span>
                                                <?php endif; ?>
                                                <span class="fz-9 sk">S&K</span>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include "partials/navBottom.php"; ?>
        </section>

    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var navCustom = document.querySelectorAll('.nav-link-custom');

            if (navCustom) {

                navCustom.forEach(function(el, key) {

                    el.addEventListener('click', function() {
                        console.log(key);

                        el.classList.toggle("activePesanan");

                        navCustom.forEach(function(ell, els) {
                            if (key !== els) {
                                ell.classList.remove('activePesanan');
                            }
                            console.log(els);
                        });
                    });
                });
            }
        });

        var c = <?= $c ?>;
        var d = <?= $d ?>;
        if(c == 0 && d == 0) {
            var spans = document.querySelectorAll("#voucher1");
            var vous = document.querySelectorAll(".vou");
            spans.forEach(function(el) {
                el.innerHTML = "Tidak ada voucher";
            });
            vous.forEach(function(el) {
                el.style = 'display: none';
            });
        }

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