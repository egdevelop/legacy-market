<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
if(isset($_GET['no'])) {
    $no = $_GET['no'];
    mysqli_query($conn, "UPDATE users SET no_hp = '$no' WHERE id = '$_SESSION[userid]'");
    if(mysqli_affected_rows($conn) > 0) {
        header('Location: /profilDetail.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Profile Detail</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "partials/navbarProfil.php" ?>
        <div class="bg-blue w-100 position-fixed z-3 d-block d-sm-none pb-4">
            <div class="container">
                <form class="pb-1 pt-4 d-flex gap-3 align-items-center justify-content-center nosubmit">
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                        <div class="position-relative">
                        <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1">
                            <i class="ri-shopping-cart-line"></i>
                            <span class="numCart d-flex justify-content-center align-items-center">
                                <span class="fz-12"><?= $cart ?></span>
                            </span>
                        </a>
                    </div>
                    <a href="chat.php" class="ms-3 text-light iconNavbar z-1"><i class="me-3 ri-customer-service-2-line"></i></a>
                </form>
            </div>
        </div>

        <!-- Profil Detail -->
        <section class="py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <?php include "partials/sidebarProfil.php" ?>
                    <div class="col-12 col-lg-9 right bg-white borad-10 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="left">
                                <span class="fz-16 fw-600">Profil Saya</span>
                                <span class="fz-14 abu d-none d-lg-block">Kelola informasi profil Anda untuk mengontrol, melindungi dan
                                    mengamankan akun</span>
                            </div>
                            <div class="right d-flex align-items-center gap-2">
                                <span class="fz-16"><img src="assets/img/google.svg" alt=""></span>
                                <span class="fz-10 fw-600">Telah masuk dengan google</span>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row gap-2 d-flex justify-content-center justify-content-md-between">
                            <form class="d-flex flex-column-reverse flex-lg-row justify-content-center align-items-start" action="server/process/updateProfile.php" method="post">
                            <div class="col-8 left d-none d-lg-block">
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Username</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-600"><?= ($data['name']) ?  $data['name'] : "Admin" ?></span>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <label for="name" class="fz-12 col-form-label">Name</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control fz-12" value="<?= $data['name'] ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Email</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-500"><?= ($data['email']) ?  censoredEmail($data['email']) : "admin@gmail.com" ?></span>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nomor Telepon</span>
                                    </div>
                                    <div class="col-9" id="edit">
                                        <span class="fz-12 fw-500" id="a"><?= substr($data['no_hp'], 0, 4) . "****" . substr($data['no_hp'], 8, 4) ?></span>
                                        <a class="fz-12" href="javascript:void(0)" onclick="document.getElementById('edit').style = 'display: none'; document.getElementById('simpan').style = 'display: block'">ubah</a>
                                    </div>
                                    <div class="col-9" id="simpan" style="display: none">
                                            <input class="" type="number" name="nohp" value="<?= $data['no_hp'] ?>" id="nohp" onkeyup="document.getElementById('link').href = 'profilDetail.php?no=' + this.value">
                                            <a class="fz-12 text-success" href="javascript:void(0)" type="submit" id="link">simpan</a>
                                             | 
                                            <a class="fz-12 text-danger" href="javascript:void(0)" onclick="document.getElementById('edit').style = 'display: block'; document.getElementById('simpan').style = 'display: none'">batal</a>
                                        </div>
                                    </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Jenis Kelamin</span>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="laki-laki" <?= ($data['gender'] == 'laki-laki') ? 'checked' : ''?>>
                                            <label class="form-check-label fz-12" for="inlineRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="perempuan" <?= ($data['gender'] == 'perempuan') ? 'checked' : ''?>>
                                            <label class="form-check-label fz-12" for="inlineRadio2">Perempuan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="lainnya" <?= ($data['gender'] == 'lainnya') ? 'checked' : ''?>>
                                            <label class="form-check-label fz-12" for="inlineRadio3">Lainnya</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Tanggal Lahir</span>
                                    </div>
                                    <?php $ttl = explode('/', $data['ttl']) ?>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="tanggal">
                                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?= $i ?>" <?= ($i == $ttl[0]) ? 'selected' : '' ?>><?= $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="bulan">
                                                    <?php
                                                    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                    foreach($months as $key => $month) { ?>
                                                        <option value="<?= $key + 1 ?>" <?= ($key + 1 == $ttl[1]) ? "selected" : "" ?>><?= $month ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="tahun">
                                                    <?php for($i = 1950; $i <= 2022; $i++) { ?>
                                                        <option value="<?= $i ?>" <?= ($i == $ttl[2]) ? "selected" : "" ?>><?= $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <button class="btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 right d-flex align-items-center flex-column gap-3 mt-0 mt-lg-5">
                                <div class="profileBig">
                                    <img src="<?= ($data['photo']) ?  $data['photo'] : "assets/img/profile.jpg" ?>" alt="" class="profileImgBig">
                                </div>
                                <a href="ubahProfil.php" class="d-block d-lg-none btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto">
                                 Ubah Profil    
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-block d-lg-none bg-white py-3 mt-3">
                        <a href="pesanan-saya.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="blue ri-file-list-3-line"></i>
                                <span class="text-dark fz-12 fw-600">Pesanan Saya<span> 
                            </div>                     
                            <div class="right">
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="voucher-akun.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="blue ri-coupon-2-line"></i>
                                <span class="text-dark fz-12 fw-600">Voucher Saya<span> 
                            </div>                     
                            <div class="right">
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="member.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                            <i class="blue ri-group-line"></i>
                                <span class="text-dark fz-12 fw-600">Member</span>                       
                            </div>
                            <div class="text-dark d-flex gap-1 align-items-center">
                                <span class="fz-12">Aktif</span>
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                         <a href="pengaturanAkun.php" class="text-dark d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                               <i class="blue ri-settings-line"></i>
                                 <span class="fz-12 fw-600">Pengaturan Akun</span>                       
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                    </div>
                    <div class="d-block d-lg-none bg-white py-3 mt-3 mb-5">
                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                               <i class="blue ri-message-3-line"></i>
                                 <span class="fz-12 fw-600">Bantuan Akun</span>                       
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </div>
                        <hr class="my-2 py-0"> -->
                        <div class="d-flex align-items-center justify-content-between" onclick="window.location = 'server/Login/logout.php'">
                            <div class="d-flex align-items-center gap-2">
                               <i class="blue ri-logout-box-line"></i>
                                 <span class="fz-12 fw-600">Logout</span>                       
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Navbar Bottom -->
        <?php include "partials/navBottom.php" ;?>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass('show1');
            $('nav ul .feat-show').removeClass('show');
        });
        $('.mainMenu').click(function() {
            $('nav ul .feat-show').removeClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('nav ul li').click(function() {
            $(this).addClass('activeMenuSide').siblings.removeClass('activeMenuSide');
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