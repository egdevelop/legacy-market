<?php
require_once 'server/config/functions.php';
session_start();
// if(!isset($_SESSION['userid'])){
//     header('Location: login.php');
//     exit();
// }
// if($_POST['idCart'] == ''){
//     header('Location: keranjang.php');
//     exit();
// }
$idCart = explode(',', $_POST['idCart']);
$idCart = array_filter($idCart);
foreach($idCart as $id){
    $query = mysqli_query($conn, "SELECT * FROM carts WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $data[] = getProductByVariant($row);   
}

$vou = mysqli_query($conn, "SELECT * FROM vouchers WHERE owner_id = '".$_SESSION['userid']."'");
while($voucher = mysqli_fetch_assoc($vou)){
    $vouchers[] = $voucher;
}

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_SESSION['userid']."'"));

?>
<!doctype html>
<html lang="en">

<head>
<?php include "components/head.php"; ?>

    <title>Checkout</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom d-block d-md-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Checkout</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-none d-md-block">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <div class="left">
                        <span class="fz-12 fw-bold text-light">Checkout</span>
                    </div>
                    <div class="right">
                        <form class="d-flex gap-3 align-items-center justify-content-center nosubmit">
                            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk"
                                aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="container-lg bg-white py-4 mt-keranjang">
            <div class="container d-flex gap-5 align-items-center justify-content-between">
                <div class="left d-flex flex-column">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ri-map-pin-line blue"></i>
                        <span class="fz-12">Alamat Pengiriman</span>
                    </div>
                    <div class="fz-12 mt-3 fw-600"><?= $user['name'] ?> (+62) 85895372384</div>
                </div>
                <div class="center">
                    <div class="fz-12 mt-2">Sukahening wetan sebelah kiri masjid Al ikhlas RT/RW 02/21 Kel Karsamenak,
                        KOTA
                        TASIKMALAYA - KAWALU, JAWA BARAT, ID 46182
                    </div>
                </div>
                <div class="right">
                    <a href="alamat.php" class="fz-12 blue">Ubah</a>
                </div>
            </div>
        </div>

        <!-- Produk dipesan -->
        <div class="container-lg bg-white py-4 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <span class="fw-600 fz-12">Produk Dipesan</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10">Harga</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10">Jumlah</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10">Subtotal produk</span>
                    </div>
                </div>
                <?php foreach($data as $row){ ?>
                <div class="row d-flex align-items-center">
                    <div class="col-4 pe-0">
                        <span class="fw-600 fz-12">
                            <div class="d-flex align-items-end justify-content-between gap-2 mt-2">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="<?= $row['photo'] ?>" alt="" class="imgCheckout">
                                    <div class="d-flex flex-column">
                                        <span class="fz-10 fw-500"><?= $row['name'] ?>
                                        </span>
                                        <div class="d-flex gap-3 mt-2">
                                            <span class="fz-12 fw-600">Eceran</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="col-2 d-flex flex-column ps-4">
                        <span class="fz-10 fw-600">Variasi:</span>
                        <span class="fz-10"><?= $row['variant'] ?></span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10 fw-600 orange">Rp. <?= $row['price'] ?></span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10"><?= $row['quantity'] ?></span>
                    </div>
                    <div class="col-2">
                        <span class="fz-10 fw-600 orange">Rp. <?= $row['price'] * $row['quantity'] ?></span>
                    </div>
                </div>
                <?php
                $total = $total + ($row['price'] * $row['quantity']);
                $idProducts[] = $row['id_product'];
                $idProducts = array_unique($idProducts);
                } ?>
            </div>
        </div>
    </div>

    <!-- Opsi Pengiriman -->
    <div class="container-lg bg-white py-4 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-4 d-flex gap-2 align-items-center">
                    <span class="fz-16 yellow"><i class="ri-truck-fill"></i></span>
                    <span class="fw-600 fz-12 border-b-2">Opsi Pengiriman</span>
                </div>
                <div class="col-4 d-flex flex-column">
                    <span class="fz-10">Reguler</span>
                    <span class="fz-10 abu">Estimasi sampai 10 - 14 Apr</span>
                </div>
                <div class="col-2">
                    <span class="fz-10 orange fw-600">Rp. <?php $ongkir = 20000; echo $ongkir ?></span>
                </div>
                <div class="col-2">
                    <a type="button" class="fz-11 blue" data-bs-toggle="modal" data-bs-target="#btnPengiriman">Ubah</a>
                </div>
                <!-- Modal Pengiriman -->
                <div class="modal fade" id="btnPengiriman" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fz-13" id="staticBackdropLabel">Opsi Pengiriman</h5>
                                <span class="yellow fz-18"><i class="ri-truck-fill"></i></span>
                            </div>
                            <div class="modal-body">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <p class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button d-flex align-items-center gap-2 collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                                <div class="d-flex flex-column gap-2">
                                                    <span class="fz-12 fw-600">Hemat</span>
                                                    <span class="fz-10">Akan diterima pada tanggal 14 - 16 Apr</span>
                                                </div>
                                            </button>
                                        </p>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body position-relative">
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/jne.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">JNE</span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman JNE pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/sicepat.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">Sicepat </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman SICEPAT pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/bni.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">J&T Express </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman J&T Express pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <p class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button d-flex align-items-center gap-2 collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                                aria-controls="flush-collapseTwo">
                                                <div class="d-flex flex-column gap-2">
                                                    <span class="fz-12 fw-600">Reguler</span>
                                                    <span class="fz-10">Akan diterima pada tanggal 14 - 16 Apr</span>
                                                </div>
                                            </button>
                                        </p>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body mt-1">
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/jne.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">JNE </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman JNE pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/sicepat.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">Sicepat </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman SICEPAT pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/bni.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">J&T Express </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman J&T Express pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <p class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button d-flex align-items-center gap-2 collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                                aria-controls="flush-collapseThree">
                                                <div class="d-flex flex-column gap-2">
                                                    <span class="fz-12 fw-600">Kargo</span>
                                                    <span class="fz-10">Akan diterima pada tanggal 14 - 16 Apr</span>
                                                </div>
                                            </button>
                                        </p>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body mt-1">
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/jne.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">JNE </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman JNE pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/sicepat.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">Sicepat </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman SICEPAT pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                                <label class="radioWrapper ps-4 d-flex align-items-start py-3">
                                                    <div class="left me-3">
                                                        <img src="assets/img/bni.svg" alt="">
                                                    </div>
                                                    <div class="ps-1 pe-1 d-flex gap-2 flex-column">
                                                        <div class="right">
                                                            <span class="fw-600 fz-12">J&T Express </span>
                                                        </div>
                                                        <span class="fz-9" style="width: 90%">Menggunakan jasa
                                                            pengiriman J&T Express pastikan tersedia di kotamu</span>
                                                        <input type="radio" name="radio">
                                                        <span class="checkmark me-2"></span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti
                                    saja</button>
                                <button type="button"
                                    class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class=" my-3 py-0">
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <img src="assets/img/voucher.svg" alt="" class="me-2">
                    <span class="fz-11">Voucher</span>
                </div>
                <div class="col-2 d-flex align-items-center gap-2">
                    <!-- <span class="fz-14 blue"><i class="ri-checkbox-circle-fill"></i></span>
                    <span class="text-light fz-10 fw-500 bg-yellow px-3">57% OFF</span> -->
                </div>

                <div class="col-2 d-flex align-items-center">
                    <a href="voucher.php" type="button" class="fz-11 blue" data-bs-toggle="modal"
                        data-bs-target="#btnVoucher">Pilih
                        Voucher</a>
                    <!-- <span class="fz-11 blue">Ganti Voucher</span> -->
                </div>
                <!-- Modal Voucher -->
                <div class="modal fade" id="btnVoucher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header d-block" style="border: none;">
                                <div class="col-12 d-flex justify-content-between">
                                    <h5 class="modal-title fz-13" id="staticBackdropLabel">Pilih Voucher</h5>
                                    <span class="blue fz-18 me-3"><i class="ri-coupon-2-line"></i></span>
                                </div>
                                <div class="col-12">
                                    <form
                                        class="input-group d-flex align-items-center justify-content-between my-1 py-3 px-4 gap-4"
                                        style="background-color: #F8F8F8;">
                                        <h5 class="fz-10 mt-2">Tambah Voucher</h5>
                                        <input class="voucherInput form-control bg-transparent py-1" type="search"
                                            placeholder="Masukkan Kode Voucher" aria-label="Search"
                                            style="width: 10rem; border-color:#C1C1C1; font-size: 12px">
                                        <button class="btn fz-12 py-1"
                                            style="color: #c1c1c1;border-color:#C1C1C1;">Pakai</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between gap-2 mb-3">
                                    <span class="fz-12 fw-600">Voucher Gratis Ongkir</span>
                                    <span class="fz-10">Pilih 1</span>
                                </div>
                                <?php foreach($vouchers as $v) {?>
                                    <?php if(time() < strtotime($v['expiry'])) { ?>
                                        <div class="d-flex justify-content-between gap-2 mb-3">
                                            <span class="fz-12 fw-600"><?php echo $v['name'] ?></span>
                                            <span class="fz-10">Pilih 1</span>
                                        </div>
                                    <label class="radioWrapper ps-1 d-flex align-items-start ">
                                        <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                            <img src="assets/img/gratisongkir.png" class=" " alt="">
                                            <div class="d-block my-auto">
                                                <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp. <?= $v['min_buy'] ?></h5>
                                                <!-- <p class="f-10 text-prem">Berakhir dlm 9 jam</p> -->
                                                <p class="f-10 text-prem">Berakhir pada <?= $v['expiry'] ?></p>
                                            </div>
                                            <div class=" mt-auto me-2 mb-2">
                                                <input type="radio" name="radio">
                                                <span class="check mt-4 end-0"></span>
                                                <p class="f-10 mb-0 ">S&K</p>
                                            </div>
                                        </div>
                                    </label>
                                    <?php } else { ?>
                                    <label class="radioWrapper ps-1 d-flex align-items-start ">
                                        <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                            <img src="assets/img/gratisongkiroff.png" class=" " alt="">
                                            <div class="d-block my-auto">
                                                <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp. <?= $v['min_buy'] ?></h5>
                                                <!-- <p class="f-10 text-prem">Berakhir dlm 9 jam</p> -->
                                                <p class="f-10 text-prem">Tidak berlaku</p>
                                            </div>
                                            <div class=" mt-auto me-2 mb-2">
                                                <input type="radio" name="radio">
                                                <span class="check mt-4 end-0"></span>
                                                <p class="f-10 mb-0 ">S&K</p>
                                            </div>
                                        </div>
                                    </label>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti
                                    saja</button>
                                <button type="button"
                                    class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <div class="container-lg bg-white py-4 mt-3 mb-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-start gap-4">
                <div class="left gap-2 d-flex align-items-center">
                    <i class="ri-money-dollar-circle-line orange"></i>
                    <span class="fz-12 fw-600">Metode Pembayaran</span>
                </div>
                <div class="right d-flex align-items-center ps-3">
                    <label onclick="toggleVisibility('Menu1');"
                        class="card-payment cursor-pointer fw-500 px-2 py-1 fz-10">
                        <input type="radio" name="radioPayment" class="radio-payment" />
                        <span class="radio-btn variasi px-2 py-1 fz-10">Transfer Bank</span>
                    </label>
                </div>
                <div class="right d-flex align-items-center ps-3">
                    <label onclick="toggleVisibility('Menu2');"
                        class="card-payment cursor-pointer fw-500 px-2 py-1 fz-10">
                        <input type="radio" name="radioPayment" class="radio-payment" />
                        <span class="radio-btn variasi px-2 py-1 fz-10">Alfamart</span>
                    </label>
                </div>
                <div class="right d-flex align-items-center ps-3">
                    <label onclick="toggleVisibility('Menu3');"
                        class="card-payment cursor-pointer fw-500 px-2 py-1 fz-10">
                        <input type="radio" name="radioPayment" class="radio-payment" />
                        <span class="radio-btn variasi px-2 py-1 fz-10">Indomaret</span>
                    </label>
                </div>
            </div>
            <hr class="my-3 py-0">
            <div class="">
                <div id="Menu1" style="display: none;">
                    <label class="radioWrapper ps-3 row d-flex align-items-start py-3">
                        <div class="col-12 pe-1 d-flex align-items-start gap-2">
                            <div class="left">
                                <img src="assets/img/bca.svg" alt="" class="iconPay">
                            </div>
                            <div class="d-flex flex-column gap 2">
                                <span class="fw-600 fz-12 mt-1">Bank BCA </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BCA. Metode Pembayaran
                                    Lebih
                                    Mudah</span>
                            </div>
                            <input type="radio" name="radio" value="bca">
                            <span class="checkmark position-absolute me-2"></span>
                        </div>
                    </label>
                    <label class="radioWrapper ps-3 row d-flex align-items-start py-3">
                        <div class="col-12 pe-1 d-flex align-items-start gap-2">
                            <div class="left">
                                <img src="assets/img/mandiri.svg" alt="" class="iconPay">
                            </div>
                            <div class="d-flex flex-column gap 2">
                                <span class="fw-600 fz-12 mt-1">Bank Mandiri </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank Mandiri termasuk Bank
                                    Syariah
                                    Metode Pembayaran Lebih Mudah</span>
                            </div>
                            <input type="radio" name="radio" value="mandiri">
                            <span class="checkmark position-absolute me-2"></span>
                        </div>
                    </label>
                    <label class="radioWrapper ps-3 row d-flex align-items-start py-3">
                        <div class="col-12 pe-1 d-flex align-items-start gap-2">
                            <div class="left">
                                <img src="assets/img/bni.svg" alt="" class="iconPay">
                            </div>
                            <div class="d-flex flex-column gap 2">
                                <span class="fw-600 fz-12 mt-1">Bank BNI </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BNI
                                    Metode Pembayaran Lebih Mudah</span>
                            </div>
                            <input type="radio" name="radio" value="bni">
                            <span class="checkmark position-absolute me-2"></span>
                        </div>
                    </label>
                    <hr class="my-3 py-0">
                </div>
                <div id="Menu2" style="display: none;">
                    <label class="radioWrapper ps-3 row d-flex align-items-start py-3">
                        <div class="col-12 pe-1 d-flex align-items-start gap-2">
                            <div class="left">
                                <img src="assets/img/alfamart.svg" alt="" class="iconPay">
                            </div>
                            <div class="d-flex flex-column gap 2">
                                <span class="fw-600 fz-12 mt-1">Alfamart </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Alfamart. Metode Pembayaran
                                    Lebih
                                    Mudah</span>
                            </div>
                            <input type="radio" name="radio" value="alfa">
                            <span class="checkmark position-absolute me-2"></span>
                        </div>
                    </label>
                    <hr class="my-3 py-0">
                </div>
                <div id="Menu3" style="display: none;">
                    <label class="radioWrapper ps-3 row d-flex align-items-start py-3">
                        <div class="col-12 pe-1 d-flex align-items-start gap-2">
                            <div class="left">
                                <img src="assets/img/indomaret.svg" alt="" class="iconPay">
                            </div>
                            <div class="d-flex flex-column gap 2">
                                <span class="fw-600 fz-12 mt-1">Indomaret </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Indomaret
                                    Metode Pembayaran Lebih Mudah</span>
                            </div>
                            <input type="radio" name="radio" value="indo">
                            <span class="checkmark position-absolute me-2"></span>
                        </div>
                    </label>
                    <hr class="my-3 py-0">
                </div>
            <form action="server/process/test.php" method="post">
            </div>
                <div class="row d-flex align-items-center justify-content-end mb-2">
                    <div style="margin-right: -8rem;" class="col-2 text-start">
                        <p class="fz-10">Subtotal untuk Produk</p>
                    </div>
                    <div class="col-2 text-end">
                        <p class="fz-10">Rp. <?= $total ?></p>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-end mb-2">
                    <div style="margin-right: -8rem;" class="col-2 text-start">
                        <p class="fz-10">Total ongkos kirim</p>
                    </div>
                    <div class="col-2 text-end">
                        <p class="fz-10">Rp. <?= $ongkir ?></p>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-end mb-2">
                    <div style="margin-right: -8rem;" class="col-2 text-start">
                        <p class="fz-10">Biaya pelayanan</p>
                    </div>
                    <div class="col-2 text-end">
                        <p class="fz-10">Rp1.000</p>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-end mb-2">
                    <div style="margin-right: -8rem;" class="col-2 text-start">
                        <p class="fz-10">Total Pembayaran</p>
                    </div>
                    <div class="col-2 text-end">
                        <p class="fz-16 orange fw-600">Rp. <?php $all = $total + $ongkir; echo $all ?></p>
                    </div>
                </div>
                <hr class="mt-2 mb-3 py-0">
                <input type="text" name="userid" value="<?= $_SESSION['userid'] ?>" hidden>
                <input type="text" name="amount" value="<?= $all ?>" hidden>
                <input type="text" name="idCart" value="<?= implode(',', $idCart) ?>" hidden>
                <input type="text" name="id_product" value="<?= implode(',', $idProducts) ?>">
                <input type="text" name="method" id="method" value="" hidden>
                <div class="d-flex justify-content-end">
                    <button class="btn-blue fz-12 text-light px-3 py-2" type="submit">Buat Pesanan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
    var divs = ["Menu1", "Menu2", "Menu3"];
    var visibleDivId = null;

    function toggleVisibility(divId) {
        if (visibleDivId === divId) {
            //visibleDivId = null;
        } else {
            visibleDivId = divId;
        }
        hideNonVisibleDivs();
    }

    function hideNonVisibleDivs() {
        var i, divId, div;
        for (i = 0; i < divs.length; i++) {
            divId = divs[i];
            div = document.getElementById(divId);
            if (visibleDivId === divId) {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    }

    const radio = document.querySelectorAll('input[type="radio"]');
    const method = document.getElementById('method');
    for (let i = 0; i < radio.length; i++) {
        radio[i].addEventListener('click', function() {
            method.value = this.value;
        });
    }
    </script>
</body>

</html>