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

    <title>Alamat Saya</title>
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
                    <div class="col-9 right bg-white borad-10 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="left">
                                <h6 class="fw-600">Alamat Saya</h6>
                                <p class="fz-14 abu">Pastikan benar , untuk memudahkan dalam proses pengiriman</p>
                            </div>
                            <div class="right">
                                <button class="fz-12 btn bg-blue px-3 py-2 text-light d-flex align-items-center">
                                    <span><i class="ri-add-line"></i></span>
                                    <span>Tambah Alamat Baru</span>
                                </button>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <div class="col-12 left">
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nama Lengkap</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-600 me-1">Mochammad Naufal</span>
                                        <span style="font-weight: 500;" class="badge bg-orange">Utama</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a type="button" class="me-3 fz-12 text-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#ubahAlamat">Ubah</a>
                                    </div>
                                    <!-- Modal Ubah Alamat -->
                                    <div class="modal fade" id="ubahAlamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header" style="border:none">
                                                    <h5 class="modal-title fz-13" id="staticBackdropLabel">Ubah Alamat
                                                    </h5>
                                                    <span class="blue fz-18"><i class="ri-map-pin-fill"></i></span>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3 fz-12">
                                                                <label for="name" class="form-label abu fw-500">Nama
                                                                    Lengkap</label>
                                                                <input type="text" class="fz-12 form-control" id="name" aria-describedby="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3 fz-12">
                                                                <label for="telp" class="form-label abu fw-500">Nomor
                                                                    Telepon</label>
                                                                <input type="text" class="fz-12 form-control" id="telp" aria-describedby="telp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3 fz-12">
                                                                <label for="tempat" class="form-label abu fw-500">Provinsi,
                                                                    Kota,
                                                                    Kecamatan, Kode Pos</label>
                                                                <input type="text" class="fz-12 form-control" id="tempat" aria-describedby="tempat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3 fz-12">
                                                                <label for="jalan" class="form-label abu fw-500">Nama
                                                                    Jalan.
                                                                    Gedung. No. Rumah</label>
                                                                <input type="text" class="fz-12 form-control" id="jalan" aria-describedby="jalan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="border:none">
                                                    <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti
                                                        saja</button>
                                                    <button type="button" class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Telepon</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-500 me-1">(+62)0-21-315-1252</span>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Alamat</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fz-12 fw-500 me-1">Jl RS Fatmawati 15 Golden Plaza Bl G/26 Lt 2,
                                            Dki Jakarta Dki
                                            Jakarta,Jakarta,10430</span>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button href="#" class="fz-12 btn btnAlamat activeBtnAlamat">Atur sebagai
                                            utama</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <div class="col-12 left">
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nama Lengkap</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-600 me-1">Mochammad Naufal</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a type="button" class="me-3 fz-12 text-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#ubahAlamat">Ubah</a>
                                        <a href="#" class="fz-12 text-dark text-decoration-underline">Hapus</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Telepon</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-500 me-1">(+62)0-21-315-1252</span>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Alamat</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fz-12 fw-500 me-1">Jl RS Fatmawati 15 Golden Plaza Bl G/26 Lt 2,
                                            Dki Jakarta Dki
                                            Jakarta,Jakarta,10430</span>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button href="#" class="fz-12 btn btnAlamat">Atur sebagai
                                            utama</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <div class="col-12 left">
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Nama Lengkap</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-600 me-1">Mochammad Naufal</span>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a type="button" class="me-3 fz-12 text-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#ubahAlamat">Ubah</a>
                                        <a href="#" class="fz-12 text-dark text-decoration-underline">Hapus</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Telepon</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-500 me-1">(+62)0-21-315-1252</span>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3">
                                        <span class="fz-12">Alamat</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="fz-12 fw-500 me-1">Jl RS Fatmawati 15 Golden Plaza Bl G/26 Lt 2,
                                            Dki Jakarta Dki
                                            Jakarta,Jakarta,10430</span>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button href="#" class="fz-12 btn btnAlamat">Atur sebagai
                                            utama</button>
                                    </div>
                                </div>
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