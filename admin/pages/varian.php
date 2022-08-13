<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
};
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
    header('Location: /');
};

$product = getProductDetails($_GET['id']);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include "../partials/meta.php"; ?>
    <title>Varian | Joco</title>
    <?php include "../partials/head.php"; ?>
</head>

<body>
    <?php include "../partials/loader.php"; ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include "../partials/header.php"; ?>
        <?php include "../partials/sidebar.php"; ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/admin/pages/" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Varian</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                                <h4 class="card-title">Daftar Varian</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload">Tambah Varian</button>
                                <!-- Modal Upload Produk -->
                                <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Varian</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/server/process/addVariant.php" method="post" id="form" enctype="multipart/form-data">
                                            <input type="text" name="id" id="id" value="<?= $_GET['id'] ?>" hidden>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Varian</label>
                                                <input type="text" class="form-control" name="nama_produk" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga Varian</label>
                                                <input type="text" class="form-control" name="harga_produk" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga Grosir</label>
                                                <input type="text" class="form-control" name="harga_grosir" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Gambar Varian</label>
                                                <input type="file" class="form-control" name="gambar_produk" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Stok</label>
                                                <input type="text" class="form-control" name="stok" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" onclick="document.getElementById('form').submit()" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row m-t-20">
                                    <div class="col-12 col-md-3 font-bold">Nama Produk :</div>
                                    <div class="col-12 col-md-5"><?= $product['name'] ?></div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-12 col-md-3 font-bold">Nama Varian :</div>
                                    <div class="col-12 col-md-5">
                                        <ul>
                                            <?php $a = 1; foreach($product['variants'] as $v) : ?>
                                            <li class="row align-items-center">
                                                <div class="py-2 col-4">
                                                    <span><?= $v['name'] ?></span>
                                                </div>
                                                <div class="py-2 col-3">
                                                    <a href="/server/process/deleteVariant.php?id=<?= $v['id'] ?>" id="<?= ($a == 1) ? "first" : "a" . $a ?>" style="text-decoration: none; color: red;">Hapus</a>
                                                </div> 
                                                <div class="py-2 col-3">
                                                    <button type="button" class="btn btn-outline-warning edit" data-bs-toggle="modal" data-bs-target="#edit"data-id=<?= $v['id'] ?>>Edit</button>
                                                </div>
                                            </li>
                                            <?php $a++; endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edut Variant -->
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Varian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/server/process/editVariant.php" method="post" id="form2" enctype="multipart/form-data">
                            <div class="asd">

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" onclick="document.getElementById('form2').submit()" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                </div>
                </div>
            <footer class="footer text-center">
                All Rights Reserved by Flexy Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <?php include '../partials/foot.php'; ?>
    <script>
        var $count = <?= count($product['variants']) ?>;
        if($count == 1) {
            document.getElementById('first').href = "javascript: void(0)";
        }

        $('.edit').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/server/ajax/editVarian.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.asd').html(data);
                    $('.gambar').on('change', function() {
                        $('#trigger').val('1');
                    })
                }
            });
        });
    </script>
</body>

</html>