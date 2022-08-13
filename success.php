<?php
include "server/config/db.php";
include "server/config/functions.php";
if(isset($_GET['tripay_status'])){
    if($_GET['tripay_status'] == 'UNPAID'){
        header("Location: pesanan-saya.php");
    }
}


$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM orders WHERE reference = '$_GET[tripay_merchant_ref]'"));
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Pembayaran Sukses</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-block d-sm-none pb-4">
            <div class="container">
                <form class="pb-1 pt-4 d-flex gap-3 align-items-center justify-content-center nosubmit">
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                    <a href="keranjang.php" class="text-light iconNavbar z-1"><i class="ri-shopping-cart-line"></i></a>
                    <span class="iconNavbar z-1"><i class="ri-customer-service-2-line"></i></span>
                </form>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Pembayaran Sukses -->
        <section class="py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5 pb-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-lg-9 bg-white borad-10 p-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fz-16 fw-600">Pembayaran Sukses</span>
                                <i style="font-size: 2rem;" class="ri-chat-check-fill hijau"></i> 
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row gap-2 d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <h5>Rp.</h5>
                                        <h2><?= rupiahFormat($data['amount']) ?></h2>
                                    </div>
                            </div>
                        </div>
                        <div class="row gap-2 d-flex justify-content-center">
                            <span class="fz-12 text-center">Waktu Selesai: <?= date('Y-m-d h:m' , $data['paid_at']) ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 bg-white py-3 mt-3">
                        <a href="pesanan-saya.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Metode Pembayaran<span> 
                            </div>                     
                            <div class="right">
                                <span class="text-dark fz-12 fw-600"><?= $data['method'] ?><span> 
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="pesanan-saya.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">No. Transaksi<span> 
                            </div>                     
                            <div class="right">
                                <span class="text-dark fz-12 fw-600"><?= $data['reference'] ?><span> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <a href="/" class="bg-blue px-3 py-2 fz-12 text-light borad-10">Kembali ke Home Page</a>
                </div>
            </div>
        </section>
        <!-- Navbar Bottom -->
        <?php include "partials/navBottom.php" ;?>
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