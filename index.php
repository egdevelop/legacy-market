<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Products</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "partials/navbar.php" ?>

        <!-- Carousel -->
        <section
            class="d-sm-flex align-items-sm-center justify-content-sm-center px-0 container-sm position-relative pt-sm-5">
            <div id="carouselExampleCaptions" class="carousel slide bg-info w-100" data-bs-ride="carousel">
                <div class="carousel-indicators position-absolute -bottom-15">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/banner.svg" class="d-block w-100 h-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/banner.svg" class="d-block w-100 h-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/banner.svg" class="d-block w-100 h-100 img-fluid" alt="...">
                    </div>
                </div>
            </div>

            <!-- Banner Sale -->
            <div class="bg-white-bannerSale -bannerSale mt-3 mt-sm-0">
                <div
                    class="d-flex align-items-center flex-sm-column justify-content-between justify-content-sm-start gap-2">
                    <div class="object-cover left saleImg">
                        <img src="assets/img/sale.svg" alt="" class="h-100 w-100 img-fluid object-cover">
                    </div>
                    <div class="object-cover right saleImg">
                        <img src="assets/img/sale.svg" alt="" class="h-100 w-100 img-fluid object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Flash Sale -->
        <div class="container bg-white py-4 px-2 px-sm-4 mt-4" id="flashsale">
            <div class="container">
                <div class="d-flex justify-content-between justify-content-sm-start gap-sm-4 mt-1">
                    <div class="left d-flex align-items-center">
                        <span class="fw-bold fz-20">Flash Sale</span>
                        <img src="assets/img/flashIcon.svg" alt="">
                    </div>
                    <div class="right">
                        <span class="fz-10 bg-abu p-1 fw-bold" id="jam">02</span>
                        <span class="">:</span>
                        <span class="fz-10 bg-abu p-1 fw-bold" id="menit">12</span>
                        <span class="">:</span>
                        <span class="fz-10 bg-abu p-1 fw-bold" id="detik">22</span>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $fs = flashsaleProducts(); 
                    foreach($fs as $a) : ?>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php?id=<?= $a['id'] ?>" class="mt-2">
                            <div class="card position-relative">
                                <img src="<?= $a['photos'] ?>" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-between gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. <?= $a['retail_price'] ?></div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp. <?= $a['retail_price'] * 0.57 ?></p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= $a['sold'] ?> terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <!-- Products -->
        <div class="container bg-white pt-4 pb-2 pb-sm-4 px-2 px-sm-4 mt-4">
            <div class="container">
                <div class="row d-flex flex-column flex-lg-row justify-content-lg-between">
                    <div class="col-3 d-flex justify-content-between mt-1">
                        <div class="left d-flex align-items-center">
                            <span class="fw-bold fz-20">Products</span>
                            <img src="assets/img/productsIcon.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container bg-white-products pt-2 pb-4 px-3 px-sm-0 mt-1">
            <div class="row">
                <?php
                $products = getAllProducts();
                foreach($products as $p) {
                    $img = getMainPic($p['id']);
                    $ratings = mysqli_query($conn, "SELECT rate FROM reviews WHERE id_product = $p[id]");
                    $rating = 0;
                    $row = 0;
                    while($r = mysqli_fetch_assoc($ratings)) {
                        $rating += $r['rate'];
                        $row++;
                    }
                    if($p['name'] == 'Member') {
                        continue;
                    }
                ?>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php?id=<?= $p['id'] ?>">
                        <div class="card">
                            <img src="<?= $img ?>" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600"><?= limitChar($p['name'], '50') ?></span>
                                <span class="orange fw-bold fz-10">Rp. <?= rupiahFormat($p['retail_price']) ?></span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left align-items-center">
                                        <span class="fz-10 text-dark"><?= (is_nan($rating / $row)) ? "Belum ada Rating" :  $rating / $row  ?></span>
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

        var asd = <?= count($fs) ?>;
        if(asd == 0) {
            document.getElementById("flashsale").style.display= "none";
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