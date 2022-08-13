<?php
require_once 'server/config/functions.php';
session_start();
if(!$_SESSION['userid']) {
    header('Location: login.php');
}
$carts = mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$_SESSION[userid]'");
$total = 0;
$count = 0;
$c = 0;
while($cart = mysqli_fetch_assoc($carts)){
    $data[$c] = getProductByVariant($cart['id_variant']);
    $data[$c]['id_cart'] = $cart['id'];
    $data[$c]['quantity'] = $cart['total'];
    $idcarts = $idcarts . ',' . $cart['id'];
    $qtys = $qtys . ',' . $cart['total'];
    $idvariants = $idvariants . ',' . $cart['id_variant'];
    $c++;
}
$asd = count($data);
$addresses = mysqli_query($conn, "SELECT * FROM address WHERE user_id = '$_SESSION[userid]'");
$num = mysqli_num_rows($addresses);
?>
<!doctype html>
<html lang="en">

<head>
   <?php include "components/head.php"; ?>

    <title>Keranjang Saya</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom d-block d-md-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Keranjang Saya</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue w-100 position-fixed z-3 d-none d-md-block">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <a onclick="history.back()" class="d-flex align-items-center cursor-pointer">
                        <i class="ri-arrow-left-s-line text-light"></i>
                        <span class="fz-12 fw-bold text-light">Keranjang Belanja</span>
                    </a>
                    <div class="right">
                        <form class="d-flex gap-3 align-items-center justify-content-center nosubmit" action="search.php" method="get">
                            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" name="keyword"
                                aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop -->
        <div class="container-lg bg-white py-3 mt-keranjang d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkAll" autocomplete="off"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" onclick="checkAll()">
                        </div>
                        <div class="right">
                            <span class="fz-12">Semua Produk</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Variasi</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Kuantitas</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Harga</span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">Aksi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-lg bg-white mt-4 py-3 d-none d-md-block">
            <div class="container">
                <?php foreach($data as $a) { 
                    $total += $a['price'] * $a['quantity'];
                    if($_SESSION['role'] == 3) {
                        $price = whichPrice($a['grosir'], $a['price'], $a['quantity']);
                    } else {
                        $price = $a['price'];
                    }
                    $count++;
                ?>
                <div class="row border-abu mt-3 py-2">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input all check" autocomplete="off"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="check<?= $count ?>" data-qty="<?= $a['quantity'] ?>"
                                onchange="checkProduct(this.checked, <?= $price ?>, this.dataset.qty, <?= $a['id_cart'] ?>, <?= $a['id_variant'] ?>); console.log(this.dataset.qty)">
                        </div>
                        <div class="center">
                            <img src="<?= $a['photo'] ?>" alt="" class="img-fluid object-cover imgKeranjang">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fz-10">
                                <?= $a['name'] ?>
                            </span>
                            <span class="fz-10 fw-600 mt-2" id="jenis"><?= ($a['quantity'] >= 60 && $_SESSION['role'] == 3) ? "Grosir" : "Eceran" ?></span>
                        </div>
                    </div>
                    <div class="col-2 d-flex flex-column">
                        <span class="fz-12 fw-600">Variasi :</span>
                        <span class="fz-12"><?= $a['variant'] ?></span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500">
                            <div class="wrapper">
                                <span class="minus"  onclick="
                                var a = document.getElementById('num<?= $count ?>');
                                if(parseInt(a.innerText) > 1) {
                                    var b = parseInt(a.innerText) - 1;
                                    a.innerText = b;
                                }
                                editQuantity(<?= $a['id_cart'] ?>, b, 'check<?= $count ?>', <?= $price ?>);
                                ">-</span>
                                <span class="num<?= $count ?>" id="num<?= $count ?>"><?= $a['quantity'] ?></span>
                                <span class="plus" onclick="
                                var a = document.getElementById('num<?= $count ?>');
                                var b = parseInt(a.innerText) + 1;
                                a.innerText = b;
                                editQuantity(<?= $a['id_cart'] ?>, b, 'check<?= $count ?>', <?= $price ?>);
                                ">+</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500 yellow"><?= $price ?></span>
                    </div>
                    <div class="col-2 text-danger">
                        <a href="server/process/removeCart.php?id=<?= $a['id_cart'] ?>" style="color: red;">
                            <span class="fz-12 fw-500 d-flex align-items-center gap-1">
                                <i class="ri-delete-bin-fill"></i>
                                <span>Hapus</span>
                            </span>
                        </a>
                    </div>
                </div>
                <?php
                } ?>
            </div>
        </div>

        <!-- Mobile -->
        <div class="bg-white pt-4 pb-5 mb-5 d-block d-md-none">
            <?php foreach($data as $a) { 
                $total2 += $a['price'] * $a['quantity']; 
                $c++;
                if($_SESSION['role'] == 3) {
                    $price2 = whichPrice($a['grosir'], $a['price'], $a['quantity']);
                } else {
                    $price2 = $a['price'];
                }
            ?>
            <div class="container pt-4 pb-3 d-flex gap-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="check1<?= $c ?>" data-qty="<?= $a['quantity'] ?>"
                        onchange="checkProduct(this.checked, <?=$price2?>, this.dataset.qty, <?= $a['id_cart'] ?>, <?= $a['id_variant'] ?>); console.log(<?= $a['id_variant'] ?>)">
                </div>
                <img src="<?= $a['photo'] ?>" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600"><?= $a['name'] ?></p>
                    <span class="orange fz-12 fw-600 me-3">Rp. <?= $price2 ?></span>
                    <div class="wrapper">
                        <span class="minus"  onclick="
                            var a = document.getElementById('num1<?= $count ?>');
                                if(parseInt(a.innerText) > 1) {
                                    var b = parseInt(a.innerText) - 1;
                                    a.innerText = b;
                                }
                            editQuantity(<?= $a['id_cart'] ?>, b, 'check1<?= $c ?>', <?= $price2 ?>)
                        ">-</span>
                        <span class="num" id="num1<?= $count ?>"><?= $a['quantity'] ?></span>
                        <span class="plus" onclick="
                        var a = document.getElementById('num1<?= $count ?>');
                        var b = parseInt(a.innerText) + 1;
                        a.innerText = b;
                        editQuantity(<?= $a['id_cart'] ?>, b, 'check1<?= $c ?>', <?= $a['price'] ?>)
                        ">+</span>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- <div class="container pt-4 pb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-3 mb-3 d-flex gap-2 border-top-custom">
                <div class="form-check">0
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600">Topi Fashion
                        Anak Laki - Laki & Perempuan</p>
                    <span class="orange fz-12 fw-600 me-3">Rp20.000</span>
                    <span class="orange fz-12 fw-600">Eceran</span>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div> -->
        </div>


        <!-- Navbar Bottom -->
        <div class="container-lg navbarBottomCart bg-white start-0 end-0 bottom-0 mt-4 py-3">
            <div class="container d-flex flex-column gap-2">
                <!-- Done Voucher -->
                <!-- <div class="d-flex gap-4 align-items-center justify-content-between justify-content-sm-end">
                    <div class="left d-flex align-items-center">
                        <span class="text-light fz-10 fw-500 bg-yellow px-2 me-3">57% OFF</span>
                        <img src="assets/img/voucher.svg" alt="" class="me-2">
                        <span class="fz-11">Voucher</span>
                    </div>
                    <div class="right d-flex align-items-center ps-3">
                        <span class="blue fz-11">Ganti Voucher</span>
                    </div>
                </div> -->
                <div class="d-flex align-items-center justify-content-between">
                    <div class="left d-flex align-items-center"></div>
                    <form action="checkout.php" method="post" id="form">
                        <div class="right">
                            <span class="fz-11 fw-500">Total (<span id="count">0</span> produk)</span>
                            <span class="fz-11 fw-600 orange">Rp. </span><span class="fz-11 fw-600 orange" id="total">0</span>
                            <input type="text" name="idCart" id="inputCarts" autocomplete="off" hidden required>
                            <input type="text" name="idVariant" id="inputVariant" autocomplete="off" hidden required>
                            <button id="btn-checkout" type="submit" onclick=""
                            class="ms-3 right text-center bg-blue fz-12 text-light px-3 py-2" style="border: none;">
                            Checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anda belum menambahkan alamat</h5>
            </div>
            <div class="modal-body">
                Tambah alamat di <a href="alamat.php">sini</a>
            </div>
            </div>
        </div>
    </div>

    <script>
    var num = <?= $num ?>;
    if(num == 0){
        $(document).ready(function() {
            $('#staticBackdrop').modal('show');
        });
    }

    var checkboxes = document.querySelectorAll('#check');
    checkboxes.forEach(a => {
        a.checked = false;
    });

    var role = <?= $_SESSION['role'] ?>;

    // edit quantity
    function editQuantity(id, qty, a, z) {
        if(qty >= 1){
            var tempTotal = document.getElementById('total').innerHTML;
            var jenis = document.getElementById('jenis');
            document.getElementById('total').innerHTML = "<img src='assets/img/loading.gif' width='20px' alt=''>";
        $.ajax({
            url: "server/ajax/edit-quantity.php",
            type: "POST",
            data: {
                id: id,
                qty: qty
            },
            success: function(data) {
                var c = $('#' + a).attr('data-qty')
                $('#' + a).attr('data-qty', data)
                var b = $('#' + a).attr('data-qty')
                var total = document.getElementById('total');
                    if(c < b) {
                        total.innerText = parseInt(tempTotal) + z
                    } else {
                        total.innerText = parseInt(tempTotal) - z
                    }
                    if(total.innerText <= 0) {
                        total.innerText = 0
                    }
                    if(document.getElementById(a).checked != true) {
                        total.innerText = 0
                    }
                    if(role == 3) {
                        if(b >= 60) {
                            jenis.innerText = "Grosir"
                        } else {
                            jenis.innerText = "Eceran"
                        }
                    }
                console.log(c, b, total.innerText)
                }
            })
        }
    }

    // Check all product
    function checkAll() {
        var checkboxes = document.querySelectorAll('.check');
        var check = document.getElementById('checkAll');
        const inputCarts = document.getElementById('inputCarts');
        const inputVariant = document.getElementById('inputVariant');
        const total = document.getElementById('total');
        if (check.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
            total.innerText = <?= $total ?>;
            inputCarts.value = <?= json_encode($idcarts) ?>;
            inputVariant.value = <?= json_encode($idvariants) ?>;
            document.getElementById('count').innerText = <?= $count ?>;
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
            inputCarts.value = "";
            inputVariant.value = "";
            total.innerText = 0;
            document.getElementById('count').innerText = 0;
        }
    }

    function checkProduct(checked, price, quantity, id, idV) {
        const total = document.getElementById('total');
        if(checked == true) {
            total.innerText = parseInt(total.innerText) + (price * quantity);
            document.getElementById('inputCarts').value = document.getElementById('inputCarts').value + ',' + id;
            document.getElementById('inputVariant').value = document.getElementById('inputVariant').value + ',' + idV;
            document.getElementById('count').innerText = parseInt(document.getElementById('count').innerText) + 1;
        } else {
            if(total.innerText > 0) {
                total.innerText = parseInt(total.innerText) - (price * quantity);
                document.getElementById('count').innerText = parseInt(document.getElementById('count').innerText) - 1;
            }
            let value = document.getElementById('inputCarts').value;
            var array = value.split(',');
            var i = id;
            array = array.filter(function(item) {
                return item != i;
            });
            document.getElementById('inputCarts').value = array.join(',');
            let value2 = document.getElementById('inputVariant').value;
            var array2 = value2.split(',');
            var i2 = idV;
            array2 = array2.filter(function(item) {
                return item != i2;
            });
            document.getElementById('inputVariant').value = array2.join(',');
        }
        if(parseInt(document.getElementById('count').innerText) == <?= $asd ?>) {
            document.getElementById('checkAll').checked = true;
        } else {
            document.getElementById('checkAll').checked = false;
        }
        console.log(document.getElementById('inputVariant').value, checked, price, quantity, id, idV);
    }

    // Check Stock
    function checkStock(id, qty) {
        $.ajax({
            url: "server/ajax/check-stock.php",
            type: "POST",
            data: {
                id: id,
                qty: qty
            },
            success: function(data) {
                if(data == "true") {
                    console.log("true");
                } else {
                    console.log(data);
                    location.reload();
                }
            }
        });
    }

    function removeItemOnce(arr, value) {
        var i = arr.indexOf(value);
        if (i !== -1) {
            arr.splice(i, 1);
        }
    }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>