<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Invoice Pembayaran</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom d-block d-lg-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Pembayaran</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-none d-lg-block">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <div class="left">
                        <span class="fz-12 text-light">Pembayaran</span>
                    </div>
                    <div class="right">
                        <form class="d-flex gap-3 align-items-center justify-content-center nosubmit">
                            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice -->
        <div class="container bg-white py-4 mb-5 mtInvoice pb-5 border-top-custom">
            <div class="container">
                <div class="gap-2 d-flex align-items-center">
                    <i class="ri-arrow-left-s-line"></i>
                    <span class="fz-12 fw-600 me-3">Pembayaran</span>
                </div>
                <div class="btn-outline-yellow d-flex align-items-center gap-1 px-2 my-3">
                    <i class="yellow ri-alert-fill"></i>
                    <span class="fz-12 mx-2 fw-500 text-dark">Pastikan semua info dimulai dari nominal dan tujuan rekening sama,diharapkan untuk cek ulang agar tidak ada kekliruan</span>
                </div>
                <div class="row">
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <span class="fz-12">Total Pembayaran</span>
                            <span class="fz-12 orange">Rp43.000</span>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center gap-2">
                            <img src="assets/img/bca.svg" alt="">
                            <span class="fz-12">Bank BCA</span>
                        </div>
                        <span class="fz-12">No. Rekening :</span>
                        <div class="d-flex gap-2 mb-3">
                            <span class="fz-12 fw-600 orange">2312 38129</span>
                            <span class="fz-12">( Atas Nama Abdul )</span>
                            <span class="fz-12 blue">SALIN</span>
                        </div>
                        <span class="fz-12">Petunjuk Transfer</span>
                        <hr>
                        <ul class="fz-12">
                            <li>Pilih Transaksi > Daftar Transfer > Antar Rekening</li>
                            <li>Simpan Rekening dan pastikan atas namanya sama</li>
                            <li>Pilih Transfer > Antar Rekening</li>
                            <li>Masukkan Nomor Rekening yang tadi di simpan</li>
                            <li>Masukkan Nominal sesuai yang tertera dalam aplikasi</li>
                            <li>Periksa Informasi ulagn yg tertera untuk memastikan keberhasilan,lalu bila sudah klik konfirmasi disini</li>
                        </ul>
                        <button class="btn btn-blue fz-12 text-light w-100">Konfirmasi</button>
                    </div>
            </div>
            </div>
        </div>
        <?php include "partials/navBottom.php"; ?>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
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
    </script>
</body>

</html>