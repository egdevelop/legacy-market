<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
session_start();
$a = new rajaongkir();
$kota = $a->get_city();
$kota_array = json_decode($kota, true);
if ($kota_array['rajaongkir']['status']['code'] == 200) :
  $kota_result  = $kota_array['rajaongkir']['results'];
else :
  die('This key has reached the daily limit.');
endif;

$provinces = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
$districts = mysqli_query($conn, "SELECT * FROM districts ORDER BY name ASC");
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    
    <title>Alamat Saya</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Alamat Saya</span>
                </a>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Alamat -->
        <section class="mt-profile py-2 py-sm-4 px-0 px-sm-4 mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <?php include "partials/sidebarProfil.php" ?>
                    <div class="col-12 col-lg-9 right bg-white borad-10 px-3 py-1 p-lg-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="left d-none d-lg-block">
                                <h6 class="fw-600">Alamat Saya</h6>
                                <p class="fz-14 abu">Pastikan benar , untuk memudahkan dalam proses pengiriman</p>
                            </div>
                            <div class="right d-none d-lg-block">
                                <button data-bs-toggle="modal" data-bs-target="#tambahAlamat" class="fz-12 btn bg-blue px-3 py-2 text-light d-flex align-items-center">
                                    <span><i class="ri-add-line"></i></span>
                                    <span>Tambah Alamat Baru</span>
                                </button>
                            </div>
                        </div>
                        <?php
                        $data = mysqli_query($conn , "SELECT * FROM address WHERE user_id = '$_SESSION[userid]'");
                            while($r = mysqli_fetch_array($data)){
                        ?>
                        <hr class="my-2 py-0 d-none d-lg-block">
                        <!-- <a href="ubahAlamat.php" class="row d-flex gap-2 d-flex justify-content-between"> -->
                            <div class="col-12 left">
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3 d-none d-lg-block">
                                        <span class="fz-12">Nama Lengkap</span>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <span class="fz-12 fw-600 me-1"><?= $r['name'] ?></span>
                                        <?php
                                            if($r['isPrimary'] == "1") echo '<span style="font-weight: 500;" class="badge bg-orange">Utama</span>'
                                        ?>
                                    </div>
                                    <div class="col-2 text-end d-none d-lg-block">
                                        <a href="javascript: void(0)" data-id="<?= $r['id'] ?>" class="me-3 fz-12 text-dark text-decoration-underline ubah" data-bs-toggle="modal" data-bs-target="#ubahAlamat">Ubah</a>
                                        <?php
                                            if($r['isPrimary'] != "1") :
                                        ?>
                                        <a href="server/process/removeAddress.php?id=<?= $r['id'] ?>" onclick="return confirm('Hapus Alamat?')" class="me-3 fz-12 text-danger text-decoration-underline">Hapus</a>
                                        <?php
                                            endif;
                                        ?>
                                    </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3 d-none d-lg-block">
                                        <span class="fz-12">Telepon</span>
                                    </div>
                                    <div class="col-7">
                                        <span class="fz-12 fw-500 me-1"><?= $r['no'] ?></span>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-start my-3">
                                    <div class="col-3 d-none d-lg-block">
                                        <span class="fz-12">Alamat</span>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <span class="fz-12 fw-500 me-1"><?= $r['detail'] ?>, <br>
                                        <?= $r['province'] ?>, <?= $r['city'] ?>, <?= $r['district'] ?>,  <?= $r['code'] ?></span>
                                    </div>
                                        <?php
                                            if($r['isPrimary'] != "1"){
                                        ?>
                                    <div class="col-3 text-end d-none d-lg-block">
                                        <a href="server/process/changePrimary.php?id=<?= $r['id'] ?>" class="fz-12 btn btnAlamat">Atur sebagai utama</a>
                                    </div>
                                        <?php
                                            }
                                        ?>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a data-bs-toggle="modal" data-bs-target="#ubahAlamat" class="fz-12 text-dark d-block d-lg-none">Ubah</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <a data-bs-toggle="modal" data-bs-target="#tambahAlamat" class="text-dark bg-white col-12 d-block d-lg-none mt-3 py-2 d-flex justify-content-between align-items-center">
                    <span class="fz-12 fw-600">Tambah Alamat Baru</span>
                    <i class="ri-add-line"></i>
                </a>
            </div>
        </section>

        <!-- Modal Ubah Alamat -->
        <div class="modal fade" id="ubahAlamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="server/process/editAddress.php" method="post">
                <div class="modal-content">
                    <div class="modal-header" style="border:none">
                        <h5 class="modal-title fz-13" id="staticBackdropLabel">Ubah Alamat
                        </h5>
                        <span class="blue fz-18"><i class="ri-map-pin-fill"></i></span>
                    </div>
                    <div class="modal-body ajaxr">
                        
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti
                            saja</button>
                        <button type="submit" class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        <!-- Modal Tambah Alamat -->
        <div class="modal fade" id="tambahAlamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" style="border:none">
                        <h5 class="modal-title fz-13" id="staticBackdropLabel">Tambah Alamat
                        </h5>
                        <span class="blue fz-18"><i class="ri-map-pin-fill"></i></span>
                        <form action="server/process/addAddress.php" method="post">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 fz-12">
                                    <label for="name" class="form-label abu fw-500">Nama
                                        Lengkap</label>
                                    <input type="text" class="fz-12 form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 fz-12">
                                    <label for="telp" class="form-label abu fw-500">Nomor
                                        Telepon</label>
                                    <input type="text" class="fz-12 form-control" id="telp" name="nohp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 fz-12">
                                    <label for="tempat" class="form-label abu fw-500">Provinsi,
                                        Kota,
                                        Kecamatan, Kode Pos</label>
                                        <select name="province" id="search" required="true">
                                            <option value=""></option>
                                            <?php while($p = mysqli_fetch_assoc($provinces)) : ?>
                                            <option value="<?= $p['name']; ?>"><?= $p['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <select name="city_id" id="search2" required="true" onchange="fillCity(this.innerText)">
                                            <option value=""></option>
                                            <?php foreach ($kota_result as $key => $value) : ?>
                                            <option value="<?= $value['city_id']; ?>"><?= $value['city_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select name="district" id="search3" required="true">
                                            <option value=""></option>
                                            <?php while($k = mysqli_fetch_assoc($districts)) : ?>
                                            <option value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <input type="text" class="fz-12 form-control" name="postcode" id="kode" placeholder="Kode Pos">
                                        <input type="text" name="city" id="city" value="" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 fz-12">
                                    <label for="jalan" class="form-label abu fw-500">Nama
                                        Jalan.
                                        Gedung. No. Rumah</label>
                                    <textarea type="text" class="fz-12 form-control" id="jalan" name="detail"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti saja</button>
                        <button type="submit" class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    
    <!-- Foot -->
    <?php include 'components/foot.php'; ?>
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

        $(document).ready(function(){
            $('#search').selectize({
                sortField: 'text'
            });
            $('#search2').selectize({
                sortField: 'text'
            });
            $('#search3').selectize({
                sortField: 'text'
            });
        });

        $('.ubah').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: "server/ajax/oldAddress.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('.ajaxr').html(data);
                    $('#search4').selectize({
                        sortField: 'text'
                    });
                    $('#search5').selectize({
                        sortField: 'text'
                    });
                    $('#search6').selectize({
                        sortField: 'text'
                    });
                    $('#search5').change(function() {
                        document.getElementById('nama').value = this.innerText;
                    })
                }
            });
        });

        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }

        function fillCity(data) {
            document.getElementById('city').value = data;
        }

    </script>
</body>

</html>