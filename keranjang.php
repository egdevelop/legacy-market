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
    <link rel="stylesheet" href="assets/css/style2.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Keranjang Saya</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom d-block d-md-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Keranjang Saya</span>
                    </a>
                    <div class="right d-flex align-items-center gap-2">
                        <span class="fw-500 fz-14">Ubah</span>
                        <i style="font-size: 1.5rem;" class="ri-chat-1-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-none d-md-block">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <div class="left">
                        <span class="fz-12 fw-bold text-light">Keranjang Belanja</span>
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

        <!-- Desktop -->
        <div class="container-lg bg-white py-3 mt-keranjang d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                        </div>
                        <div class="right">
                            <span class="fz-12">Semua Produk</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Variasi</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Kuantitas</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Harga</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Aksi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-lg bg-white mt-4 py-3 d-none d-md-block">
            <div class="container">
                <div class="row border-abu mt-3 py-2">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                        </div>
                        <div class="center">
                            <img src="assets/img/productsCart.jpg" alt="" class="img-fluid object-cover imgKeranjang">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fz-10">Jocoproduction - Topi Baseball Anak
                                Laki-laki & Perempuan Motif bordir Alfabeth
                            </span>
                            <span class="fz-10 fw-600 mt-2">Eceran</span>
                        </div>
                    </div>
                    <div class="col-2 d-flex flex-column">
                        <span class="fz-12 fw-600">Variasi :</span>
                        <span class="fz-12">M-coklat</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">
                            <div class="wrapper">
                                <span class="minus">-</span>
                                <span class="num">1</span>
                                <span class="plus">+</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500 yellow">Rp20.000</span>
                    </div>
                    <div class="col-2 text-danger">
                        <span class="fz-12 fw-500 d-flex align-items-center gap-1">
                            <i class="ri-delete-bin-fill"></i>
                            <span>Hapus</span>
                        </span>
                    </div>
                </div>
                <div class="row border-abu mt-3 py-2">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                        </div>
                        <div class="center">
                            <img src="assets/img/productsCart.jpg" alt="" class="img-fluid object-cover imgKeranjang">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fz-10">Jocoproduction - Topi Baseball Anak
                                Laki-laki & Perempuan Motif bordir Alfabeth
                            </span>
                            <span class="fz-10 fw-600 mt-2">Eceran</span>
                        </div>
                    </div>
                    <div class="col-2 d-flex flex-column">
                        <span class="fz-12 fw-600">Variasi :</span>
                        <span class="fz-12">M-coklat</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">
                            <div class="wrapper">
                                <span class="minus">-</span>
                                <span class="num">1</span>
                                <span class="plus">+</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500 yellow">Rp20.000</span>
                    </div>
                    <div class="col-2 text-danger">
                        <span class="fz-12 fw-500 d-flex align-items-center gap-1">
                            <i class="ri-delete-bin-fill"></i>
                            <span>Hapus</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile -->
        <div class="bg-white pt-4 pb-5 mb-5 d-block d-md-none">
            <div class="container pt-4 pb-3 d-flex gap-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Bottom -->
        <div class="container-lg navbarBottomCart bg-white start-0 end-0 bottom-0 mt-4 py-3">
            <div class="container d-flex flex-column gap-2">
                <div class="d-flex align-items-center justify-content-between justify-content-sm-end">
                    <div class="left d-flex align-items-center">
                        <img src="assets/img/voucher.svg" alt="" class="me-2">
                        <span class="fz-11">Voucher</span>
                    </div>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#btnVoucher"
                        class="right d-flex align-items-center ps-3">
                        <span class="abu fz-11">Gunakan / masukkan kode</span>
                        <i class="abu ri-arrow-right-s-line"></i>
                    </a>
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

                                <label class="radioWrapper ps-1 d-flex align-items-start ">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkir.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-1 d-flex align-items-start py-1">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkir.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-1 d-flex align-items-start py-1">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkir.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-1 d-flex align-items-start py-1">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkir.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-1 d-flex align-items-start py-1">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkiroff.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-1 d-flex align-items-start py-1">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkiroff.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
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

                <!-- Done Voucher -->
                <!-- <div class="d-flex gap-4 align-items-center justify-content-between justify-content-sm-end">
                    <div class="left d-flex align-items-center">
                        <span class="text-light fz-10 fw-500 bg-yellow px-2 me-3">57% OFF</span>
                        <img src="assets/img/voucher.svg" alt="" class="me-2">
                        <span class="fz-11">Voucher</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="blue fz-11">Ganti Voucher</span>
                    </div>
                </div> -->
                <hr class="my-1 py-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="left d-flex align-items-center">
                        <div class="left">
                            <input type="checkbox" class="form-check-input me-2"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                        </div>
                        <div class="right">
                            <span class="fz-11">Semua</span>
                        </div>
                    </div>
                    <div class="right">
                        <span class="fz-11 fw-500">Total (0 produk)</span>
                        <span class="fz-11 fw-600 orange">Rp0</span>
                        <a href="checkout.php"
                            class="ms-3 right text-center bg-blue fz-12 text-light px-3 py-2 w-100 h-100">
                            Checkout
                        </a>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>