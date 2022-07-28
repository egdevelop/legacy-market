<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
session_start();

$addres = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$_SESSION[userid]'");
$address = mysqli_fetch_assoc($addres);
$costs = getCost($address['city_id'], 151, 1000);
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Opsi Pengiriman</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Opsi Pengiriman</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- keranjang -->
        <div class="bg-white pt-1 mb-5">
            <div class="container-fluid px-0">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="d-flex flex-column gap-2">
                                    <span class="fz-12 fw-600">Reguler</span>
                                    <span class="fz-10">Akan diterima pada tanggal 14 - 16 Apr</span>
                                </div>
                            </button>
                        </p>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1 position-relative">
                                <?php foreach($costs as $c) : ?>
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                    <!-- <div class="col-1 left me-3">
                                        <img src="assets/img/jne.svg" alt="">
                                    </div> -->
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12"><?= $c['name'] ?></span>
                                        <span class="fz-9 orange" style="width: 90%">Rp. <?= $c['harga'] ?></span>
                                        <input type="radio" name="radio" onclick="
                                        document.getElementById('total').innerText = '<?php $all = $_POST['amount'] + $c['harga']; echo $all ?>';
                                        document.getElementById('amount').value = '<?php $all = $_POST['amount'] + $c['harga']; echo $all ?>';
                                        document.getElementById('courier').value = '<?= $c['name'] ?>';
                                        ">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                                <?php endforeach; ?>
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
        </div>
        <form action="pembayaran.php" method="post">
    </div>
        <input type="text" name="idCart" id="idCart" value="<?= $_POST['idCart'] ?>" hidden>
        <input type="text" name="amount" id="amount" value="<?= $POST['amount'] ?>" hidden>
        <input type="text" name="idProduct" id="idProduct" value="<?= $_POST['idProduct'] ?>" hidden>
        <input type="text" name="qty" id="qty" value="<?= $_POST['qty'] ?>" hidden>
        <input type="text" name="courier" id="courier" value="" required hidden>
        <!-- Navbar Bottom -->
        <div class="navbarBottom bg-white container-fluid px-0 position-fixed bottom-0 mt-5">
            <div class="d-flex justify-content-between gap-3 align-items-center ps-3">
                <div class="left d-flex flex-column align-items-end">
                    <span class="fz-12 fw-500">Biaya penanganan</span>
                    <span class="fz-12 fw-600 orange">Rp. <span id="total"><?= $_POST['amount'] ?></span></span>
                </div>
                <button type="submit" style="border: none;" class="right bg-blue text-light p-3">
                    Konfirmasi
                </button>
            </div>
        </div>
    </form>
    </div>
    
    <!-- Foot -->
    <?php include 'components/foot.php'; ?>
</body>

</html>