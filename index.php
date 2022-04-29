<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Products</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "components/navbar.php" ?>

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
        <div class="container bg-white py-4 px-2 px-sm-4 mt-4">
            <div class="container">
                <div class="d-flex justify-content-between justify-content-sm-start gap-sm-4 mt-1">
                    <div class="left d-flex align-items-center">
                        <h5 class="fw-bold">Flash Sale</h5>
                        <img src="assets/img/flashIcon.svg" alt="">
                    </div>
                    <div class="right">
                        <span class="fz-10 bg-abu p-1 fw-bold">0</span>
                        <span class="fz-10 bg-abu p-1 fw-bold">2</span>
                        <span class="">:</span>
                        <span class="fz-10 bg-abu p-1 fw-bold">1</span>
                        <span class="fz-10 bg-abu p-1 fw-bold">2</span>
                        <span class="">:</span>
                        <span class="fz-10 bg-abu p-1 fw-bold">2</span>
                        <span class="fz-10 bg-abu p-1 fw-bold">2</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products1.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-between gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <div class="abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hot Products -->
        <div class="container bg-white py-4 px-2 px-sm-4 mt-4">
            <div class="container">
                <div class="d-flex justify-content-between mt-1">
                    <div class="left d-flex align-items-center">
                        <h5 class="fw-bold">Hot Products</h5>
                        <img src="assets/img/hotIcon.svg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Black Pink</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products4.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-center">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Last Bear</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Black Pink</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products4.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-center">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Last Bear</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Black Pink</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products4.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div
                                class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-center">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Last Bear</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="container bg-white pt-4 pb-2 pb-sm-4 px-2 px-sm-4 mt-4">
            <div class="container">
                <div class="row d-flex flex-column flex-lg-row justify-content-lg-between">
                    <div class="col-3 d-flex justify-content-between mt-1">
                        <div class="left d-flex align-items-center">
                            <h5 class="fw-bold">Products</h5>
                            <img src="assets/img/productsIcon.svg" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 row mt-2">
                        <div class="col-6 col-md-3 mb-2 px-2">
                            <div class="bg-blue text-light p-2 p-md-3">
                                <span class="fw-bold fz-12">Recommended</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2 px-2">
                            <div class="bg-abu p-2 text-dark p-2 p-md-3">
                                <span class="fw-bold fz-12">Terbaru</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2 px-2">
                            <div class="bg-abu p-2 p-md-3 text-dark p-2">
                                <span class="fw-bold fz-12">Terlaris</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2 px-2">
                            <div class="bg-abu text-dark p-2 p-md-3 d-flex align-items-center justify-content-between">
                                <div class="fw-bold fz-12">Harga</div>
                                <div><i class="ri-arrow-down-s-line"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container bg-white-products pt-2 pb-4 px-3 px-sm-0 mt-1">
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="d-flex flex-column desc py-2 px-2 px-lg-3">
                                <span class="text-dark fw-600 mt-1 mb-2 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </span>
                                <span class="orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <div class="left">
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                        <span class="yellow fz-9"><i class="yellow fz-9 ri-star-fill"></i></span>
                                    </div>
                                    <div class="right">
                                        <span class="black fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    var mainNav = document.querySelector('.main-nav');

    window.onscroll = function() {
        windowScroll();
    };

    function windowScroll() {
        mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>