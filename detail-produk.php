<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$product = getProductDetails($_GET['id']);

$kota = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM address WHERE user_id = '" . $_SESSION['userid'] . "' AND isPrimary = 1"));

if(isset($_SESSION['userid'])){
    $cart = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$_SESSION[userid]'"));
}else{
    $cart = 0;
}

?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    <title>Detail Products</title>
</head>

<body style="overflow-x: hidden;">

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="container mt-3 position-absolute top-0 d-block d-lg-none">
            <form class="d-flex align-items-center justify-content-between">
                <a onclick="history.back()" class="bg-abu-trans px-2 borad-10">
                    <i style="font-size: 1.5rem;" class="ri-arrow-left-s-line text-light"></i>
                </a>
                <div class="right d-flex gap-2">
                    <div class="bg-abu-trans px-2 borad-10 position-relative">
                        <a href="keranjang.php">
                                <i style="font-size: 1.5rem;" class="ri-shopping-cart-2-line text-light"></i>
                                <span style="background: rgba(29, 29, 29, 0.37); color: #fff" class="numCart d-flex justify-content-center align-items-center">
                                    <span class="fz-12"><?= $cart ?></span>
                                </span>
                            </a>
                        </div>
                        <!-- Popup Keranjang -->
                        <div class="offcanvas offcanvas-bottom" style="height: 50%" tabindex="-1" id="cartCanvas" aria-labelledby="offcanvasBottomLabel">
                            <div class="offcanvas-body small">
                                <div class="modal-body">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="assets/img/productsCart.jpg" alt="">
                                        <div class="d-flex flex-column">
                                            <span class="fz-16 orange fw-600">Rp. <span id="retail">20000</span></span>
                                            <span class="fz-12 fw-500">Stok : <span id="stok"><?= $product['stock'] ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body" style="width:90%">
                                    <span class="fz-12 mb-3">Variasi</span>
                                    <div class="d-flex gap-3 mb-5 flex-wrap">
                                        <?php foreach($product['variants'] as $v) : ?>
                                        <label class="card-variasi px-0">
                                            <input type="radio" name="radioVariasi" class="radio-variasi" onclick="
                                            document.getElementById('retail').innerText = '<?= $v['retail_price'] ?>';
                                            document.getElementById('stok').innerText = '<?= $v['stock'] ?>';
                                            document.getElementById('asd').href = 'server/process/addToCart.php?id=' + <?= $v['id'] ?> + '&qty=' + 1;
                                            document.getElementById('num2').innerText = 1;
                                            " />
                                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                                <span class="radio-btn text-dark px-2 fz-10"><?= $v['name'] ?></span>
                                            </div>
                                            <input type="hidden" id="id" value="<?= $v['id'] ?>">
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between mb-5">
                                    <div class="left">
                                        <span class="fz-14">Jumlah</span>
                                    </div>
                                    <span class="minus" onclick="
                                        const a = document.getElementById('num2');
                                        if(parseInt(a.innerText) > 1) {
                                            a.innerText = parseInt(a.innerText) - 1;
                                        }
                                        const id = document.getElementById('id');
                                        document.getElementById('asd').href = 'server/process/addToCart.php?id=' + id.value + '&qty=' + a.innerText;
                                        ">-</span>
                                        <span class="num" id="num2">1</span>
                                        <span class="plus" onclick="
                                        const a = document.getElementById('num2');
                                        a.innerText = parseInt(a.innerText) + 1;
                                        const id = document.getElementById('id');
                                        document.getElementById('asd').href = 'server/process/addToCart.php?id=' + id.value + '&qty=' + a.innerText;
                                        ">+</span>
                                    </span>
                                    <a href="javascript:void(0)" id="asd" class="fz-14 m-0 position-fixed bottom-0 start-0 end-0 btn bg-blue text-light">Masukkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button style="border: none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" class="bg-abu-trans px-2 borad-10">
                            <i style="font-size: 1.5rem;" class="ri-more-2-fill text-light"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item fz-12" href="pesanan-saya.php">Pesanan Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fz-12" href="#" data-bs-toggle="modal" data-bs-target="#gantiVoucher">Voucher Saya</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fz-12" href="member.php">Member</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fz-12" href="pengaturanAkun.php">Pengaturan Akun</a></li>
                        </ul>
                    </div>
                    <!-- Modal Voucher -->
                    <?php include "partials/gantiVoucherModal.php"; ?>
                </div>
            </form>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue pt-2 pb-2 w-100 position-fixed z-3 d-none d-sm-block">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="left d-flex gap-2 align-items-center">
                        <span class="fz-12 text-light">Ikuti kami di</span>
                        <span class="text-light"><i class="ri-instagram-fill"></i></span>
                    </div>
                    <div class="cursor-pointer kanan d-flex align-items-center gap-2 position-relative">
                        <?php if (!isset($_SESSION['userid'])) : ?>
                        <a href="daftar.php" class="fz-12 text-light">Daftar</a>
                        <span class="fz-12 text-light">|</span>
                        <a href="login.php" class="fz-12 text-light">Login</a>
                        <?php else : ?>
                            <?php $profil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'")) ?>
                        <div class="dropdown">
                            <div class="dropbtn d-flex align-items-center me-2">
                                <img src="<?= $profil['photo'] ?>" alt="" class="imgSmall">
                                <span class="fz-12 text-light ms-2"><?= $profil['name'] ?></span>
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
                <form class="mt-2 d-flex gap-5 align-items-center justify-content-center nosubmit" action="search.php" method="get">
                    <a href="index.php">
                        <img src="assets/img/logo.svg" alt="Logo" class="logo">
                    </a>
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search" name="keyword">
                    <div class="position-relative">
                        <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1">
                            <i class="ri-shopping-cart-line"></i>
                            <span class="numCart d-flex justify-content-center align-items-center">
                                <span class="fz-12"><?= $cart ?></span>
                            </span>
                        </a>
                    </div>
                    <a href="chat.php" class="ms-3 text-light iconNavbar z-1"><i class="me-3 ri-customer-service-2-line"></i></a>
                </form>
            </div>
        </div>

        <!-- Products Detail -->
        <div class="bg-white container px-0 mt-detailProducts p-lg-3 d-flex">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex flex-column">
                    <img src="<?= $product['variants'][1]['photo'] ?>" alt="" id="gambarProduct" class="img-fluid imgProduct">
                    <div class="container px-lg-0 mt-3">
                        <div class="d-flex justify-content-center gap-2">
                            <?php $n = 1; foreach($product['variants'] as $variant) { ?>
                                <?php if($n == 1) { ?>
                                    <img src="<?= $variant['photo'] ?>" alt="" id="selectionPhoto" class="img-fluid detailPilih  activeDetailProducts" style="object-fit: cover; width:80px; height: 80px;">
                                <?php $n++; } else { ?>
                                    <img src="<?= $variant['photo'] ?>" alt="" id="selectionPhoto" class="img-fluid detailPilih"  style="object-fit: cover; width:80px; height: 80px;">
                                <?php } ?>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 position-relative pt-2">
                    <div class="container">
                        <!-- <ul onclick="myFunction(event)"
                            class="container mt-4 d-flex justify-content-center gap-3 d-flex d-lg-none nav nav-pills mb-3"
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
                        </ul> -->
                        <div class="tab-content d-lg-none" id="pills-tabContent">
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
                        <h6 class="fw-bold text-dark mt-2"><?= $product['name'] ?></h6>
                        <div class="d-flex align-items-center justify-content-between gap-1">
                            <div class="left d-flex align-items-center gap-1">
                                <span class="fz-12 yellow">4.5</span>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <i class="ri-star-fill yellow fz-12"></i>
                                <span class="fz-12 text-secondary mx-2 d-none d-lg-flex">|</span>
                                <span class="fz-12 text-secondary d-none d-lg-flex"><?= $product['stock'] ?> Stock</span>
                                <span class="fz-12 text-secondary mx-2">|</span>
                                <span class="fz-12 text-secondary"><?= $product['sold'] ?> Terjual</span>
                            </div>
                            <div class="right d-flex gap-2 d-flex d-lg-none">
                                <!-- <span class="text-dark"><i class="ri-heart-line"></i></span>
                                <span class="text-dark"><i class="ri-arrow-go-forward-line"></i></span> -->
                                <span class="text-dark"><i class="ri-whatsapp-line"></i></span>
                            </div>
                        </div>
                        <!-- <span class="text-secondary fz-12">2.5 Rb Terjual</span> -->
                        <!-- <div class="d-flex gap-3 mt-3 d-none d-lg-flex">
                            <button type="button" class="btn-outline-yellow px-5 py-2">Ecer</button>
                            <button type="button" class="btn-outline-abu px-5 py-2">Grosir</button>
                        </div> -->
                        <div class="mt-3 d-flex gap-3 align-items-center d-none d-lg-flex">
                            <span class="fz-18 fw-600 orange" id="harga"><?= rupiahFormat($product['variants'][1]['retail_price']) ?></span>
                            <span class="fz-12 text-secondary">per 1 pcs ( Satuan )</span>
                        </div>
                        <div class="row mt-3 d-flex align-items-center d-none d-lg-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Diskon produk</span>
                            </div>
                            <div class="col-9">
                                <span class="text-light fz-10 fw-500 bg-yellow px-flash">57% OFF</span>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex d-none d-lg-flex">
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
                                            <span class="kota fz-12 fw-600"><?= $kota['city'] ?></span>
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
                        <div class="row mt-3 d-flex align-items-center d-none d-lg-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Kuantitas</span>
                            </div>
                            <div class="col-9 d-flex gap-2 align-items-center">
                                <div class="wrapper">
                                    <span class="minus" onclick="document.getElementById('num').innerText = parseInt(document.getElementById('num').innerText) - 1">-</span>
                                    <span class="num" id="num">1</span>
                                    <span class="plus" onclick="document.getElementById('num').innerText = parseInt(document.getElementById('num').innerText) + 1">+</span>
                                </div>
                                <span class="fz-10 text-secondary">Tersisa 200 Buah</span>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center d-none d-lg-flex">
                            <div class="col-3">
                                <span class="fz-12 fw-600 text-secondary">Variasi</span>
                            </div>
                            <div class="col-9 row ps-3">
                                <?php foreach($product['variants'] as $variant) { ?>
                                    <label class="col-3 col-lg-4 col-md-3 card-variasi px-0">
                                        <input type="radio" name="radioVariasi" class="radio-variasi" 
                                        onclick="changeData('<?= $variant['retail_price'] . '|' . $variant['id'] . '|' . $variant['photo'] ?>')" />
                                        <span class="radio-btn variasi px-2 fz-10"><?= $variant['name'] ?></span>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mt-3 pb-3 pb-lg-0 d-flex justify-content-between justify-content-lg-start gap-2">
                            <a href="chat.php"
                                class="px-3 py-lg-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center">
                                <span class="fw-600 fz-res"><i class="ri-chat-1-line"></i></span>
                                <span class="fw-600 d-none d-lg-flex"> Chat Penjual</span>
                            </a>

                            <!-- Desktop -->
                            <a href="javascript:void(0)" id="keranjangId"
                                class="d-none d-lg-flex px-3 py-lg-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center keranjangId" >
                                <span class="fw-600 fz-res"><i class="ri-shopping-cart-line"></i></span>
                                <span class="fw-600 d-none d-lg-flex"> Masukkan Keranjang</span>
                            </a>
                            <!-- Toast Keranjang -->
                            <div class="toast-res position-fixed bottom-0 end-0" style="z-index: 11">
                                <div id="keranjang" class="toast" style="background-color: #000;" role="alert"
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

                            <!-- Toast Belum Pilih variasi -->
                            <div class="toast-res position-fixed bottom-0 end-0" style="z-index: 11">
                                <div id="notVariant" class="toast" style="background-color: #000;" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="opacity-0 me-auto">Bootstrap</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                            
                                    </div>
                                    <div class="toast-body d-flex flex-column flex-wrap align-items-center text-center">
                                        <span class="text-danger fz-20"><i class="ri-close-circle-fill"></i></span>
                                        <span class="text-light fz-13">Variasi belum dipilih!</span>
                                    </div>
                                </div>
                            </div>

                            <!-- mobile -->
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas" aria-controls="cartCanvas"
                                class="d-flex d-lg-none px-3 py-lg-1 bg-blue-muda-res border-biru-res blue fz-12 d-flex gap-2 align-items-center">
                                <span class="fw-600 fz-res"><i class="ri-shopping-cart-line"></i></span>
                                <span class="fw-600 d-none d-lg-flex"> Masukkan Keranjang</span>
                            </a>

                            <!-- Desktop -->
                            <a href="javascript:void(0)" id="beliId"
                                class="d-none d-lg-flex d-flex align-items-center justify-content-center px-3 py-lg-1 btn-blue fz-12">
                                <span class="text-light"> Beli Sekarang</span>
                            </a>

                            <!-- mobile -->
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas" aria-controls="cartCanvas"
                                class="d-flex d-lg-none align-items-center justify-content-center px-3 py-lg-1 btn-blue fz-12">
                                <span class="text-light">Beli Sekarang</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-light fw-bold fz-14 text-center z-3 position-absolute desc1 d-none" id="hide2">
                        Halaman
                        Grosir Khusus Member</p>
                </div>
            </div>
        </div>
    </div>

    <div class="position-relative container-lg px-0 mt-lg-4">
        <div class="bg-disable position-absolute top-0 start-0 end-0 bottom-0 h-100 d-none" id="hide3"></div>
        <div class="bg-white container mt-3 pt-3 d-flex d-lg-none align-items-center justify-content-between">
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
            <a class="right" type="button" data-bs-toggle="offcanvas" data-bs-target="#ongkirCanvas" aria-controls="ongkirCanvas">
                <span><i class="ri-arrow-right-s-line"></i></span>
            </a>
            <!-- Popup Informasi Ongkir -->
            <div class="offcanvas offcanvas-bottom" style="height: 65%" tabindex="-1" id="ongkirCanvas" aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-body small">
                    <span class="fz-14 d-flex justify-content-center">Informasi Ongkir</span>
                    <hr>
                    <div class="my-2 d-flex justify-content-between">
                        <span class="fz-12">Kirim ke</span>
                        <div class="d-flex gap-2">
                            <span class="fz-12"><?= $kota['city'] ?></span>
                        </div>
                    </div>
                    <hr class="borbot">
                    <div class="my-2 d-flex justify-content-between">
                        <span class="fz-12">Reguler</span>
                        <span class="fz-12">Rp10.000</span>
                    </div>
                    <hr>
                    <span class="fz-12">Akan diterima pada tanggal 20 -22 Apr</span>
                    <hr class="borbot">
                    <div class="my-2 d-flex justify-content-between">
                        <span class="fz-12">Hemat</span>
                        <span class="fz-12">Rp8.500</span>
                    </div>
                    <hr>
                    <span class="fz-12">Akan diterima pada tanggal 20 -22 Apr</span>
                    <hr class="borbot">
                    <div class="my-2 d-flex justify-content-between">
                        <span class="fz-12">Kargo</span>
                        <span class="fz-12">Rp15.000</span>
                    </div>
                    <hr>
                    <span class="fz-12">Akan diterima pada tanggal 20 -22 Apr</span>
                    </div>
                    <button class="bg-blue px-3 py-2 text-light" style="border: none">Ok</button>
                </div>
            </div>
        </div>

        <div class="bg-white container">

        </div>

        <!-- Variasi Mobile -->


        <!-- Spesifikasi -->

        <!-- Deskripsi -->
        <div class="container bg-white pt-lg-4 pb-3">
            <div class="container p-2">
                <span class="fz-14 fw-600 bg-abu-muda d-flex p-2 d-none d-lg-block">
                    Deskripsi produk
                </span>
                <div class="mt-lg-3 p-2">
                    <p class="fz-13"><?= $product['description']  ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Review -->
        <?php
            $sql = "SELECT * FROM reviews WHERE id_product = '$_GET[id]'";
            $result = mysqli_query($conn, $sql);
            $r5 = 0; $r4 = 0; $r3 = 0; $r2 = 0; $r1 = 0;
            $c = 0; $m = 0;
            $sum = 0;
            while($row = mysqli_fetch_assoc($result)){
                if($row['rate'] == 5) {
                    $r5++;
                } elseif($row['rate'] == 4) {
                    $r4++;
                } elseif($row['rate'] == 3) {
                    $r3++;
                } elseif($row['rate'] == 2) {
                    $r2++;
                } elseif($row['rate'] == 1) {
                    $r1++;
                }
                if($row['review']) {
                    $c++;
                }
                if($row['photo']) {
                    $m++;
                }
                $sum += $row['rate'];
                $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$row[id_user]'"));
                $reviews[] = [
                    'id' => $row['id'],
                    'name' => $user['name'],
                    'rate' => $row['rate'],
                    'review' => $row['review'],
                    'photo' => $row['photo']
                ];
            }
        ?>
        <div class="container bg-white mt-4 pt-4 px-lg-4 pb-3">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left d-flex flex-column">
                        <span class="fz-14 fw-600">
                            Penilaian produk
                        </span>
                        <div class="d-flex align-items-center d-flex d-lg-none">
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                            <span class="fz-10 yellow mx-2"><?= $sum / count($reviews) ?></span>
                            <span class="fz-10 yellow mx-2">(<?= count($reviews) ?> Ulasan)</span>
                        </div>
                    </div>
                    <a href="penilaian.php" class="right d-flex d-lg-none">
                        <div class="left">
                            <span class="blue fz-11">Lihat semua</span>
                        </div>
                        <div class="right">
                            <span class="blue"><i class="ri-arrow-right-s-line"></i></span>
                        </div>
                    </a>
                </div>
                <hr class="my-2 py-0">
                <div class="row bg-pink p-4 mt-3 d-none d-lg-flex align-items-center justify-content-start">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-start flex-column">
                            <div class="left ms-2">
                                <span class="fz-16 fw-700 yellow"><?= $sum / count($reviews) ?></span>
                                <span class="fz-12 fw-500 yellow">dari 5</span>
                            </div>
                            <div class="right">
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><?= $sum / count($reviews) ?>/5</span>
                                <span class="fz-13 yellow">(<?= count($reviews) ?> Ulasan)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="all" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Semua</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="5" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">5 Bintang (<?= $r5 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="4" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">4 Bintang (<?= $r4 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="3" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">3 Bintang (<?= $r3 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="2" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">2 Bintang (<?= $r2 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="1" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">1 Bintang (<?= $r1 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="komentar" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Komentar (<?= $c ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="media" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Media (<?= $m ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="member" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Member (1)</span>
                        </label>
                    </div>
                </div>
                <!-- <div class="row d-flex my-4 ms-lg-4">
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
                <hr /> -->
                <div class="asd">
                    <?php
                    foreach($reviews as $r) :
                    ?>
                    <div class="row d-flex my-4 ms-lg-4">
                        <div class="col-1 profile">
                            <img src="assets/img/profile.jpg" alt="" class="profileImg">
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <span class="fz-10"><?= $r['name'] ?></span>
                            <div class="star">
                                <?php for($i = 1; $i <= $r['rate']; $i++) : ?>
                                    <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                                <?php endfor; ?>
                            </div>
                            <span class="fz-12 mt-3">
                                <?= $r['review'] ?>
                            </span>
                            <div class="d-flex gap-2">
                                <img src="<?= $r['photo'] ?>" alt="" class="imgUlasan mt-3">
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <hr />
            </div>
        </div>
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
                            <span class="fz-16 orange fw-600">Rp. <span id="retail">20000</span></span>
                            <span class="fz-12 fw-500">Stok : <span id="stok"><?= $product['stock'] ?></span></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="width:90%">
                    <span class="fz-12 mb-3">Variasi</span>
                    <div class="d-flex gap-3 flex-wrap">
                        <?php foreach($product['variants'] as $v) : ?>
                        <label class="card-variasi px-0">
                            <input type="radio" name="radioVariasi" class="radio-variasi" onclick="
                            document.getElementById('retail').innerText = '<?= $v['retail_price'] ?>';
                            document.getElementById('stok').innerText = '<?= $v['stock'] ?>';
                            document.getElementById('asd').href = 'server/process/addToCart.php?id=' + <?= $v['id'] ?> + '&qty=' + 1;
                            document.getElementById('num2').innerText = 1;
                            " />
                            <div class="bg-variasi radio-btn variasi p-1 fz-10">
                                <img src="assets/img/products1.jpg" alt="" class="imgVariasi">
                                <span class="radio-btn text-dark px-2 fz-10"><?= $v['name'] ?></span>
                            </div>
                            <input type="hidden" id="id" value="<?= $v['id'] ?>">
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="left">
                        <span class="fz-14">Jumlah</span>
                    </div>
                    <div class="wrapper">
                    <span class="minus"  onclick="
                        const a = document.getElementById('num2');
                        if(parseInt(a.innerText) > 1) {
                            a.innerText = parseInt(a.innerText) - 1;
                        }
                        const id = document.getElementById('id');
                        document.getElementById('asd').href = 'server/process/addToCart.php?id=' + id.value + '&qty=' + a.innerText;
                        ">-</span>
                        <span class="num" id="num2">1</span>
                        <span class="plus" onclick="
                        const a = document.getElementById('num2');
                        a.innerText = parseInt(a.innerText) + 1;
                        const id = document.getElementById('id');
                        document.getElementById('asd').href = 'server/process/addToCart.php?id=' + id.value + '&qty=' + a.innerText;
                        ">+</span>
                    </div>
                    <a href="javascript:void(0)" id="asd" class="btn bg-blue text-light w-100">Masukkan Keranjang</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <?php if(isset($_SESSION['success'])) { ?>
        
    <?php } ?>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        function refreshPage(){
            window.location.reload();
        }    
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
        var toastTrigger = document.getElementById('keranjangId')
        var toastLiveExample = document.getElementById('keranjang')
        var toastLiveExample2 = document.getElementById('notVariant')
        if (toastTrigger) {
            var toast = new bootstrap.Toast(toastLiveExample)
            var toast2 = new bootstrap.Toast(toastLiveExample2)
            toastTrigger.addEventListener('click', function() {
                toast2.show();
            })
            var fullURL = window.location.href;
            var url1 = fullURL.split('?');
            var url = url1[1].split('&');
            if(url[1] == 'success=true'){
                toast.show();
                setTimeout(() => {
                    window.location = url1[0] + '?' + url[0];
                }, 1500);
            }
        }

        function changeData(data) {
            var datas = data.split("|");
            var quantity = document.getElementById("num").innerText;
            document.getElementById("harga").innerText = formatRupiah(datas[0], 'Rp. ');
            document.getElementById("keranjangId").href = "server/process/addToCart.php?id=" + datas[1] + "&qty=" + quantity;
            document.getElementById("beliId").href = "server/process/addToCart.php?id=" + datas[1] + "&qty=" + quantity + "&beli=true";
        }

        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        const radios = document.querySelectorAll('.radio-ulasan');
        const id = <?= $_GET['id'] ?>;
        radios.forEach(function(radio) {
            radio.addEventListener('click', function() {
                $.ajax({
                    url: 'server/ajax/getUlasan.php',
                    type: 'POST',
                    data: {
                        id: id,
                        value: radio.value
                    },
                    success: function(data) {
                        $('.asd').html(data);
                    }
                });
            });
        });

        var selectionPhoto = document.querySelectorAll('#selectionPhoto');
        selectionPhoto.forEach(function(el) {
            el.addEventListener('click', function() {
                var src = el.getAttribute('src');
                document.getElementById('gambarProduct').setAttribute('src', src);
                selectionPhoto.forEach(function(ell) {
                    ell.classList.remove('activeDetailProducts');
                });
                el.classList.add('activeDetailProducts');
            });
        });

    </script>
</body>

</html>