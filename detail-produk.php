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
        <div class="container mt-3 position-absolute top-0">
            <form class="d-flex align-items-center justify-content-between">
                <a onclick="history.back()" class="bg-abu-trans px-2 borad-10">
                    <i style="font-size: 1.5rem;" class="ri-arrow-left-s-line text-light"></i>
                </a>
                <div class="right d-flex gap-2">
                    <div class="bg-abu-trans px-2 borad-10">
                        <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i style="font-size: 1.5rem;" class="ri-shopping-cart-2-line text-light"></i>
                        </a>
                    </div>
                    <div class="bg-abu-trans px-2 borad-10">
                        <i style="font-size: 1.5rem;" class="ri-more-2-fill text-light"></i>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Detail -->
        <div class="bg-white">
            <img src="assets/img/detail1.jpg" alt="" class="img-fluid w-100">
            <div class="container-fluid px-0 mt-3">
                <div class="d-flex justify-content-center gap-2">
                    <img src="assets/img/detailPilih1.jpg" alt="" class="img-fluid detailPilih activeDetailProducts">
                    <img src="assets/img/detailPilih2.jpg" alt="" class="img-fluid detailPilih">
                    <img src="assets/img/detailPilih3.jpg" alt="" class="img-fluid detailPilih">
                    <img src="assets/img/detailPilih4.jpg" alt="" class="img-fluid detailPilih">
                </div>
                <div class="mt-3">
                    <ul class="d-flex align-items-center gap-3 justify-content-center nav nav-pills mb-3 border-bottom-custom pb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button onclick="hide()" class="nav-link detailProduk fw-bold" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Ecer</button>
                        </li>
                        <li class="nav-item fz-20" role="presentation">
                            |
                        </li>
                        <li class="nav-item" role="presentation">
                            <button onclick="show()" class="nav-link detailProduk fw-bold active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Grosir</button>
                        </li>
                    </ul>
                    <div class="tab-content container" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="d-flex gap-3 text-center justify-content-center border-b-orange pb-4">
                                <div class="d-flex items-center flex-column">
                                    <h3 class="orange fz-20 fw-600">Rp20.000</h3>
                                    <span class="text-secondary fz-10">per 1 pcs ( Satuan )</span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="d-flex gap-3 text-center justify-content-center border-b-orange pb-4">
                                <div class="d-flex items-center flex-column">
                                    <h3 class="orange fz-16 fw-600">Rp19.000</h3>
                                    <span class="text-secondary fz-10">per 60 pcs</span>
                                </div>
                                <div class="d-flex items-center flex-column">
                                    <h3 class="orange fz-16 fw-600">Rp18.000</h3>
                                    <span class="text-secondary fz-10">per 60 pcs</span>
                                </div>
                                <div class="d-flex items-center flex-column">
                                    <h3 class="orange fz-16 fw-600">Rp16.500</h3>
                                    <span class="text-secondary fz-10">per 60 pcs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative pt-2">
                    <div class="bg-disable position-absolute start-0 end-0 bottom-0 w-100 h-100" id="hide1"></div>
                    <div class="container">
                        <h6 class="fw-bold text-dark mt-2">Topi Fashion</h6>
                        <h6 class="fw-bold text-dark">Anak Laki - Laki & Perempuan</h6>
                        <span class="text-secondary fz-12">2.5 Rb Terjual</span>
                    </div>
                    <p class="text-light fw-bold fz-14 text-center z-3 position-absolute desc1" id="hide2">Halaman Grosir Khusus Member</p>
                </div>
                <div class="container py-2">
                    <div class="d-flex gap-3 justify-content-center">
                        <div class="left me-3">
                            <i style="font-size: 1.5rem;" class="me-3 blue ri-chat-1-line"></i>
                            <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i style="font-size: 1.5rem;" class="me-3 blue ri-shopping-cart-2-line"></i></a>
                        </div>
                        <div class="right">
                            <a class="btn text-light bg-blue px-4 py-2" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative">
            <div class="bg-disable position-absolute top-0 start-0 end-0 bottom-0 h-100" id="hide3"></div>
            <!-- Desc Price -->
            <div class="bg-white py-4 border-bottom-custom">
                <div class="" id="hide4">
                    <p class="text-light fw-bold fz-13 text-center z-3 position-absolute desc1"><i style="font-size: 6.5rem; top: -50px" class="ri-lock-2-fill z-2 position-absolute desc2 text-light"></i></p>
                    <p class="text-light fz-14 text-center z-3 position-absolute desc3 px-5">Nikmati harga grosir diatas dengan bergabung bersama kami</p>
                    <div class="d-flex position-absolute desc4">
                        <button class="btn text-light fz-13 text-center z-3 fw-bold bg-blue desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                            <span class="text-light fz-13 text-center z-3 fw-bold">Bulanan</span>
                            <span class="text-light fz-13 text-center z-3 fw-normal">Rp200.000</span>
                        </button>
                        <button class="btn text-light fz-13 text-center z-3 fw-bold bg-yellow desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                            <span class="text-light fz-13 text-center z-3 fw-bold">3 Bulan</span>
                            <span class="text-light fz-13 text-center z-3 fw-normal">Rp450.000</span>
                        </button>
                        <button class="btn text-light fz-13 text-center z-3 fw-bold bg-orange desc4 px-2 px-sm-3 py-2 d-flex flex-column">
                            <span class="text-light fz-13 text-center z-3 fw-bold">Tahunan</span>
                            <span class="text-light fz-13 text-center z-3 fw-normal">Rp600.000</span>
                        </button>
                        <p class="text-light fz-14 text-center z-3 position-absolute desc3 px-5"></p>
                    </div>
                    <p class="text-light fz-14 text-center z-3 position-absolute desc5 px-3">Klik salah satu untuk bergabung</p>
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
            </div>

            <!-- Desc Produk -->
            <div class="bg-white pt-4 pb-3 border-bottom-custom">
                <div class="container">
                    <span class="fz-14 fw-bold">
                        Rincian produk
                    </span>
                    <ul class="mt-3" style="list-style-type: '-'; padding-left: 5px;">
                        <li class="fz-12 text-dark textIndent">Bahan tebal</li>
                        <li class="fz-12 text-dark textIndent">Tidakberbulu</li>
                        <li class="fz-12 text-dark textIndent">Nyaman di gunakan si buah hati</li>
                        <li class="fz-12 text-dark textIndent">Cocok untuk anak perempuan maupun laki laki</li>
                        <li class="fz-12 text-dark textIndent">Perkiraan usia untuk 3- 10tahun</li>
                        <li class="fz-12 text-dark textIndent">Lingkar kepala kurang lebih 48cm bisa di atur hingga 55cm</li>
                        <li class="fz-12 text-dark textIndent">Bagian belakang topi terdapat pengatur untuk memperbesar dan memperkecil topi sehingga menyesuaikan bentuk kepala anak</li>
                        <li class="fz-12 text-dark textIndent"> Berat : 80gr</li>
                        <li class="fz-12 text-dark textIndent">1kg muat 15pcs</li>
                    </ul>
                </div>
            </div>

            <!-- Varian -->
            <div class="bg-white pt-4 pb-3 border-bottom-custom">
                <div class="container">
                    <span class="fz-14 fw-bold">Pilih Varian</span>
                    <div class="d-flex gap-2 justify-content-center mt-2">
                        <img src="assets/img/varian.jpg" alt="" class="varian activeVarian">
                        <img src="assets/img/varian.jpg" alt="" class="varian">
                        <img src="assets/img/varian.jpg" alt="" class="varian">
                        <img src="assets/img/varian.jpg" alt="" class="varian">
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Modal -->
        <div class="modal animateCustom" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered border-none" style="margin: 0; height: 100%;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>