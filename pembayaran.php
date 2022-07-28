<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Metode Pembayaran</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Metode Pembayaran</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- keranjang -->
        <div class="bg-white pt-1 pb-0 mb-5">
            <div class="container-fluid px-0">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="ri-bank-fill"></i>
                                <span class="fz-12 fw-600"> Transfer Bank</span>
                            </button>
                        </p>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1 position-relative">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/bca.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Bank BCA </span>
                                        <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BCA. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio" value="bca" onclick="document.getElementById('method').value = this.value">
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
                                        <input type="radio" name="radio"  value="mandiri" onclick="document.getElementById('method').value = this.value">
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
                                        <input type="radio" name="radio"  value="bni" onclick="document.getElementById('method').value = this.value">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <i class="ri-store-3-line"></i>
                                <span class="fz-12 fw-600">Outlet</span>
                            </button>
                        </p>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/alfamart.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Alfamart </span>
                                        <span class="fz-10">Hanya menerima dari Alfamart. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio" value="alfamart" onclick="document.getElementById('method').value = this.value">
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
                                        <input type="radio" name="radio" value="indomaret" onclick="document.getElementById('method').value = this.value">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <i class="ri-qr-code-line"></i>
                                <span class="fz-12 fw-600">Digital Payment</span>
                            </button>
                        </p>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/qris.svg" alt="qris" class="qris">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">QRIS</span>
                                        <span class="fz-10">Hanya menerima dari QRIS. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio" value="qris" onclick="document.getElementById('method').value = this.value">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-white pt-1 pb-3 mb-5">
            <div class="d-flex align-items-center justify-content-between justify-content-lg-end gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-10 abu">Subtotal untuk Produk</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10">Rp. <?= $total ?></span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end  gap-4">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-10 abu">Subtotal Pengiriman</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10" id="pengiriman2">Rp. 0</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end  gap-4" id="voucher">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-10 abu">Potongan voucher</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10" id="pengiriman2">Rp. 0</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end  gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-11 fw-600">Total Pembayaran</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="orange fw-600 fz-11">Rp. <span  id="total"><?= $total ?></span></span>
                    </div>
                </div>
        </div>
    </div>

    <form action="server/process/checkout.php" method="post">
    <input type="text" name="idCart" id="idCart" value="<?= $_POST['idCart'] ?>" hidden>
    <input type="text" name="amount" id="amount" value="<?= $_POST['amount'] ?>" hidden>
    <input type="text" name="idProduct" id="idProduct" value="<?= $_POST['idProduct'] ?>" hidden>
    <input type="text" name="qty" id="qty" value="<?= $_POST['qty'] ?>" hidden>
    <input type="text" name="courier" id="courier" value="<?= $_POST['courier'] ?>" hidden>
    <input type="text" name="method" id="method" value="" required hidden>

    <!-- Navbar Bottom -->
    <div class="navbarBottom bg-white container-fluid px-0 position-fixed bottom-0 mt-5">
        <div class="d-flex justify-content-between gap-3 align-items-center ps-3">
            <div class="left d-flex flex-column align-items-end">
                <span class="fz-12 fw-500">Biaya penanganan</span>
                <span class="fz-12 fw-600 orange">Rp. <span id="amount"><?= $_POST['amount'] ?></span></span>
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