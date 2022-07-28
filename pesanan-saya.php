<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
$query = mysqli_query($conn, "SELECT * FROM orders WHERE id_user = '$_SESSION[userid]' ORDER BY date_order DESC");
$status0 = false;
$status1 = false;
$status2 = false;
$status3 = false;
$status4 = false;
while($order = mysqli_fetch_assoc($query)){
    if($order['status'] == '0') {
        $status0[] = $order;
    }
    if($order['status'] == 1) {
        $status1[] = $order;
    }
    if($order['status'] == 2) {
        $status2[] = $order;
    }
    if($order['status'] == 3) {
        $status3[] = $order;
    }
    if($order['status'] == 4) {
        $status4[] = $order;
    }
    $orders[] = $order;
}
if($orders == null) {
    $kosong = true;
}
if($status0 == null) {
    $kosong0 = true;
}
if($status1 == null) {
    $kosong1 = true;
}
if($status2 == null) {
    $kosong2 = true;
}
if($status3 == null) {
    $kosong3 = true;
}
if($status4 == null) {
    $kosong4 = true;
}
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Pesanan Saya</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "partials/navbarAkun.php" ?>

        <!-- Flash Sale -->
        <section class="py-2 py-sm-4 px-0 px-sm-4 mtProfil mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <?php include "partials/sidebar2.php" ?>
                    <div class="col-12 col-lg-9 right bg-white p-4">
                        <div class="bg-white">
                            <ul onclick="myFunction(event)" id='nav-tab' class="nav d-flex flex-nowrap justify-content-start justify-content-lg-between gap-2 gap-lg-3 overflowPesanan" role="tablist">
                                <li class="nav-item fz-14 fw-600 px-0 px-lg-3" role="presentation">
                                    <button class="nav-link-custom activePesanan" id="act Semua" data-bs-toggle="tab" data-bs-target="#Semua" type="button" role="tab" aria-controls="Semua" aria-selected="true">Semua</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-0 px-lg-3" role="presentation">
                                    <button class="nav-link-custom" id="act BelumBayar" data-bs-toggle="tab" data-bs-target="#BelumBayar" type="button" role="tab" aria-controls="BelumBayar" aria-selected="false">Belum&nbsp;Bayar</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-0 px-lg-3" role="presentation">
                                    <button class="nav-link-custom" id="act Dikirim" data-bs-toggle="tab" data-bs-target="#Dikirim" type="button" role="tab" aria-controls="Dikirim" aria-selected="false">Dikirim</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-0 px-lg-3" role="presentation">
                                    <button class="nav-link-custom" id="act Selesai" data-bs-toggle="tab" data-bs-target="#Selesai" type="button" role="tab" aria-controls="Selesai" aria-selected="false">Selesai</button>
                                </li>
                                <span style="color: rgba(196, 196, 196, 0.3);">|</span>
                                <li class="nav-item fz-14 fw-600 px-0 px-lg-3" role="presentation">
                                    <button class="nav-link-custom" id="act Dibatalkan" data-bs-toggle="tab" data-bs-target="#Dibatalkan" type="button" role="tab" aria-controls="Dibatalkan" aria-selected="false">Dibatalkan</button>
                                </li>
                            </ul>
                        </div>
                        <!-- <input style="border-radius: 10px;" class="custom bg-white mt-3 d-none d-lg-flex gap-3 align-items-center justify-content-center nosubmit z-1 form-control" type="search" placeholder="Cari berdasarkan Nama Penjual, No. Pesanan atau Nama Produk dalam semua pesanan" aria-label="Search"> -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Semua" role="tabpanel" aria-labelledby="Semua">
                                <?php 
                                    if(!isset($kosong)) {
                                        foreach($orders as $o) {
                                            $idVs = explode(',', $o['id_variant']);
                                            $qty = explode(',', $o['qty']);
                                            $a = 0;
                                            $products = [];
                                            foreach($idVs as $idV) {
                                            $products[$a] = getProductByVariant($idV);
                                            $products[$a]['qty'] = $qty[$a];
                                            $a++;
                                            }
                                ?>
                                <div class="bg-white borad-10 p-lg-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="left">
                                            <!-- <span class="fz-13 fw-600">Eceran</span> -->
                                        </div>
                                        <div class="right">
                                            <?php if($o['status'] == 0) {?>
                                                <span class="fz-12 orange">Menunggu Pembayaran</span>
                                            <?php } elseif ($o['status'] == 1) {?>
                                                <span class="fz-12 orange">Menunggu Konfirmasi</span>
                                            <?php } elseif ($o['status'] == 2) {?>
                                                <span class="fz-12 orange">Dikirim</span>
                                            <?php } elseif ($o['status'] == 3) {?>
                                                <span class="fz-12 orange">Selesai</span>
                                            <?php } elseif ($o['status'] == 4) {?>
                                                <span class="fz-12 orange">Dibatalkan</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr class="my-3 py-0">
                                    <?php foreach($products as $p) { ?>
                                    <div class="d-flex align-items-center justify-content-between m-1">
                                        <div class="left d-flex gap-2">
                                            <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12" style="width: 80%;">
                                                    <?= $p['name'] ?>
                                                </span>
                                                <span class="fz-11 fw-bold">x<?= $p['qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="fz-11 fw-600 orange">Rp. <?= $p['price'] * $p['qty'] ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-3 py-0">
                                    <div class="d-flex justify-content-start justify-content-lg-end mt-3 gap-3">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Total Pesanan :</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-14 fw-bold orange">Rp. <?= $o['amount'] ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-block d-lg-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Produk dipesan <?= $o['date_order'] ?></span>
                                        </div>
                                        <div class="right mt-2">
                                        <?php if($o['status'] == 3) { ?>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light" onclick="window.location = 'penilaian.php?id=' + <?= $o['id'] ?>">Beri
                                                Penilaian</button>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light ms-2" onclick="window.location = 'index.php'">Beli
                                                Lagi</button>
                                        <?php } elseif($o['status'] == 2) { ?>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light selesai"  onclick="selesaiOrder('<?= $o['id'] ?>')" id="selesai">Konfirmasi Selesai</button>
                                        <?php } elseif($o['status'] == 0) { ?>
                                            <button class="btn-danger border-0 borad-7 px-3 fz-12 py-2 text-light batal"  onclick="batalOrder('<?= $o['id'] ?>')" id="batal">Batalkan Pesanan</button>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light ms-2">Lihat Kode Pembayaran</button>
                                        <?php } ?>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }}
                                ?>
                            </div>
                            <div class="tab-pane fade" id="BelumBayar" role="tabpanel" aria-labelledby="BelumBayar">
                                <?php
                                    if(!isset($kosong0)) {
                                        foreach($status0 as $s0) {
                                            $idVs = explode(',', $s0['id_variant']);
                                            $qty = explode(',', $s0['qty']);
                                            $a = 0;
                                            $products = [];
                                            foreach($idVs as $idV) {
                                            $products[$a] = getProductByVariant($idV);
                                            $products[$a]['qty'] = $qty[$a];
                                            $a++;
                                            }
                                ?>
                                <div class="bg-white mt-lg-3 borad-10 p-lg-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="left">
                                            <!-- <span class="fz-13 fw-600">Eceran</span> -->
                                        </div>
                                        <div class="right">
                                            <span class="fz-12 orange">Belum Bayar</span>
                                        </div>
                                    </div>
                                    <hr class="my-3 py-0">
                                    <?php foreach($products as $p) { ?>
                                    <div class="d-flex align-items-center justify-content-between m-1">
                                        <div class="left d-flex gap-2">
                                            <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12" style="width: 80%;">
                                                    <?= $p['name'] ?>
                                                </span>
                                                <span class="fz-11 fw-bold">x<?= $p['qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="fz-11 fw-600 orange">Rp. <?= $p['price'] * $p['qty'] ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-3 py-0">
                                    <div class="d-flex justify-content-start justify-content-lg-end mt-3 gap-3">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Total Pesanan :</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-14 fw-bold orange">Rp. <?= $s0['amount'] ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-block d-lg-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Produk dipesan <?= $s0['date_order'] ?></span>
                                        </div>
                                        <div class="right mt-2">
                                            <button class="btn-danger border-0 borad-7 px-3 fz-12 py-2 text-light batal" id="batal" onclick="batalOrder('<?= $s0['id'] ?>')">Batalkan Pesanan</button>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light ms-2">Lihat Kode Pembayaran</button>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }} else {
                                        echo $kosong0;
                                    }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="Dikirim" role="tabpanel" aria-labelledby="Dikirim">
                                <?php 
                                    if(!isset($kosong2)) {
                                        foreach($status2 as $s2) {
                                            $idVs = explode(',', $s2['id_variant']);
                                            $qty = explode(',', $s2['qty']);
                                            $a = 0;
                                            $products = [];
                                            foreach($idVs as $idV) {
                                            $products[$a] = getProductByVariant($idV);
                                            $products[$a]['qty'] = $qty[$a];
                                            $a++;
                                            }
                                ?>
                                <div class="bg-white mt-lg-3 borad-10 p-lg-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="left">
                                            <!-- <span class="fz-13 fw-600">Eceran</span> -->
                                        </div>
                                        <div class="right">
                                                <span class="fz-12 orange">Dikirim</span>
                                        </div>
                                    </div>
                                    <hr class="my-3 py-0">
                                    <?php foreach($products as $p) { ?>
                                    <div class="d-flex align-items-center justify-content-between m-1">
                                        <div class="left d-flex gap-2">
                                            <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12" style="width: 80%;">
                                                    <?= $p['name'] ?>
                                                </span>
                                                <span class="fz-11 fw-bold">x<?= $p['qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="fz-11 fw-600 orange">Rp. <?= $p['price'] * $p['qty'] ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-3 py-0">
                                    <div class="d-flex justify-content-start justify-content-lg-end mt-3 gap-3">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Total Pesanan :</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-14 fw-bold orange">Rp. <?= $s2['amount'] ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-block d-lg-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Produk dipesan <?= $s2['date_order'] ?></span>
                                        </div>
                                        <div class="right mt-2">
                                        <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light selesai" id="selesai" onclick="selesaiOrder('<?= $s2['id'] ?>')">Konfirmasi Selesai</button>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }} else {
                                        echo $kosong2;
                                    }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="Selesai" role="tabpanel" aria-labelledby="Selesai">
                                <?php 
                                    if(!isset($kosong3)) {
                                        foreach($status3 as $s3) {
                                            $idVs = explode(',', $s3['id_variant']);
                                            $qty = explode(',', $s3['qty']);
                                            $a = 0;
                                            $products = [];
                                            foreach($idVs as $idV) {
                                            $products[$a] = getProductByVariant($idV);
                                            $products[$a]['qty'] = $qty[$a];
                                            $a++;
                                            }
                                ?>
                                <div class="bg-white mt-lg-3 borad-10 p-lg-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="left">
                                            <!-- <span class="fz-13 fw-600">Eceran</span> -->
                                        </div>
                                        <div class="right">
                                                <span class="fz-12 orange">Selesai</span>
                                        </div>
                                    </div>
                                    <hr class="my-3 py-0">
                                    <?php foreach($products as $p) { ?>
                                    <div class="d-flex align-items-center justify-content-between m-1">
                                        <div class="left d-flex gap-2">
                                            <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12" style="width: 80%;">
                                                    <?= $p['name'] ?>
                                                </span>
                                                <span class="fz-11 fw-bold">x<?= $p['qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="fz-11 fw-600 orange">Rp. <?= $p['price'] * $p['qty'] ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-3 py-0">
                                    <div class="d-flex justify-content-start justify-content-lg-end mt-3 gap-3">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Total Pesanan :</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-14 fw-bold orange">Rp. <?= $s3['amount'] ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-block d-lg-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Produk dipesan <?= $s3['date_order'] ?></span>
                                        </div>
                                        <div class="right mt-2">
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light" onclick="window.location = 'penilaian.php?id=' + <?= $o['id'] ?>">Beri
                                                Penilaian</button>
                                            <button class="btn-blue borad-7 px-3 fz-12 py-2 text-light ms-2" onclick="window.location = 'index.php'">Beli
                                                Lagi</button>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }} else {
                                        echo $kosong3;
                                    }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="Dibatalkan" role="tabpanel" aria-labelledby="Dibatalkan">
                                <?php
                                    if(!isset($kosong4)) {
                                        foreach($status4 as $s4) {
                                            $idVs = explode(",", $s4['id_variant']);
                                            $qty = explode(",", $s4['qty']);
                                            $a = 0;
                                            $products = [];
                                            foreach($idVs as $idV) {
                                                $products[$a] = getProductByVariant($idV);
                                                $products[$a]['qty'] = $qty[$a];
                                                $a++;
                                            }
                                ?>
                                <div class="bg-white mt-lg-3 borad-10 p-lg-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="left">
                                            <!-- <span class="fz-13 fw-600">Eceran</span> -->
                                        </div>
                                        <div class="right">
                                                <span class="fz-12 orange">Dibatalkan</span>
                                        </div>
                                    </div>
                                    <hr class="my-3 py-0">
                                    <?php foreach($products as $p) { ?>
                                    <div class="d-flex align-items-center justify-content-between m-1">
                                        <div class="left d-flex gap-2">
                                            <img src="assets/img/products1.jpg" alt="" class="productsImg">
                                            <div class="d-flex flex-column">
                                                <span class="fz-12" style="width: 80%;">
                                                    <?= $p['name'] ?>
                                                </span>
                                                <span class="fz-11 fw-bold">x<?= $p['qty'] ?></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <span class="fz-11 fw-600 orange">Rp. <?= $p['price'] * $p['qty'] ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-3 py-0">
                                    <div class="d-flex justify-content-start justify-content-lg-end mt-3 gap-3">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Total Pesanan :</span>
                                        </div>
                                        <div class="right">
                                            <span class="fz-14 fw-bold orange">Rp. <?= $s4['amount'] ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-block d-lg-flex align-items-center justify-content-between">
                                        <div class="left">
                                            <span class="fz-10 fw-500">Produk dipesan <?= $s4['date_order'] ?></span>
                                        </div>
                                        <div class="right mt-2">
                                            
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                        }
                                    } else {
                                        echo $kosong4;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php include 'partials/navBottom.php'; ?>
    </div>

    <!-- Foot -->
    <?php include 'components/foot.php';?>
    <script>
        function selesaiOrder(id) {
            $.ajax({
                url: 'server/ajax/changeStatus.php',
                type: 'POST',
                data: {
                    id: id,
                    type: 'selesai'
                },
                success: function(response) {
                    if(response == 'success') {
                        alert('Selesai');
                        location.reload();
                    }
                }
            });
        }

        function batalOrder(id) {
            $.ajax({
                url: 'server/ajax/changeStatus.php',
                type: 'POST',
                data: {
                    id: id,
                    type: 'batal'
                },
                success: function(response) {
                    if(response == 'success') {
                        alert('Batal');
                        location.reload();
                    }
                }
            });
        }

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