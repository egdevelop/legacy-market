<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $sql = "UPDATE users SET name = '$nama' WHERE id = '$_SESSION[userid]'";
    if(mysqli_query($conn, $sql)){
        header("Location: ubahProfil.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Ubah Nama</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container d-flex align-items-center justify-content-between">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Ubah Nama</span>
                </a>
                <div class="blue" onclick="document.getElementById('form').submit()">
                    <i class="ri-check-line"></i>
                </div>
            </div>
        </div>
        <?php include "partials/navbarAkun.php" ?>

        <!-- Ubah Nama -->
        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mb-5">
            <div class="container mb-4">
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
                                            <li><a href="profilDetail.php">Profil</a></li>
                                            <li><a href="alamat.php" class="activeSubmenu">Alamat</a></li>
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
                    <form action="" method="post" id="form">
                        <input name="nama" value="<?= $data['name'] ?>" type="text" class="tIndent my-1 fz-12 border-0 bg-white col-12 d-block d-lg-none py-2"/>
                    </form>
                    <span class="fz-12 my-2">Maks. 100 Karakter</span>
                </div>
            </div>
            <?php include "partials/navBottom.php"; ?>
        </section>
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