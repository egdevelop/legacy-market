<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!$_SESSION['userid']){
    header('Location: login.php');
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Ubah Profil</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container d-flex align-items-center justify-content-between">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Ubah Profil</span>
                </a>
                <div class="blue" onclick="window.location = 'profilDetail.php'">
                    <i class="ri-check-line"></i>
                </div>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Ubah Profil -->
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
                                <!-- <div class="d-flex gap-2 align-items-center">
                                    <span class="abu"><i class="ri-edit-2-fill"></i></span>
                                    <span class="fz-10 fw-600 abu">Ubah profil</span>
                                </div> -->
                            </div>
                        </div>
                        <div class="container-menu mt-4">
                            <nav>
                                <ul class="menu">
                                    <li class="fz-12">
                                        <a onclick="location.href = 'profilDetail.php';" class="cursor-pointer feat-btn activeMenu">
                                            <span class="blue"><i class="ri-user-line"></i></span>
                                            <span>Akun saya</span>
                                        </a>
                                        <ul class="feat-show show">
                                            <li><a href="profilDetail.php" class="activeSubmenu">Profil</a></li>
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
                                        <a href="notifikasi.php" class="mainMenu">
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
                    <div class="col-12 col-lg-9 right bg-white borad-10 p-4">
                        <div class="row gap-2 d-flex justify-content-center justify-content-md-between">
                            <form class="d-flex flex-column-reverse flex-lg-row justify-content-center align-items-start" action="server/process/updateProfile.php" method="post">
                            <div class="col-8 left d-none d-lg-block">
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Username</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-600"><?= ($data['name']) ?  $data['name'] : "Naufal" ?></span>
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
                                        <span class="fz-12 fw-500"><?= ($data['email']) ?  censoredEmail($data['email']) : "123****ail@gmail.com" ?></span>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nomor Telepon</span>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="nohp" id="nohp" style="display: none;">
                                        <span class="fz-12 fw-500" id="a">***********12</span>
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
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-block d-lg-none bg-white py-3 mt-3">
                        <a href="ubahNama.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Nama<span> 
                            </div>                     
                            <div class="text-dark d-flex align-items-center">
                                <span class="fz-12"><?= $data['name'] ?></span>
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Email<span> 
                            </div>                     
                            <div class="text-dark d-flex align-items-center">
                                <span class="fz-12"><?= $data['email'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-block d-lg-none bg-white py-3 mt-3">
                        <!-- <a href="#" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Jenis Kelamin<span> 
                            </div>                     
                            <div class="text-dark d-flex align-items-center">
                                <span class="fz-12">Pria</span>
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0">
                        <a href="ubahTglLahir.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Tanggal Lahir<span> 
                            </div>                     
                            <div class="text-dark d-flex align-items-center">
                                <span class="fz-12">29-09-2003</span>
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                        <hr class="my-2 py-0"> -->
                        <a href="ubahNomor.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Nomor Telepon<span> 
                            </div>                     
                            <div class="text-dark d-flex align-items-center">
                                <span class="fz-12"><?= $data['no_hp'] ?></span>
                                <i class="text-dark ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="d-block d-lg-none bg-white py-3 mt-3 mb-4">
                        <a href="ubahSandi.php" class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-dark fz-12 fw-600">Ubah Sandi<span> 
                            </div>                     
                            <div class="text-dark">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                        </a>
                    </div> -->
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