<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
};
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
    header('Location: /');
};

$sql = "SELECT * FROM `orders` ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
$no = 1;
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include "../partials/meta.php"; ?>
    <title>List Order | Joco</title>
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
                                <li class="breadcrumb-item active" aria-current="page">List Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <h4 class="card-title">List Order</h4>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Tanggal & Waktu</th>
                                            <th scope="col">Opsi Pengiriman</th>
                                            <th class="col">Kode</th>
                                            <th class="col">Metode</th>
                                            <th class="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($orders as $order) { 
                                        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$order[id_user]'"));
                                        $status = $order['status'];
                                        if($status == 0) {
                                            $info = "Belum Dibayar";
                                        } elseif($status == 1) {
                                            $info = "Sudah Bayar | <a href='javascript:void(0)' id='selesai' data-id='$order[id]' data-status='2'>Tandai Dikirim</a>";
                                        } elseif($status == 2) {
                                            $info = "Dikirim";
                                        } elseif($status == 3) {
                                            $info = "Selesai";
                                        } else {
                                            $info = "Dibatalkan";
                                        }
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $order['date_order'] ?></td>
                                            <td><?= $order['courier_package'] ?></td>
                                            <td><?= $order['reference'] ?></td>
                                            <td><?= $order['method'] ?></td>
                                            <td>
                                                <?= $info ?>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
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
                    <form action="/server/process/addProduct.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="text" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/server/process/addProduct.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="text" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../partials/foot.php'; ?>
    <script>
        $('#selesai').on('click', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url: '/server/ajax/updateOrder.php',
                type: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                }
            });
        })
    </script>
</body>

</html>