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
                        <span class="fz-12 text-light">Checkout</span>
                    </div>
                    <div class="right">
                        <form class="d-flex gap-3 align-items-center justify-content-center nosubmit">
                            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="bg-white py-4  mt-keranjang">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ri-map-pin-line blue"></i>
                        <span class="fw-600 fz-12">Alamat Pengiriman</span>
                    </div>
                    <span class="fz-12 blue">Ubah</span>
                </div>
                <div class="fz-12 mt-3">Mochammad Naufal (+62) 85895372384</div>
                <div class="fz-12 mt-2">Sukahening wetan sebelah kiri masjid Al ikhlas RT/RW 02/21 Kel Karsamenak, KOTA
                    TASIKMALAYA - KAWALU, JAWA BARAT, ID 46182
                </div>
            </div>
        </div>

        <!-- Produk dipesan -->
        <div class="bg-white py-4 border-top-custom">
            <div class="container">
                <span class="fw-600 fz-12">Produk Dipesan</span>
                <div class="d-flex align-items-end justify-content-between gap-2 mt-2">
                    <div class="d-flex gap-2">
                        <img src="assets/img/varian.jpg" alt="" class="varian">
                        <div class="d-flex flex-column">
                            <span class="fw-600 fz-12">Topi Fashion <br>Anak Laki - Laki & Perempuan</span>
                            <div class="d-flex gap-3 mt-2">
                                <span class="fz-12 fw-600 orange">Rp20.000</span>
                                <span class="fz-12 fw-600 orange">Eceran</span>
                            </div>
                        </div>
                    </div>
                    <span class="fz-12 fw-600 orange">x1</span>
                </div>
            </div>
        </div>

        <!-- Opsi Pengiriman -->
        <div class="bg-white py-4 border-top-custom">
            <div class="container">
                <span class="fw-600 fz-12 border-b-2">Opsi Pengiriman</span>
                <div class="d-flex align-items-end justify-content-between gap-2 mt-2">
                    <div class="d-flex flex-column">
                        <span class="fz-12">Reguler</span>
                        <span class="fz-11 abu">Estimasi sampai 10 - 14 Apr</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fz-12 orange fw-600">Rp23.000</span>
                        <i class="abu ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Voucher -->
        <div class="bg-white py-4 border-top-custom">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between gap-4">
                    <div class="left d-flex align-items-center">
                        <img src="assets/img/voucher.svg" alt="" class="me-2">
                        <span class="fz-11">Voucher</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-11">Gunakan / masukkan kode</span>
                        <i class="abu ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="bg-white py-4 mb-5 pb-5 border-top-custom">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between gap-4">
                    <div class="left gap-2 d-flex align-items-center">
                        <i class="ri-money-dollar-circle-line orange"></i>
                        <span class="fz-12 fw-600">Metode Pembayaran</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10">Transfer Bank</span>
                        <i class="abu ri-arrow-right-s-line"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-10 abu">Subtotal untuk Produk</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10">Rp20.000</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-4">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-10 abu">Subtotal Pengiriman</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="abu fz-10">Rp23.000</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-4 mt-3">
                    <div class="left gap-2 d-flex align-items-center">
                        <span class="fz-11 fw-600">Total Pembayaran</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="orange fw-600 fz-11">Rp43.000</span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Navbar Bottom -->
        <div class="navbarBottom bg-white container-fluid px-0 position-fixed bottom-0 mt-5">
            <div class="d-flex justify-content-between gap-3 align-items-center ps-3">
                <div class="left d-flex flex-column align-items-end">
                    <span class="fz-12 fw-500">Total Pembayaran</span>
                    <span class="fz-12 fw-600 orange">Rp43.000</span>
                </div>
                <a href="pembayaran.php" class="right bg-blue text-light p-3">
                    Buat Pesanan
                </a>
            </div>
        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>