<?php
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
?>
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

    <title>Profile Detail</title>
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
                                <h6 class="fw-600">Profil Saya</h6>
                                <p class="fz-14 abu">Kelola informasi profil Anda untuk mengontrol, melindungi dan
                                    mengamankan akun</p>
                            </div>
                            <div class="right d-flex align-items-center gap-2">
                                <span class="fz-16"><img src="assets/img/google.svg" alt=""></span>
                                <span class="fz-10 fw-600">Telah masuk dengan google</span>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <div class="col-8 left">
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Username</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-600"><?= ($_SESSION['name']) ?  $_SESSION['name'] : "Naufal" ?></span>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <label for="name" class="fz-12 col-form-label">Name</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="name" id="name" class="form-control fz-12" value="">
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Email</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-500"><?= ($_SESSION['email']) ?  censoredEmail($_SESSION['email']) : "123****ail@gmail.com" ?></span>
                                        <a href="ubah-email.php" class="blue fz-12 text-decoration-underline">Ubah</a>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nomor Telepon</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="fz-12 fw-500">***********12</span>
                                        <a href="" class="blue fz-12 text-decoration-underline">Ubah</a>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Jenis Kelamin</span>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="laki-laki">
                                            <label class="form-check-label fz-12" for="inlineRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="perempuan">
                                            <label class="form-check-label fz-12" for="inlineRadio2">Perempuan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="lainnya">
                                            <label class="form-check-label fz-12" for="inlineRadio3">Lainnya</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Tanggal Lahir</span>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="tanggal">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option selected value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="bulan">
                                                    <option value="januari">Januari</option>
                                                    <option value="februari">Februari</option>
                                                    <option value="maret">Maret</option>
                                                    <option value="april">April</option>
                                                    <option value="mei">Mei</option>
                                                    <option value="juni">Juni</option>
                                                    <option value="juli">Juli</option>
                                                    <option value="agustus">Agustus</option>
                                                    <option value="september">September</option>
                                                    <option value="oktober">Oktober</option>
                                                    <option value="november">November</option>
                                                    <option selected value="desember">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="form-select fz-12" aria-label="Default select example" name="tahun">
                                                    <option selected value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 mt-3">
                                            <button class="btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 right d-flex flex-column align-items-center gap-3">
                                <div class="profileBig">
                                    <img src="<?= ($_SESSION['picture']) ?  $_SESSION['picture'] : "assets/img/profile.jpg" ?>" alt="" class="profileImgBig">
                                </div>
                                <button class="btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto">Pilih
                                    Gambar</button>
                                <span class="fz-12 abu">Ukuran Gambar : Maks 1 Mb</span>
                                <span class="fz-12 abu">Format File : JPEG, PNG</span>
                            </div>
                        </div>
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