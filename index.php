<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Products</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue">
            <div class="container mt-3 position-absolute top-0">
                <form class="d-flex gap-3 align-items-center justify-content-center nosubmit">
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                    <a href="keranjang.php" class="text-light iconNavbar z-1"><i class="ri-shopping-cart-line"></i></a>
                    <span class="iconNavbar z-1"><i class="ri-customer-service-2-line"></i></span>
                </form>
            </div>
        </div>

        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators position-absolute -bottom-15">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/banner.svg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/banner.svg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/banner.svg" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
        </div>

        <!-- Banner Sale -->
        <div class="bg-white py-3 border-bottom-custom">
            <div class="container mt-flash">
                <div class="d-flex justify-content-between gap-2">
                    <div class="left">
                        <img src="assets/img/sale1.svg" alt="" class="img-fluid">
                    </div>
                    <div class="right">
                        <img src="assets/img/sale2.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Sale -->
        <div class="bg-white py-2 px-0 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between mt-1">
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
                    <div class="col-6 px-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products1.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <div class="text-abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 px-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products2.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/flash.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <div class="text-abu fz-10 fw-bold text-decoration-line-through">Rp. 55.000</div>
                                    <div class="text-light fz-10 fw-bold bg-yellow px-flash">57% OFF</div>
                                </div>
                                <p class="orange fw-bold mt-1">Rp23.400</p>
                                <div class="progress bg-blue-muda w-100 borad-10">
                                    <div class="progress-bar bg-blue text-light fz-11 text-center w-50 border-l-radius-10 px-1" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">12 terjual</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hot Products -->
        <div class="bg-white py-2 px-0 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between mt-1">
                    <div class="left d-flex align-items-center">
                        <h5 class="fw-bold">Hot Products</h5>
                        <img src="assets/img/hotIcon.svg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 px-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Black Pink</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 px-2">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products4.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-center justify-content-center">
                                <p class="text-dark fw-600 mt-1 fz-12">Topi Anak Motif Last Bear</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="bg-white pt-2 px-0">
            <div class="container border-bottom-custom">
                <div class="d-flex justify-content-between mt-1">
                    <div class="left d-flex align-items-center">
                        <h5 class="fw-bold">Products</h5>
                        <img src="assets/img/productsIcon.svg" alt="">
                    </div>
                </div>
                <div class="row border-bottom-custom mt-2">
                    <div class="col-6 mb-2 px-2">
                        <div class="bg-blue text-light p-2">
                            <span class="fw-bold fz-12">Recommended</span>
                        </div>
                    </div>
                    <div class="col-6 mb-2 px-2">
                        <div class="bg-abu p-2 text-dark p-2">
                            <span class="fw-bold fz-12">Terbaru</span>
                        </div>
                    </div>
                    <div class="col-6 mb-2 px-2">
                        <div class="bg-abu p-2 text-dark p-2">
                            <span class="fw-bold fz-12">Terlaris</span>
                        </div>
                    </div>
                    <div class="col-6 mb-2 px-2">
                        <div class="bg-abu text-dark p-2 d-flex align-items-center justify-content-between">
                            <div class="fw-bold fz-12">Harga</div>
                            <div><i class="ri-arrow-down-s-line"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 px-2 border-bottom-custom">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products5.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-start justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-bold">Topi Fashion Anak Laki - Laki & Perempuan</p>
                                <p class="orange fw-bold fz-10">Rp13.900 - Rp13.990</p>
                                <div class="d-flex">
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                </div>
                                <div class="mt-1 fz-10 fw-600">112 terjual</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 px-2 border-bottom-custom">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-start justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-bold">Topi Fashion Anak Laki - Laki & Perempuan</p>
                                <p class="orange fw-bold fz-10">Rp13.900 - Rp13.990</p>
                                <div class="d-flex">
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                </div>
                                <div class="mt-1 fz-10 fw-600">112 terjual</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 px-2 border-bottom-custom">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products5.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-start justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-bold">Topi Fashion Anak Laki - Laki & Perempuan</p>
                                <p class="orange fw-bold fz-10">Rp13.900 - Rp13.990</p>
                                <div class="d-flex">
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                </div>
                                <div class="mt-1 fz-10 fw-600">112 terjual</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 px-2 border-bottom-custom">
                        <a href="detail-produk.php" class="mt-2">
                            <div class="card position-relative">
                                <img src="assets/img/products3.jpg" class="card-img-top" alt="...">
                                <img src="assets/img/hot.svg" alt="" class="flash">
                            </div>
                            <div class="card-body pt-2 ps-1 d-flex flex-column align-items-start justify-content-start">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-bold">Topi Fashion Anak Laki - Laki & Perempuan</p>
                                <p class="orange fw-bold fz-10">Rp13.900 - Rp13.990</p>
                                <div class="d-flex">
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                    <i class="yellow fz-11 ri-star-fill"></i>
                                </div>
                                <div class="mt-1 fz-10 fw-600">112 terjual</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>