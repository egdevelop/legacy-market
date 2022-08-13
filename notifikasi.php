<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Notifikasi</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Notifikasi</span>
                </a>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Flash Sale -->
        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-0 col-lg-2 left bg-white borad-10 p-4 d-none d-lg-block">
                        <div class="d-flex gap-2">
                            <div class="profile">
                                <img src="<?= ($data['photo']) ?  $data['photo'] : "assets/img/profile.jpg" ?>" alt="" class="profileImg">
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fz-12 fw-bold"><?= ($data['name']) ?  $data['name'] : "Naufal" ?></span>
                            </div>
                        </div>
                        <div class="container-menu mt-4">
                            <nav>
                                <ul class="menu">
                                    <li class="fz-12">
                                        <a onclick="location.href = 'profilDetail.php';" class="cursor-pointer feat-btn">
                                            <span class="blue"><i class="ri-user-line"></i></span>
                                            <span>Akun saya</span>
                                        </a>
                                        <ul class="feat-show">
                                            <li><a href="profilDetail.php">Profil</a></li>
                                            <li><a href="alamat.php">Alamat</a></li>
                                            <li><a href="ubah-sandi.php">Ubah sandi</a></li>
                                            <li><a href="member.php">Member</a></li>
                                        </ul>
                                    </li>
                                    <li class="fz-12">
                                        <a href="pesanan-saya.php" class="mainMenu">
                                            <span class="blue"><i class="ri-file-list-3-line"></i></span>
                                            <span>Pesanan saya</span>
                                        </a>
                                    </li>
                                    <li class="fz-12">
                                        <a href="notifikasi.php" class="mainMenu activeMenu">
                                            <span class="blue"><i class="ri-notification-4-line"></i></span>
                                            <span>Notifikasi</span>
                                        </a>
                                    </li>
                                    <li class="fz-12">
                                        <a href="voucher-akun.php" class="mainMenu">
                                            <span class="blue"><i class="ri-coupon-2-line"></i></span>
                                            <span>Voucher</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 right bg-white borad-10 p-4 d-flex flex-column">
                        <div class="bg-white mt-lg-3 borad-10 p-lg-4">
                            <div class="d-none d-lg-flex justify-content-between">
                                <div class="left">
                                    <span class="fz-13 fw-600">Notifikasi</span>
                                </div>
                                <div class="right">
                                    <span class="cursor-pointer fz-12 orange">Hapus Semua</span>
                                    <span class="cursor-pointer fz-12 ms-3 abu">Tandai sebagai sudah dibaca</span>
                                </div>
                            </div>
                            <hr class="my-3 py-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-2">
                                    <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                    <div class="d-flex flex-column">
                                        <span class="fz-12 fw-bold">Paket Di terima</span>
                                        <span class="fz-12 my-1 titleNotif">Jocoproduction - Topi Baseball
                                            Anak
                                            Laki-laki & Perempuan
                                            Motif bordir Alfabeth
                                        </span>
                                        <span class="fz-10 fw-500">Produk dipesan 23/04/2022</span>
                                    </div>
                                </div>
                                <div class="d-none d-lg-block">
                                    <button type="button" class="w-100 btnMember px-3 py-2 fz-11 fw-600 orange">Tampilkan
                                        Rincian Pesan</button>
                                </div>
                            </div>
                            <hr class="my-3 py-0">
                            <div class="mt-3 d-flex align-items-center justify-content-between">
                                <div class="left">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "partials/navBottom.php" ?>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php" ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var navCustom = document.querySelectorAll('.nav-link-custom');

            if (navCustom) {

                navCustom.forEach(function(el, key) {

                    el.addEventListener('click', function() {
                        console.log(key);

                        el.classList.toggle("activePesanan");

                        navCustom.forEach(function(ell, els) {
                            if (key !== els) {
                                ell.classList.remove('activePesanan');
                            }
                            console.log(els);
                        });
                    });
                });
            }
        });

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