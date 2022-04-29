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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Member</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "components/navbar.php" ?>

        <!-- Flash Sale -->
        <section style="margin-top: 7rem;" class="py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-2 left bg-white borad-10 p-4">
                        <div class="d-flex gap-2">
                            <div class="profile">
                                <img src="<?= ($_SESSION['picture']) ?  $_SESSION['picture'] : "assets/img/profile.jpg" ?>" alt="" class="profileImg">
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fz-12 fw-bold"><?= ($_SESSION['name']) ?  $_SESSION['name'] : "Naufal" ?></span>
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
                                        <a onclick="location.href = 'profilDetail.php';" class="cursor-pointer feat-btn activeMenu">
                                            <span class="blue"><i class="ri-user-line"></i></span>
                                            <span>Akun saya</span>
                                        </a>
                                        <ul class="feat-show show">
                                            <li><a href="profilDetail.php">Profil</a></li>
                                            <li><a href="alamat.php">Alamat</a></li>
                                            <li><a href="ubah-sandi.php">Ubah sandi</a></li>
                                            <li><a href="member.php" class="activeSubmenu">Member</a></li>
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
                    <div class="col-9 d-flex flex-column">
                        <div class="right bg-white borad-10 p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="left">
                                    <h6 class="fw-600">Member</h6>
                                    <p class="fz-14 abu">Daftar member dan dapatkan benefitnya</p>
                                </div>
                                <div class="right">
                                    <span class="fz-13 fw-600 px-3 py-2 text-dark d-flex align-items-center">Member
                                        Active : -</span>
                                    <!-- <span class="fz-13 fw-600 px-3 py-2 text-dark d-flex align-items-center">Member
                                        Active : 2 Bulan</span> -->
                                </div>
                            </div>
                            <hr class="my-2 py-0">
                            <div class="row d-flex gap-2 d-flex justify-content-between">
                                <div class="col-12 left">
                                    <div class="d-flex align-items-start justify-content-between my-3">
                                        <div class="left">
                                            <span class="fz-14 fw-600">Anda belum terdaftar member</span>
                                        </div>
                                        <div class="right text-end">
                                            <a href="daftar.php" class="btnMember borad-10 px-3 py-2 me-3 fz-12">Daftar
                                                Member
                                                Sekarang</a>
                                        </div>
                                    </div>

                                    <!-- Member Active -->
                                    <!-- <div class="cursor-pointer d-flex justify-content-between px-3 py-2 my-2 bg-blue">
                                        <div class="left">
                                            <span class="fz-12 text-light fw-600">2 Bulan</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-12 text-light fw-600">Rp200.000</span>
                                        </div>
                                    </div>
                                    <span class="fz-12 fw-600">Berakhir : 1 Bulan 23 Hari lagi</span>

                                    <form class="d-flex mt-5 pt-5">
                                        <input class="form-control me-2" type="text">
                                        <span
                                            class="fz-20 text-light bg-blue px-3 d-flex align-items-center justify-content-center">
                                            <i class="ri-file-copy-fill"></i>
                                        </span>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                        <div class="right bg-white borad-10 p-4 mt-3">
                            <h6 class="fw-600">Paket Member</h6>
                            <p class="fz-14 abu">Klik tombol daftar untuk menjadi member</p>
                            <div class="mt-2">
                                <div class="d-flex flex-column">
                                    <div class="cursor-pointer d-flex justify-content-between px-3 py-2 my-2 bg-blue">
                                        <div class="left">
                                            <span class="fz-12 text-light fw-600">2 Bulan</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-12 text-light fw-600">Rp200.000</span>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer d-flex justify-content-between px-3 py-2 my-2 bg-yellow">
                                        <div class="left">
                                            <span class="fz-12 text-light fw-600">3 Bulan</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-12 text-light fw-600">Rp450.000</span>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer d-flex justify-content-between px-3 py-2 my-2 bg-orange">
                                        <div class="left">
                                            <span class="fz-12 text-light fw-600">Tahunan</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-12 text-light fw-600">Rp600.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member Active -->
                        <!-- <div class="right bg-white borad-10 p-4 mt-3">
                            <h6 class="fw-500">Teman yang telah diundang</h6>
                            <hr class="my-3 py-0">
                            <div class="content"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d005399.js"></script>
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