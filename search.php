<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    if($keyword == 'asep') {
        echo "<script>alert('HALO DEKKKKK')</script>";
    }
    $sql = "SELECT * FROM products WHERE `name` LIKE '%$keyword%' ORDER BY sold DESC";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = getProduct($row['id']);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Hasil Pencairan Produk</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-block d-sm-none pb-4">
            <div class="container">
                <form class="pb-1 pt-4 d-flex gap-3 align-items-center justify-content-center nosubmit">
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                    <a href="keranjang.php" class="text-light iconNavbar z-1"><i class="ri-shopping-cart-line"></i></a>
                    <a href="chat.php" class="ms-3 text-light iconNavbar z-1"><i class="me-3 ri-customer-service-2-line"></i></a>
                </form>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Products -->
        <div class="mtSearch container bg-white py-3 px-2 px-sm-4">
            <div class="container">
                <div class="row d-flex flex-column flex-lg-row justify-content-lg-between">
                    <div class="col-12 d-flex justify-content-between mt-1">
                        <div class="d-flex align-items-center gap-1">
                            <span class="fw-bold fz-20">Hasil Pencarian</span>
                            <img src="assets/img/productsIcon.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-white-products pt-2 pb-4 px-3 px-sm-0 mt-1">
            <div class="row">
                <?php
                foreach($data as $p) {
                    $img = getMainPic($p['id']);
                ?>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php?id=<?= $p['id'] ?>">
                        <div class="card">
                            <img src="<?= $img ?>" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600"><?= limitChar($p['name'], '50') ?></span>
                                <span class="orange fw-bold fz-10">Rp. <?= $p['retail_price'] ?></span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left align-items-center">
                                        <span class="fz-10 text-dark">5</span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600"><?= $p['sold'] ?> terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Navbar Bottom -->
        <?php include "partials/navBottom.php" ; ?>
    </div>
    
    <!-- Foot -->
    <?php include "components/foot.php" ; ?>
    <script>

    var countDownDate = new Date("Aug 2 2022, 00:00:00").getTime();

    var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;
        
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    document.getElementById("jam").innerHTML = hours;
    document.getElementById("menit").innerHTML = minutes;
    document.getElementById("detik").innerHTML = seconds;
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("flashsale").style.display= "none";
    }
    }, 1000);

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