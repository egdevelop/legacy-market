<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$product = getProduct($_GET['id']);
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    <title>Detail Products</title>
</head>

<body>

    <div class="body-wrapper">
        <div class="bg-white pt-4 px-lg-4 pb-3">
            <div class="container">
                <div class="d-flex gap-2 justify-content-between align-items-center">
                    <a onclick="history.back()" class="text-dark d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line fz-14"></i>
                        <span class="fz-14 fw-600">
                            Penilaian
                        </span>
                    </a>
                    <div class="right">
                        <img src="assets/img/productsCart.jpg" alt="" class="imgVariasi">
                    </div>
                </div>
                <hr class="my-2 py-0">
                <div class="row bg-pink p-4 mt-3 d-none d-lg-flex align-items-center justify-content-start">
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
                <div class="row d-flex my-4 ms-lg-4">
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
                <div class="row d-flex my-4 ms-lg-4">
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

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
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

    </script>
</body>

</html>