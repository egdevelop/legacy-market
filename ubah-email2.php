<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Ubah Email</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "partials/navbar.php" ?>

        <!-- Flash Sale -->
        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-2 left bg-white borad-10 p-4">
                        <div class="d-flex gap-2">
                            <div class="profile">
                                <img src="<?= ($_SESSION['picture']) ?  $_SESSION['picture'] : "assets/img/profile.jpg" ?>" alt="" class="profileImg">
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fz-12 fw-bold">Naufal</span>
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="abu"><i class="ri-edit-2-fill"></i></span>
                                    <span class="fz-10 fw-600 abu">Ubah profil</span>
                                </div>
                            </div>
                        </div>
                        <div class="container-menu mt-4">
                            <nav>
                                <ul class="menu">
                                    <li class="fz-12">
                                        <a onclick="location.href = 'profilDetail.php';"
                                            class="cursor-pointer feat-btn activeMenu">
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
                    <div class="col-9 right bg-white borad-10 p-4">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h6 class="fw-600">Ubah Email</h6>
                                <p class="fz-14 abu">Silahkan masukkan Email baru anda</p>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <div class="col-8 left">
                                <div class="row align-items-center my-3">
                                    <div class="col-4">
                                        <label for="sandi" class="fz-12 col-form-label">Masukkan Email Baru</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="sandi" class="form-control fz-12">
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-4">
                                        <label for="emailConfirm" class="fz-12 col-form-label">Konfirmasi Email</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="emailConfirm" class="form-control fz-12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        <a href="#" class="btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto">Ganti
                                            Email</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
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