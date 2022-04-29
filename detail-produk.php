<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

    <title>Detail Products</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="container mt-3 position-absolute top-0 d-block d-sm-none">
            <form class="d-flex align-items-center justify-content-between">
                <a onclick="history.back()" class="bg-abu-trans px-2 borad-10">
                    <i style="font-size: 1.5rem;" class="ri-arrow-left-s-line text-light"></i>
                </a>
                <div class="right d-flex gap-2">
                    <div class="bg-abu-trans px-2 borad-10">
                        <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i
                                style="font-size: 1.5rem;" class="ri-shopping-cart-2-line text-light"></i>
                        </a>
                    </div>
                    <div class="bg-abu-trans px-2 borad-10">
                        <i style="font-size: 1.5rem;" class="ri-more-2-fill text-light"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue pt-2 pb-4 w-100 position-fixed z-3 d-none d-sm-block">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="left d-flex gap-2 align-items-center">
                        <span class="fz-12 text-light">Ikuti kami di</span>
                        <span class="text-light"><i class="ri-instagram-fill"></i></span>
                    </div>
                    <div class="cursor-pointer kanan d-flex align-items-center gap-2 position-relative">
                        <?php if (!$_SESSION['email']) : ?>
                        <a href="daftar.php" class="fz-12 text-light">Daftar</a>
                        <span class="fz-12 text-light">|</span>
                        <a href="login.php" class="fz-12 text-light">Login</a>
                        <?php else : ?>
                        <div class="dropdown">
                            <div class="dropbtn d-flex align-items-center me-2">
                                <img src="<?= $_SESSION['picture'] ?>" alt="" class="imgSmall">
                                <span class="fz-12 text-light ms-2">Muhammad Genta Mahardhika</span>
                            </div>
                            <div class="dropdown-content">
                                <a href="profilDetail.php" class="listProfile w-100 fz-12 m-auto">
                                    Akun saya
                                </a>
                                <a href="pesanan-saya.php" class="listProfile w-100 fz-12 m-auto">
                                    Pesanan saya
                                </a>
                                <a href="server/Login/logout.php" class="fz-12 m-auto listProfile w-100">
                                    Logout
                                </a>
                                <!-- <div class="panah"></div> -->
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <form class="mt-2 d-flex gap-5 align-items-center justify-content-center nosubmit">
                    <a href="index.php" class="bg-secondary text-light p-2">
                        <span>LOGO</span>
                    </a>
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk"
                        aria-label="Search">
                    <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1"><i
                            class="ri-shopping-cart-line"></i></a>
                    <a href="#" class="ms-3 text-light iconNavbar z-1"><i
                            class="me-3 ri-customer-service-2-line"></i></a>
                </form>
            </div>
        </div>

        <!-- Products Detail -->
        <div class="bg-white container px-0 mt-detailProducts p-sm-3 d-flex">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex flex-column">
                    <img src="assets/img/detail1.jpg" alt="" class="img-fluid">
                    <div class="container px-sm-0 mt-3">
                        <div class="d-flex justify-content-center gap-2">
                            <img src="assets/img/detailPilih1.jpg" alt=""
                                class="img-fluid detailPilih  activeDetailProducts">
                            <img src="assets/img/detailPilih2.jpg" alt="" class="img-fluid detailPilih">
                            <img src="assets/img/detailPilih3.jpg" alt="" class="img-fluid detailPilih">
                            <img src="assets/img/detailPilih4.jpg" alt="" class="img-fluid detailPilih">
                        </div>
                        <div class="d-flex justify-content-center gap-5 mt-3 d-none d-sm-flex">
                            <div class="left d-flex align-items-center gap-2 fz-14">
                                <i class="ri-arrow-go-forward-line"></i>
                                <span class="fz-12 text-secondary">Share</span>
                            </div>
                            <div class="right d-flex align-items-center gap-2 fz-14">
                                <i class="ri-heart-line"></i>
                                <span class="fz-12 text-secondary">Favorit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="mt-3 d-block d-sm-none">
                <ul class="d-flex align-items-center gap-3 justify-content-center nav nav-pills mb-3 pb-3"
                    id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button onclick="hide()" class="nav-link detailProduk fw-bold active" id="pills-home-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="false">Ecer</button>
                    </li>
                    <li class="nav-item fz-20" role="presentation">
                        |
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="show()" class="nav-link detailProduk fw-bold" id="pills-profile-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="true">Grosir</button>
                    </li>
                </ul>
                <div class="tab-content container" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="d-flex gap-3 text-center justify-content-center border-b-orange pb-4">
                            <div class="d-flex items-center flex-column">
                                <h3 class="orange fz-20 fw-600">Rp20.000</h3>
                                <span class="text-secondary fz-10">per 1 pcs ( Satuan )</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="d-flex gap-3 text-center justify-content-center border-b-orange pb-4">
                            <div class="d-flex items-center flex-column">
                                <h3 class="orange fz-16 fw-600">Rp19.000</h3>
                                <span class="text-secondary fz-10">per 60 pcs</span>
                            </div>
                            <div class="d-flex items-center flex-column">
                                <h3 class="orange fz-16 fw-600">Rp18.000</h3>
                                <span class="text-secondary fz-10">per 60 pcs</span>
                            </div>penila
                            <div class="d-flex items-center flex-column">
                                <h3 class="orange fz-16 fw-600">Rp16.500</h3>
                                <span class="text-secondary fz-10">per 60 pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
                <div class="col-12 col-lg-7 position-relative pt-2">
                    <div class="container">
                        <ul onclick="myFunction(event)"
                            class="container mt-4 d-flex justify-content-center gap-3 d-flex d-sm-none nav nav-pills mb-3"
                            id="pills-tab" role="tablist">
                            <li class="nav-item fz-14 fw-600 px-3" role="presentation">
                                <button class="nav-link-custom activeDetailProduk" id="ecer" data-bs-toggle="pill"
                                    data-bs-target="#Ecer" type="button" role="tab" aria-controls="ecer"
                                    aria-selected="true">Ecer</button>
                            </li>
                            <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                            <li class="nav-item fz-14 fw-600 px-3" role="presentation">
                                <button class="nav-link-custom" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#Grosir" type="button" role="tab" aria-controls="grosir"
                                    aria-selected="false">Grosir</button>
                            </li>
                        </ul>
                        <div class="tab-content d-sm-none" id="pills-tabContent">
                            <div class="tab-pane mt-4 fade show active" id="Ecer" role="tabpanel"
                                aria-labelledby="ecer">
                                <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                    <h5 class="orange">Rp20.000</h5>
                                    <span class="fz-9 fw-600 abu">per 1 pcs ( Satuan )</span>
                                </div>
                                <hr class="mb-3 orange">
                            </div>
                            <div class="tab-pane mt-4 fade" id="Grosir" role="tabpanel" aria-labelledby="grosir">
                                <div class="d-flex justify-content-center gap-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <h5 class="orange">19.000</h5>
                                        <span class="fz-9 fw-600 abu">per 60 pcs</span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <h5 class="orange">18.000</h5>
                                        <span class="fz-9 fw-600 abu">per 100 - 300 pcs</span>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <h5 class="orange">Rp16.500</h5>
                                        <span class="fz-9 fw-600 abu"> 300 pcs</span>
                                    </div>
                                </div>
                                <hr class="mb-5 orange">
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mt-2">Jocoproduction - Topi Baseball Anak Laki-laki Perempuan Motif
                            bordir Alfabeth</h6>
                        <div class="d-flex align-items-center justify-content-between gap-1">
                            <div class="left d-flex align-items-center gap-1">
                                <span class="fz-12 yellow">4.5</span>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <span class="fz-12 text-secondary mx-2 d-none d-sm-flex">|</span>
                                <span class="fz-12 text-secondary d-none d-sm-flex">112 Penilaian</span>
                                <span class="fz-12 text-secondary mx-2">|</span>
                                <span class="fz-12 text-secondary">112 Terjual</span>
                            </div>
                            <div class="right d-flex gap-2 d-flex d-sm-none">
                                <span class="text-dark"><i class="ri-heart-line"></i></span>
                                <span class="text-dark"><i class="ri-arrow-go-forward-line"></i></span>
                                <span class="text-dark"><i class="ri-whatsapp-line"></i></span>
                            </div>
                        </div>
                        <!-- <span class="text-secondary fz-12">2.5 Rb Terjual</span> -->
                        <div class="d-flex gap-3 mt-3 d-none d-sm-flex">
                            <button type="button" class="btn-outline-yellow px-5 py-2">Ecer</button>
                            <button type="button" class="btn-outline-abu px-5 py-2">Grosir</button>
                        </div>
                        <div class="mt-3 d-flex gap-3 align-items-center d-none d-sm-flex">
                            <span class="fz-18 fw-600 orange">Rp20.000</span>
                            <span class="fz-12 text-secondary">per 1 pcs ( Satuan )</span>
                        </div>
                        <div class="row mt-3 d-flex align-items-center d-none d-sm-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Diskon produk</span>
                            </div>
                            <div class="col-9">
                                <span class="text-light fz-10 fw-500 bg-yellow px-flash">57% OFF</span>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex d-none d-sm-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Pengiriman</span>
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <div class="right d-flex gap-2">
                                    <img src="assets/img/free.svg" alt="">
                                    <div class="d-flex gap-2 flex-column">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="fz-11 fw-600 px-flash">Gratis Ongkir</span>
                                            <img src="assets/img/truck.svg" alt="">
                                        </div>
                                        <span class="fz-10">Gratis ongkir khusus pembelian grosir</span>
                                    </div>
                                </div>
                                <div class="right mt-3">
                                    <div class="row">
                                        <div class="col-8 d-flex gap-2 flex-column">
                                            <div class="d-flex gap-2 align-items-center">
                                                <img src="assets/img/truckBlack.svg" alt="">
                                                <span class="fz-11 px-flash">Pengiriman ke</span>
                                                <!-- <img src="assets/img/truck.svg" alt=""> -->
                                            </div>
                                            <!-- <span class="fz-11">Ongkos kirim</span> -->
                                        </div>
                                        <div class="col-4">
                                            <select class="kota fz-12 fw-600" name="kota" id="kota">
                                                <option value="volvo">Tasikmalaya</option>
                                                <option value="saab">Bandung</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 d-flex gap-2 flex-column">
                                            <div class="d-flex gap-2 align-items-center">
                                                <img src="assets/img/truckBlack.svg" alt="" class="opacity-0">
                                                <span class="fz-11 px-flash">Ongkos kirim</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <select class="ongkir fz-12 fw-600" name="ongkir" id="ongkir">
                                                <option value="volvo">Rp0 - Rp20.000</option>
                                                <option value="saab">Rp0 - Rp20.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center d-none d-sm-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Variasi</span>
                            </div>
                            <div class="col-9 row ps-3">
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">M - Coklat</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">U - Hijau</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">N - Merah Muda</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">S - Kuning</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">P - Biru</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">A - Kunyit</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">C - Putih</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">D - Hitam</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">R - Maroon</span>
                                </label>
                                <label class="col-3 col-sm-4 col-md-3 card-variasi px-0">
                                    <input type="radio" name="radioVariasi" class="radio-variasi" />
                                    <span class="radio-btn variasi px-2 fz-10">B - Biru Tua</span>
                                </label>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center d-none d-sm-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Kuantitas</span>
                            </div>
                            <div class="col-9 d-flex gap-2 align-items-center">
                                <div class="wrapper">
                                    <span class="minus">-</span>
                                    <span class="num">1</span>
                                    <span class="plus">+</span>
                                </div>
                                <span class="fz-10 text-secondary">Tersisa 200 Buah</span>
                            </div>
                        </div>
                        <div class="mt-3 pb-3 pb-sm-0 d-flex justify-content-between justify-content-sm-start gap-2">
                            <button
                                class="px-3 py-sm-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center">
                                <span class="fw-600 fz-res"><i class="ri-chat-1-line"></i></span>
                                <span class="fw-600 d-none d-sm-flex"> Chat Penjual</span>
                            </button>

                            <!-- Desktop -->
                            <button type="button" id="liveToastBtn"
                                class="d-none d-sm-flex px-3 py-sm-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center">
                                <span class="fw-600 fz-res"><i class="ri-shopping-cart-line"></i></span>
                                <span class="fw-600 d-none d-sm-flex"> Masukkan Keranjang</span>
                            </button>

                            <!-- mobile -->
                            <a data-bs-toggle="modal" href="#exampleModalToggle" role="button"
                                class="d-flex d-sm-none px-3 py-sm-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center">
                                <span class="fw-600 fz-res"><i class="ri-shopping-cart-line"></i></span>
                                <span class="fw-600 d-none d-sm-flex"> Masukkan Keranjang</span>
                            </a>

                            <!-- Desktop -->
                            <a href="keranjang.php"
                                class="d-none d-sm-flex d-flex align-items-center justify-content-center px-3 py-sm-1 btn-blue fz-12">
                                <span class="text-light"> Beli Sekarang</span>
                            </a>

                            <!-- mobile -->
                            <a data-bs-toggle="modal" href="#exampleModalToggle" role="button"
                                class="d-flex d-sm-none align-items-center justify-content-center px-3 py-sm-1 btn-blue fz-12">
                                <span class="text-light"> Beli Sekarang</span>
                            </a>

                            <!-- Alert Keranjang -->
                            <div class="toast-res position-fixed bottom-0 end-0" style="z-index: 11">
                                <div id="liveToast" class="toast" style="background-color: #000;" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="opacity-0 me-auto">Bootstrap</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body d-flex flex-column flex-wrap align-items-center text-center">
                                        <span class="hijau fz-20"><i class="ri-checkbox-circle-fill"></i></span>
                                        <span class="text-light fz-13">Produk telah ditambahkan ke keranjang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-light fw-bold fz-14 text-center z-3 position-absolute desc1 d-none" id="hide2">
                        Halaman
                        Grosir Khusus Member</p>
                </div>
            </div>
            <!-- <div class="container py-2">
                <div class="d-flex gap-3 justify-content-center">
                    <div class="left me-3">
                        <i style="font-size: 1.5rem;" class="me-3 blue ri-chat-1-line"></i>
                        <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i
                                style="font-size: 1.5rem;" class="me-3 blue ri-shopping-cart-2-line"></i></a>
                    </div>
                    <div class="right">
                        <a class="btn text-light bg-blue px-4 py-2" data-bs-toggle="modal" href="#exampleModalToggle"
                            role="button">Beli Sekarang</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="position-relative container-sm px-0 mt-sm-4">
        <div class="bg-disable position-absolute top-0 start-0 end-0 bottom-0 h-100 d-none" id="hide3"></div>
        <!-- Desc Price -->
        <!-- <div class="bg-white container py-4">
            <div class="d-none" id="hide4">
                <p class="text-light fw-bold fz-13 text-center z-3 position-absolute desc1"><i
                        style="font-size: 6.5rem; top: -50px"
                        class="ri-lock-2-fill z-2 position-absolute desc2 text-light"></i></p>
                <p class="text-light fz-14 text-center z-3 position-absolute desc3 px-5">Nikmati harga grosir diatas
                    dengan bergabung bersama kami</p>
                <div class="d-flex position-absolute desc4">
                    <button
                        class="btn text-light fz-13 text-center z-3 fw-bold bg-blue desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                        <span class="text-light fz-13 text-center z-3 fw-bold">Bulanan</span>
                        <span class="text-light fz-13 text-center z-3 fw-normal">Rp200.000</span>
                    </button>
                    <button
                        class="btn text-light fz-13 text-center z-3 fw-bold bg-yellow desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                        <span class="text-light fz-13 text-center z-3 fw-bold">3 Bulan</span>
                        <span class="text-light fz-13 text-center z-3 fw-normal">Rp450.000</span>
                    </button>
                    <button
                        class="btn text-light fz-13 text-center z-3 fw-bold bg-orange desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                        <span class="text-light fz-13 text-center z-3 fw-bold">Tahunan</span>
                        <span class="text-light fz-13 text-center z-3 fw-normal">Rp600.000</span>
                    </button>
                    <p class="text-light fz-14 text-center z-3 position-absolute desc3 px-5"></p>
                </div>
                <p class="text-light fz-14 text-center z-3 position-absolute desc5 px-3">Klik salah satu untuk
                    bergabung</p>
            </div>
            <div class="container">
                <div class="d-flex gap-2">
                    <img src="assets/img/free.svg" alt="">
                    <div class="d-flex flex-column">
                        <div class="d-flex gap-2">
                            <span class="fz-14 fw-bold">Gratis ongkir</span>
                            <img src="assets/img/truck.svg" alt="">
                        </div>
                        <div class="down">
                            <span class="fz-10 text-secondary">Gratis ongkir khusus pembelian grosir</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="bg-white container mt-3 pt-3 d-flex d-sm-none align-items-center justify-content-between">
            <div class="d-flex flex-column">
                <div class="row d-flex align-items-center gap-2">
                    <div class="col-2">
                        <img src="assets/img/free.svg" alt="" class="free">
                    </div>
                    <div class="col-9 d-flex flex-column">
                        <div class=" d-flex gap-2">
                            <span class="fz-14 fw-bold">Gratis ongkir</span>
                            <img src="assets/img/truck.svg" alt="">
                        </div>
                        <div class="down">
                            <span class="fz-10 text-secondary">Gratis ongkir khusus pembelian grosir</span>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center gap-2">
                    <div class="col-2">
                        <span class="text-dark" style="font-size: 30px"><i class="ri-truck-fill"></i></span>
                    </div>
                    <div class="col-9 d-flex gap-2">
                        <span class="fz-10">Ongkos kirim:</span>
                        <span class="fz-10 fw-bold">Rp0 - Rp20.000</span>
                    </div>
                </div>
            </div>
            <div class="right">
                <span><i class="ri-arrow-right-s-line"></i></span>
            </div>
        </div>

        <div class="bg-white container">

        </div>

        <!-- Variasi Mobile -->


        <!-- Spesifikasi -->
        <div class="bg-white mt-3 pt-sm-4 pb-3">
            <div class="container p-2">
                <!-- Desktop -->
                <span class="d-none d-sm-block fz-14 fw-600 bg-abu-muda d-flex p-2">
                    Spesifikasi produk
                </span>

                <!-- Mobile -->
                <span class="d-block d-sm-none fz-14 fw-500 d-flex p-2">
                    Rincian produk
                </span>
                <hr class="my-1 py-0">
                <div class="mt-3 p-2">
                    <div class="row d-flex gap-3 mb-2">
                        <span class="col-4 col-sm-2 fz-13 text-secondary fw-500">Tipe Produk</span>
                        <span class="col-7 col-sm-7 fz-13">Ecer & Grosir</span>
                    </div>
                    <div class="row d-flex gap-3 mb-2">
                        <span class="col-4 col-sm-2 fz-13 text-secondary fw-500">Berat</span>
                        <span class="col-7 col-sm-7 fz-13">80g</span>
                    </div>
                    <div class="row d-flex gap-3 mb-2">
                        <span class="col-4 col-sm-2 fz-13 text-secondary fw-500">Stok</span>
                        <span class="col-7 col-sm-7 fz-13">200</span>
                    </div>
                    <div class="row d-flex gap-3 mb-2">
                        <span class="col-4 col-sm-2 fz-13 text-secondary fw-500">Dikirim dari</span>
                        <span class="col-7 col-sm-7 fz-13 text-uppercase">KOTA TANGERANG - TANGERANG, BANTEN, ID
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="bg-white pt-sm-4 pb-3">
            <div class="container p-2">
                <span class="fz-14 fw-600 bg-abu-muda d-flex p-2 d-none d-sm-block">
                    Deskripsi produk
                </span>
                <div class="mt-sm-3 p-2">
                    <p class="fz-13">Hi.. mom's cari produk topi berkualitas untuk buah hati?
                    </p>
                    <p class="fz-13 mt-2">Nih Mom's ada produk topi terbaru dan berkualitas dari Jocoproduction..
                    </p>
                    <p class="fz-13">Cocok untuk cewek dan cowok, yukk moms agar si buah hati tampil makin kece,
                        cantik,
                        ganteng, lucu
                        dan imutt pastinya.
                    </p>
                    <p class="fz-13">SPESIFIKASI PRODUK :</p>
                    <ul class="mt-3 fz-13" style="list-style-type: '-'; padding-left: 5px; line-height: 30px">
                        <li> Bahan tebal</li>
                        <li>Tidakberbulu</li>
                        <li>Nyaman di gunakan si buah hati</li>
                        <li>Cocok untuk anak perempuan maupun laki laki</li>
                        <li>Perkiraan usia untuk 3- 10tahun</li>
                        <li>Lingkar kepala kurang lebih 48cm bisa di atur hingga 55cm</li>
                        <li> Bagian belakang topi terdapat pengatur untuk memperbesar dan memperkecil topi sehingga
                            menyesuaikan bentuk kepala anak
                        </li>
                        <li>Berat : 80gr <br>1kg muat 15pcs</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white mt-4 pt-4 px-sm-4 pb-3">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left d-flex flex-column">
                        <span class="fz-14 fw-600">
                            Penilaian produk
                        </span>
                        <div class="d-flex align-items-center d-flex d-sm-none">
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow mx-2">4.9/5</span>
                            <span class="fz-10 yellow mx-2">(115 Ulasan)</span>
                        </div>
                    </div>
                    <div class="right d-flex d-sm-none">
                        <div class="left">
                            <span class="blue fz-11">Lihat semua</span>
                        </div>
                        <div class="right">
                            <span class="blue"><i class="ri-arrow-right-s-line"></i></span>
                        </div>
                    </div>
                </div>
                <hr class="my-2 py-0">
                <div class="row bg-pink p-4 mt-3 d-none d-sm-flex align-items-center justify-content-start">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-start flex-column">
                            <div class="left ms-2">
                                <span class="fz-16 fw-700 yellow">4.9</span>
                                <span class="fz-12 fw-500 yellow">dari 5</span>
                            </div>
                            <div class="right">
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow">4.9/5</span>
                                <span class="fz-13 yellow">(115 Ulasan)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Semua</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">5 Bintang (107)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">4 Bintang (5)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">3 Bintang (2)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">2 Bintang (0)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">1 Bintang (0)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Komentar (34)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Media (33)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Member (1)</span>
                        </label>
                    </div>
                </div>
                <div class="row d-flex my-4 ms-sm-4">
                    <div class="col-1 profile">
                        <img src="assets/img/profile.jpg" alt="" class="profileImg">
                    </div>
                    <div class="col-9 d-flex flex-column">
                        <span class="fz-10">Achmad</span>
                        <div class="star">
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                        </div>
                        <span class="fz-10">2022-04-05 11:58 | Variasi: N - MERAH MUDA
                        </span>
                        <span class="fz-12 mt-3">Alhamdulilah Barang sudah sampai dipacking dengan rapi.. bagus
                            tidak
                            rusak.
                            Terima kasih
                        </span>
                        <div class="d-flex gap-2">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row d-flex my-4 ms-sm-4">
                    <div class="col-1 profile">
                        <img src="assets/img/profile.jpg" alt="" class="profileImg">
                    </div>
                    <div class="col-9 d-flex flex-column">
                        <span class="fz-10">Achmad</span>
                        <div class="star">
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                        </div>
                        <span class="fz-10">2022-04-05 11:58 | Variasi: N - MERAH MUDA
                        </span>
                        <span class="fz-12 mt-3">Alhamdulilah Barang sudah sampai dipacking dengan rapi.. bagus
                            tidak
                            rusak.
                            Terima kasih
                        </span>
                        <div class="d-flex gap-2">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                            <img src="assets/img/imgUlasan.jpg" alt="" class="imgUlasan mt-3">
                        </div>
                    </div>
                </div>
                <hr />

            </div>
        </div>

        <!-- Products -->
        <div class="container bg-white py-2 py-sm-4 pt-2 px-2 px-sm-4 mt-4">
            <div class="container">
                <div class="row d-flex flex-column flex-lg-row justify-content-lg-between">
                    <div class="col-12 d-flex justify-content-between mt-1">
                        <div class="left d-flex align-items-center gap-1">
                            <span class="fz-20 fw-bold d-none d-sm-block">Produk Serupa</span>
                            <span class="fz-14 d-block d-sm-none fw-600">Produk Serupa</span>
                            <img src="assets/img/productsIcon.svg" alt="" class="d-none d-sm-flex">
                        </div>
                        <div class="right d-flex d-sm-none">
                            <div class="left">
                                <span class="blue fz-11">Lihat semua</span>
                            </div>
                            <div class="right">
                                <span class="blue"><i class="ri-arrow-right-s-line"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=" container py-2 py-sm-4 pt-2 px-3 px-sm-0 mb-4">
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 px-2 my-2">
                    <a href="detail-produk.php">
                        <div class="card">
                            <img src="assets/img/products5.jpg" alt="" class="w-100">
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
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
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
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
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
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
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
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
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
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
                            <div class="desc py-2 px-2 px-lg-3">
                                <p class="text-dark fw-600 mt-1 fz-12 fw-600">Topi Fashion <br> Anak Laki-Laki &
                                    Perempuan
                                </p>
                                <span class="d-block orange fw-bold fz-10">Rp13.900 - Rp13.990</span>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                        <i class="yellow fz-9 ri-star-fill"></i>
                                    </div>
                                    <div class="right">
                                        <span class="text-dark fz-10 fw-600">112 terjual</span>
                                    </div>
                                </div>
                            </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Varian -->
        <!-- <div class="bg-white pt-4 pb-3">
            <div class="container">
                <span class="fz-14 fw-bold">Pilih Varian</span>
                <div class="d-flex gap-2 justify-content-center mt-2">
                    <img src="assets/img/varian.jpg" alt="" class="varian activeVarian">
                    <img src="assets/img/varian.jpg" alt="" class="varian">
                    <img src="assets/img/varian.jpg" alt="" class="varian">
                    <img src="assets/img/varian.jpg" alt="" class="varian">
                </div>
            </div>
        </div> -->
    </div>

    <!-- Cart Modal -->
    <div class="modal animateCustom" id="exampleModalToggle" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog border-none"
            style="position: absolute !important; bottom: 0 !important; margin: 0; max-height: 100%;">
            <div class="modal-content" style="border: none; outline: none; border-radius: 0">
                <div class="modal-body">
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/img/productsCart.jpg" alt="">
                        <div class="d-flex flex-column">
                            <span class="fz-16 orange fw-600">Rp20.000</span>
                            <span class="fz-12 fw-500">Stok : 123</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="width:90%">
                    <span class="fz-12 mb-3">Variasi</span>
                    <div class="d-flex gap-3 flex-wrap">
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">M - Coklat</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0 kosong">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">U - Hijau</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">N - Merah Muda</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">S - Kuning</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">P - Biru</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">A - Kunyit</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">C- Putih</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">D - Hitam</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">R - Maroon</span>
                            </div>
                        </label>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10">B - Biru Tua</span>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="left">
                        <span class="fz-14">Jumlah</span>
                    </div>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                    <a href="keranjang.php" class="btn bg-blue text-light w-100">Masukkan Keranjang</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var navCustom = document.querySelectorAll('.nav-link-custom');

        if (navCustom) {

            navCustom.forEach(function(el, key) {

                el.addEventListener('click', function() {
                    console.log(key);

                    el.classList.toggle("activeDetailProduk");

                    navCustom.forEach(function(ell, els) {
                        if (key !== els) {
                            ell.classList.remove('activeDetailProduk');
                        }
                        console.log(els);
                    });
                });
            });
        }
    });

    // Show Hide Member Features
    function hide() {
        document.getElementById("hide1").classList.add("d-none");
        document.getElementById("hide2").classList.add("d-none");
        document.getElementById("hide3").classList.add("d-none");
        document.getElementById("hide4").classList.add("d-none");
    }

    function show() {
        document.getElementById("hide1").classList.add("d-block");
        document.getElementById("hide2").classList.add("d-block");
        document.getElementById("hide3").classList.add("d-block");
        document.getElementById("hide4").classList.add("d-block");
        document.getElementById("hide1").classList.remove("d-none");
        document.getElementById("hide2").classList.remove("d-none");
        document.getElementById("hide3").classList.remove("d-none");
        document.getElementById("hide4").classList.remove("d-none");
    }

    // Navbar Scroll
    var mainNav = document.querySelector('.main-nav');

    window.onscroll = function() {
        windowScroll();
    };

    function windowScroll() {
        mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
    }

    // Button Cart Increment Decrement
    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");
    let a = 1;
    plus.addEventListener("click", () => {
        a++;
        a = (a < 10) ? a : a;
        num.innerText = a;
    });

    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? a : a;
            num.innerText = a;
        }
    });

    // Popup Keranjang
    var toastTrigger = document.getElementById('liveToastBtn')
    var toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', function() {
            var toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>