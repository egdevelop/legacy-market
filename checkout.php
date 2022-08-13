<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
session_start();
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
    exit();
}
if(!isset($_SESSION['idVariant'])) {
    if(!$_POST){
        header('Location: keranjang.php');
        exit();
    }
}
    
if($_SESSION['idVariant']) {
    $idVariant = $_SESSION['idVariant'];
} else {
    $idVariant = explode(",", $_POST['idVariant']);
    array_shift($idVariant);
    $idVariant = implode(",", $idVariant);
}
    
$idCart = ($_SESSION['idCart']) ? $_SESSION['idCart'] : $_POST['idCart'];
if(isset($_SESSION['idVariant'])) {
    $type = 'member';
}
$idCart = explode(',', $idCart);
$idCart = array_filter($idCart);
$ccc = 0;
foreach($idCart as $id){
    $query = mysqli_query($conn, "SELECT * FROM carts WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $data[$ccc] = getProductByVariant($row['id_variant']);
    $data[$ccc]['quantity'] = $row['total'];
    $quantity .= ',' . $row['total'];
    $ccc++;
}

$vou = mysqli_query($conn, "SELECT * FROM vouchers WHERE owner_id = '".$_SESSION['userid']."'");
while($voucher = mysqli_fetch_assoc($vou)){
    $vouchers[] = $voucher;
}

$addres = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$_SESSION[userid]' AND isPrimary = 1");
$address = mysqli_fetch_assoc($addres);

$costs = getCost($address['city_id'], 151, 1000);
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
                     <a onclick="history.back()" class="d-flex align-items-center cursor-pointer">
                        <i class="ri-arrow-left-s-line text-light"></i>
                        <span class="fz-12 fw-bold text-light">Checkout</span>
                    </a>
                    <div class="right">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="container bg-white py-4  mt-keranjang" >
            <div class="container">
                <div class="row">
                    <div class="col-10 d-flex align-items-center gap-2">
                        <i class="ri-map-pin-line blue"></i>
                        <span class="fw-600 fz-12">Alamat Pengiriman (Alamat Utama)</span>
                    </div>
                    <div class="col-2">
                        <a href="alamat.php" class="fz-12 blue">Ubah</a>
                    </div>
                </div>
                <?php if(count($address) > 0) : ?>
                    <div class="fz-12 mt-3"><?= $address['name'] ?> <?= $address['no'] ?></div>
                    <div class="fz-12 mt-2"><?= $address['detail'] ?>, <?= $address['city'] ?> - <?= $address['district'] ?>, <?= $address['province'] ?>, ID <?= $address['code'] ?>
                <?php else : ?>
                    <div class="fz-12 mt-3">Tidak ada alamat utama sebagai alamat pengiriman. <a href="alamat.php">Atur disini</a></div>
                <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Produk dipesan -->
        <div class="container bg-white py-4 border-top-custom">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <span class="fw-600 fz-12">Produk Dipesan</span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12">Harga</span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12">Jumlah </span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12">Subtotal</span>
                    </div>
                </div>
                <?php 
                foreach($data as $row){
                if($_SESSION['role'] == 3) {
                    $price = whichPrice($row['grosir'], $row['price'], $row['quantity']);
                } else {
                    $price = $row['price'];
                } 
                ?>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="d-flex align-items-end justify-content-between gap-2 mt-2">
                            <div class="d-flex gap-2">
                                <img src="<?= $row['photo'] ?>" alt="" class="varian">
                                <div class="d-flex flex-column">
                                    <span class="fw-600 fz-12"><?= $row['name'] ?></span>
                                    <span class="fz-12 fw-600 orange d-block d-lg-none" style="padding-bottom: 0px;">Rp. <?= $price ?></span>
                                    <!-- <span class="fz-12 fw-600 orange"><br>Eceran</span> -->
                                    <span class="fz-12 fw-600 d-none d-lg-block">Variasi : <?= $row['variantName'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12 fw-600 orange">Rp. <?= $price ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12">x<?= $row['quantity'] ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12 fw-600 orange">Rp. <?= $price * $row['quantity'] ?></span>
                    </div>
                </div>
                <?php 
                $total = $total + ($price * $row['quantity']);
                $qty[] = $row['quantity'];
                $idProducts[] = $row['id_product'];
                } ?>
            </div>
        </div>
        <?php if($idProducts[0] != '17') : ?>
        <!-- Opsi Pengiriman -->
        <div class="container bg-white py-4 border-top-custom d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <img src="assets/img/truck.svg" alt="">
                        <span class="fw-600 fz-12 border-b-2">Opsi Pengiriman</span>
                    </div>
                    <!-- mobile -->
                    <div class="d-flex d-lg-none flex-column mt-2">
                            <span class="fz-12">Reguler</span>
                            <span class="fz-11 abu"><?= $costs[1]['name'] ?></span>
                    </div>
                    <!-- Desktop -->
                    <div class="col-4 d-none d-lg-block">
                        <div class="d-flex flex-column">
                            <span class="fz-12">Reguler</span>
                            <span class="fz-11 abu">E<?= $costs[1]['name'] ?></span>
                        </div>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <span class="fz-12 orange" id="pengiriman">Rp. <?php echo $costs[1]['harga']; $hrg = $costs[1]['harga']; $namacou = $costs[1]['name'] ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#opsiPengiriman" class="fz-12 blue">Ubah</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="opsiPengiriman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="fz-14 fw-600 modal-title" id="exampleModalLabel">Opsi Pengiriman</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <p class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <div class="d-flex flex-column gap-2">
                                                <span class="fz-12 fw-600">Reguler</span>
                                            </div>
                                        </button>
                                    </p>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body mt-1">
                                            <?php $asd = 0; 
                                                foreach($costs as $c) : ?>
                                            <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                                <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                                    <span class="fw-600 fz-12"><?= $c['name'] ?></span>
                                                    <span class="fz-9 orange" style="width: 90%">Rp. <?= $c['harga'] ?></span>
                                                    <input type="radio" name="radio" <?= ($asd == 0) ? "checked" : "" ?> onclick="
                                                    document.getElementById('pengiriman').innerText = 'Rp. <?= $c['harga'] ?>';
                                                    document.getElementById('pengiriman2').innerText = '<?= $c['harga'] ?>';
                                                    document.getElementById('total').innerText = '<?php $all = $total + $c['harga']; echo $all ?>';
                                                    document.getElementById('cou').value = '<?= $c['name'] ?>';
                                                    document.getElementById('amount').value = '<?php $all = $total + $c['harga']; echo $all ?>';">
                                                    <span class="checkmark position-absolute top-50 me-2"></span>
                                                </div>
                                            </label>
                                            <?php $asd++; 
                                            endforeach; ?>
                                            <!-- <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                                <div class="col-1 left me-3">
                                                    <img src="assets/img/sicepat.svg" alt="">
                                                </div>
                                                <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                                    <span class="fw-600 fz-12">Sicepat </span>
                                                    <span class="fz-9" style="width: 90%">Menggunakan jasa pengiriman SICEPAT pastikan tersedia di kotamu</span>
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark position-absolute top-50 me-2"></span>
                                                </div>
                                            </label>
                                            <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                                <div class="col-1 left me-3">
                                                    <img src="assets/img/bni.svg" alt="">
                                                </div>
                                                <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                                    <span class="fw-600 fz-12">J&T Express </span>
                                                    <span class="fz-9" style="width: 90%">Menggunakan jasa pengiriman J&T Express pastikan tersedia di kotamu</span>
                                                    <input type="radio" name="radio">
                                                    <span class="checkmark position-absolute top-50 me-2"></span>
                                                </div>
                                            </label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="fz-12 fw-600 btn btn-secondary" data-bs-dismiss="modal">Nanti saja</button>
                            <button type="button" class="fz-12 fw-600 btn btn-primary" data-bs-dismiss="modal">Konfirmasi</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="d-flex d-lg-none align-items-end justify-content-between gap-2 mt-2">
                    <span class="fz-10 abu">*atur dipage selanjutnya</span>
                </div>
            </div>
        </div>

        <!-- Voucher -->
        <div class="container bg-white pt-4 pb-5 pb-lg-4 border-top-custom mb-5 mb-lg-0">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-lg-8 d-flex align-items-center">
                        <img src="assets/img/voucher.svg" alt="" class="me-2">
                        <span class="fz-11">Voucher</span>
                    </div>
                    <div class="col-2 d-none d-lg-block">
                        <!-- <img src="assets/img/voucherIcon.svg" alt=""> -->
                    </div>
                    <!-- Desktop -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#gantiVoucher" class="col-4 col-lg-2 blue d-flex align-items-center">
                        <span class="blue fz-11" id="discText">Pilih Voucher</span>
                        <!-- <i class="abu ri-arrow-right-s-line"></i> -->
                    </a>

                    <!-- Modal Voucher -->
                    <?php include "partials/gantiVoucherModal.php"; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Metode Pembayaran -->
        <div class="container bg-white py-4 mb-5 pb-5 border-top-custom d-none d-lg-block">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between gap-4">
                    <div class="left gap-2 d-flex align-items-center">
                        <i class="ri-money-dollar-circle-line orange"></i>
                        <span class="fz-12 fw-600 me-3">Metode Pembayaran</span>
                        <nav class="d-none d-lg-block">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="fz-12 nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Transfer Bank</button>
                                <button class="fz-12 nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Outlet</button>
                                <button class="fz-12 nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Digital Payment</button>
                            </div>
                            </nav>
                    </div>
                    <a href="javascript:void(0)" class="right d-flex d-lg-none align-items-center ps-3">
                        <span class="abu fz-10">Transfer Bank</span>
                        <i class="abu ri-arrow-right-s-line"></i>
                    </a>
                </div>
                <div class="tab-content mt-4 d-none d-lg-block" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3 d-none">
                            <div class="col-1 left me-3">
                                <img src="assets/img/bca.svg" alt="">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">Bank BCA </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BCA. Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="pe" value="bca" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                            <div class="col-1 left me-3">
                                <img src="assets/img/mandiri.svg" alt="">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">Bank Mandiri </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank Mandiri termasuk Bank Syariah Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="p" value="MANDIRIVA" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                            <div class="col-1 left me-3">
                                <img src="assets/img/bni.svg" alt="">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">Bank BNI </span>
                                <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BNI
                                    Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="p" value="BNIVA" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                            <div class="col-1 left me-3">
                                <img src="assets/img/alfamart.svg" alt="">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">Alfamart </span>
                                <span class="fz-10">Hanya menerima dari Alfamart. Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="p" value="ALFAMART" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                            <div class="col-1 left me-3">
                                <img src="assets/img/indomaret.svg" alt="">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">Indomaret</span>
                                <span class="fz-10">Hanya menerima dari Indomaret. Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="p" value="INDOMARET" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                            <div class="col-1 left me-3">
                                <img src="assets/img/qris.svg" alt="" class="qris">
                            </div>
                            <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                <span class="fw-600 fz-12">QRIS</span>
                                <span class="fz-10">Hanya menerima dari QRIS. Metode Pembayaran Lebih Mudah</span>
                                <input type="radio" name="pembayaran" id="p" value="QRISC" onclick="document.getElementById('method').value = this.value;console.log(this.value)">
                                <span class="checkmark position-absolute top-50 me-2"></span>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="d-none d-lg-flex align-items-center justify-content-between justify-content-lg-end gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-12 abu">Subtotal untuk Produk</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-12">Rp. <?= $total ?></span>
                    </div>
                </div>
                <?php if($idProducts[0] != '17') : ?>
                <div class="d-none d-lg-flex align-items-center justify-content-between justify-content-lg-end  gap-4">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-12 abu">Subtotal Pengiriman</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-12">Rp. <span id="pengiriman2"><?= $hrg ?></span></span>
                    </div>
                </div>
                <?php endif; ?>
                <div class="d-none d-lg-flex align-items-center justify-content-between justify-content-lg-end  gap-4" id="voucher">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-12 abu">Potongan voucher</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-12">Rp. <span id="diskon">0</span></span>
                    </div>
                </div>
                <!-- <div class="d-none d-lg-flex align-items-center justify-content-between justify-content-lg-end  gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-11 fw-600">Total Pembayaran</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="orange fw-600 fz-11">Rp. <span  id="total"><?= $total ?></span></span>
                    </div>
                </div> -->
            </div>
        </div>
        
        
        <!-- Navbar Bottom -->
        <div class="navbarBottom bg-white container px-0 position-fixed bottom-0 start-0 end-0 m-auto mt-5">
            <div class="d-flex justify-content-end gap-lg-3 align-items-center ps-3">
                <div class="d-none d-lg-flex flex-column align-items-end">
                    <span class="fz-12 fw-500">Total Pembayaran</span>
                    <span class="fz-12 fw-600 orange">Rp. <span  id="total"><?= (isset($type)) ? $total : $hrg + $total ?></span>
                </div>
                <form action="<?= (isset($type)) ? 'pembayaran.php' : 'pengiriman.php' ?>" method="post">
                <!-- Mobile -->
                    <input type="text" name="idProduct" id="idProduct" value="<?= implode(',', $idProducts) ?>" hidden>
                    <input type="text" name="idCart" id="idCart" value="<?= implode(',', $idCart) ?>" hidden>
                    <input type="text" name="idVariant" id="idVariant" value="<?= ',' . $idVariant ?>" required hidden>
                    <input type="text" name="qty" id="qty" value="<?= $quantity ?>" hidden >
                    <input type="text" name="amount" id="amount1" value="" hidden>
                    <input type="text" name="voucherID" id="voucherID1" value="" hidden>
                    <input type="text" name="voucherDisc" id="voucherDisc" value="" hidden>
                    <button type="submit" style="border: none;" class="m-0 d-block d-lg-none bg-blue text-light p-3 fz-12" onclick="document.getElementById('amount1').value = <?= $total ?>">
                        Buat Pesanan
                    </button>
                </form>
                <!-- Desktop -->
                <form action="server/process/checkout.php" method="post">
                <input type="text" name="amount" id="amount" value="<?= ($type == 'member') ? $total : $hrg + $total ?>" hidden required>
                <input type="text" name="idCart" id="idCart" value="<?= implode(',', $idCart) ?>" hidden required>
                <input type="text" name="idProduct" id="idProduct" value="<?= implode(',', $idProducts) ?>"hidden required>
                <input type="text" name="idVariant" id="idVariant" value="<?= ',' . $idVariant ?>" hidden required >
                <input type="text" name="courier" id="cou" value="<?= ($type == 'member') ? 'DIGITAL' : $namacou ?>" hidden required>
                <input type="text" name="method" id="method" value="" hidden required>
                <input type="text" name="qty" id="qty" value="<?= $quantity ?>" hidden required>
                <input type="text" name="voucherID" id="voucherID" value="" hidden>
                <button type="submit" style="border: none;" class="d-none d-lg-block right bg-blue text-light p-3">
                    Buat Pesanan
                </button>
            </div>
        </div>
        </form>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        $(document).ready(function() {
            document.getElementById('amount1').value = <?= $total ?>;
        })
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        const diskon = document.getElementById('diskon');
        const total = document.getElementById('total');

        var asd = 0;

        diskon.addEventListener('change', function() {
            total.innerText = parseInt(total.innerText) - parseInt(diskon.innerText);
            console.log(total.innerText);
        })
        if(asd == 1) {
            console.log('asd');
        }
    </script>
</body>

</html>