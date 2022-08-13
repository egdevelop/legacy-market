<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$products = getAllProducts();
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
};
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
    header('Location: /');
};
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include "../partials/meta.php"; ?>
    <title>Produk | Joco</title>
    <?php include "../partials/head.php"; ?>
</head>

<body>
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
                                <li class="breadcrumb-item active" aria-current="page">Produk</li>
                            </ol>
                        </nav>
                        <!-- <h1 class="mb-0 fw-bold">Basic Table</h1> -->
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <h4 class="card-title">List Produk</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadProduk">Tambah Produk</button>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Deskripsi</th>
                                            <th class="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1; foreach($products as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $a ?></th>
                                            <td><?= $p['name'] ?></td>
                                            <td><?= $p['stock'] ?></td>
                                            <td><?= $p['desc'] ?></td>
                                            <td class="d-flex gap-2 align-items-center">
                                                <a href="varian.php?id=<?= $p['id'] ?>" class="text-light btn btn-success">Varian</a>
                                                <a type="button" id="edit" data-id="<?= $p['id'] ?>" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProduk" class="text-light btn btn-warning">Edit</a>
                                                <a href="/server/process/deleteProduct.php?id=<?= $p['id'] ?>" class="text-light btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $a++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Produk -->
    <div class="modal fade" id="uploadProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/server/process/addProduct.php" method="post" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="text" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea class="form-control" name="desc" id="exampleInputEmail1" aria-describedby="emailHelp"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="text" class="form-control" name="stok" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputVariant">Nama Varian</label>
                            <input type="text" class="form-control" name="varian" id="exampleInputVariant" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar Produk</label>
                            <input type="file" class="form-control" name="gambar" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="document.getElementById('form').submit()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/server/process/editProduct.php" id="form2" method="post" enctype="multipart/form-data">
                        <div class="asd">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea class="form-control" name="desc" id="exampleInputEmail1" aria-describedby="emailHelp"> </textarea>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok</label>
                                <input type="number" min="1" class="form-control" name="stok" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="document.getElementById('form2').submit()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../partials/foot.php'; ?>
    <script>
        $('#edit').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/server/ajax/editProduct.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.asd').html(data);
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>