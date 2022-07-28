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
                    <div class="left">
                        <span class="fz-12 fw-bold text-light">Keranjang Belanja</span>
                    </div>
                    <div class="right">
                        <form class="d-flex gap-3 align-items-center justify-content-center nosubmit">
                            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk"
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
                            <input type="checkbox" class="form-check-input" id="checkAll"
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
                <?php foreach($data as $a) { $total += $a['price'] * $a['quantity']; $count++;?>
                <div class="row border-abu mt-3 py-2">
                    <div class="col-4 d-flex gap-2 align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input all"
                                style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="check"
                                onchange="checkProduct(this.checked, <?= $a['price'] ?>, <?= $a['quantity'] ?>, <?= $a['id_cart'] ?>, <?= $a['id_variant'] ?>)">
                        </div>
                        <div class="center">
                            <img src="<?= $a['photo'] ?>" alt="" class="img-fluid object-cover imgKeranjang">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fz-10">
                                <?= $a['name'] ?>
                            </span>
                            <span class="fz-10 fw-600 mt-2">Eceran</span>
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
                                const a = document.getElementById('num<?= $count ?>');
                                if(parseInt(a.innerText) > 1) {
                                    a.innerText = parseInt(a.innerText) - 1;
                                }
                                document.getElementById('edit<?= $count ?>').style = 'display: block';
                                ">-</span>
                                <span class="num<?= $count ?>" id="num<?= $count ?>"><?= $a['quantity'] ?></span>
                                <span class="plus" onclick="
                                const a = document.getElementById('num<?= $count ?>');
                                a.innerText = parseInt(a.innerText) + 1;
                                document.getElementById('edit<?= $count ?>').style = 'display: block';
                                ">+</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-2">
                        <span class="fz-12 fw-500 yellow"><?= $a['price'] ?></span>
                    </div>
                    <div class="col-2 text-danger">
                        <a href="javascript:void(0)" style="color: yellow; display: none;" id="edit<?= $count ?>" onclick="
                        var a = document.getElementById('num<?= $count ?>').innerText;
                        editQuantity(<?= $a['id_cart'] ?>, a)" >
                            <span class="fz-12 fw-500 d-flex align-items-center gap-1">
                                <i class="ri-save-line"></i>
                                <span>Simpan Perubahan</span>
                            </span>
                        </a>
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
            <?php foreach($data as $a) { $total2 += $a['price'] * $a['quantity']; $c++?>
            <div class="container pt-4 pb-3 d-flex gap-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                        style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1" 
                        onchange="checkProduct(this.checked, <?= $a['price'] ?>, <?= $a['quantity'] ?>, <?= $a['id_cart'] ?>, <?= $a['id_variant'] ?>); console.log(<?= $a['id_variant'] ?>)">
                </div>
                <img src="assets/img/varian.jpg" alt="" class="w-4rem object-cover">
                <div class="desc">
                    <p class="fz-14 fw-600"><?= $a['name'] ?></p>
                    <span class="orange fz-12 fw-600 me-3">Rp. <?= $a['price'] ?></span>
                    <span class="fz-10 fw-600 m-2" style="color: red; display: none;" id="edit1<?= $count ?>"  onclick="
                        var a = document.getElementById('num1<?= $count ?>').innerText;
                        editQuantity(<?= $a['id_cart'] ?>, a)">Simpan Perubahan</span>
                    <div class="wrapper">
                        <span class="minus"  onclick="
                        const a = document.getElementById('num1<?= $count ?>');
                        if(parseInt(a.innerText) > 1) {
                            a.innerText = parseInt(a.innerText) - 1;
                        }
                        document.getElementById('edit1<?= $count ?>').style = 'display: block';
                        ">-</span>
                        <span class="num" id="num1<?= $count ?>"><?= $a['quantity'] ?></span>
                        <span class="plus" onclick="
                        const a = document.getElementById('num1<?= $count ?>');
                        a.innerText = parseInt(a.innerText) + 1;
                        document.getElementById('edit1<?= $count ?>').style = 'display: block';
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
            </div> -->
        </div>


        <!-- Navbar Bottom -->
        <div class="container-lg navbarBottomCart bg-white start-0 end-0 bottom-0 mt-4 py-3">
            <div class="container d-flex flex-column gap-2">
                <!-- Modal Voucher -->
                <div class="modal fade" id="btnVoucher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header d-block" style="border: none;">
                                <div class="col-12 d-flex justify-content-between">
                                    <h5 class="modal-title fz-13" id="staticBackdropLabel">Pilih Voucher</h5>
                                    <span class="blue fz-18 me-3"><i class="ri-coupon-2-line"></i></span>
                                </div>
                                <div class="col-12">
                                    <form
                                        class="input-group d-flex align-items-center justify-content-between my-1 py-3 px-4 gap-4"
                                        style="background-color: #F8F8F8;">
                                        <h5 class="fz-10 mt-2">Tambah Voucher</h5>
                                        <input class="voucherInput form-control bg-transparent py-1" type="search"
                                            placeholder="Masukkan Kode Voucher" aria-label="Search"
                                            style="width: 10rem; border-color:#C1C1C1; font-size: 12px">
                                        <button class="btn fz-12 py-1"
                                            style="color: #c1c1c1;border-color:#C1C1C1;">Pakai</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between gap-2 mb-3">
                                    <span class="fz-12 fw-600">Voucher Gratis Ongkir</span>
                                    <span class="fz-10">Pilih 1</span>
                                </div>

                                <label class="radioWrapper ps-1 d-flex align-items-start ">
                                    <div class="card-body border-card py-0 px-0 d-flex justify-content-between ">
                                        <img src="assets/img/gratisongkir.png" class=" " alt="">
                                        <div class="d-block my-auto">
                                            <h5 class="f-12 mt-3 me-4 ">Min.Belanja Rp200RB</h5>

                                            <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                                        </div>
                                        <div class=" mt-auto me-2 mb-2">
                                            <input type="radio" name="radio">
                                            <span class="check mt-4 end-0"></span>
                                            <p class="f-10 mb-0 ">S&K</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn fz-13" data-bs-dismiss="modal">Nanti
                                    saja</button>
                                <button type="button"
                                    class="text-light btn btn-blue px-3 py-2 fz-13">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <input type="text" name="idCart" id="inputCarts" hidden required>
                            <input type="text" name="total" id="inputTotal" hidden required>
                            <input type="text" name="idVariant" id="inputVariant" hidden required>
                            <input type="text" name="quantity" id="inputQty" hidden required>
                            <button id="btn-checkout" onclick=" var a = document.getElementById('inputVariant').value; var b = document.getElementById('inputQty').value ;checkStock(a, b)"
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

    // edit quantity
    function editQuantity(id, qty) {
        console.log(id, qty);
        $.ajax({
            url: "server/ajax/edit-quantity.php",
            type: "POST",
            data: {
                id: id,
                qty: qty
            },
            success: function(data) {
                location.reload();
            }
        });
    }

    // Check all product
    function checkAll() {
        var checkboxes = document.querySelectorAll('#check');
        var check = document.getElementById('checkAll');
        const inputTotal = document.getElementById('inputTotal');
        const inputCarts = document.getElementById('inputCarts');
        const inputVariant = document.getElementById('inputVariant');
        const inputQty = document.getElementById('inputQty');
        const total = document.getElementById('total');
        if (check.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
            total.innerText = <?= $total ?>;
            inputCarts.value = <?= json_encode($idcarts) ?>;
            inputTotal.value = total.innerText;
            inputVariant.value = <?= json_encode($idvariants) ?>;
            inputQty.value = <?= json_encode($qtys) ?>;
            document.getElementById('count').innerText = <?= $count ?>;
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
            inputCarts.value = "";
            inputTotal.value = "";
            inputVariant.value = "";
            inputQty.value = "";
            total.innerText = 0;
            document.getElementById('count').innerText = 0;
        }
    }

    function checkProduct(checked, price, quantity, id, idV) {
        const total = document.getElementById('total');
        const inputTotal = document.getElementById("inputTotal");
        if(checked == true) {
            total.innerText = parseInt(total.innerText) + (price * quantity);
            inputTotal.value = parseInt(total.innerText);
            document.getElementById('inputCarts').value = document.getElementById('inputCarts').value + ',' + id;
            document.getElementById('inputVariant').value = document.getElementById('inputVariant').value + ',' + idV;
            document.getElementById('inputQty').value = document.getElementById('inputQty').value + ',' + quantity;
            document.getElementById('count').innerText = parseInt(document.getElementById('count').innerText) + 1;
        } else {
            if(total.innerText > 0) {
                total.innerText = parseInt(total.innerText) - (price * quantity);
                document.getElementById('count').innerText = parseInt(document.getElementById('count').innerText) - 1;
            }
            inputTotal.value = parseInt(total.innerText);
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
            let value3 = document.getElementById('inputQty').value;
            var array3 = value3.split(',');
            var deleted = array3.pop();
            document.getElementById('inputQty').value = array3.join(',');
        }
        if(parseInt(document.getElementById('count').innerText) == <?= $asd ?>) {
            document.getElementById('checkAll').checked = true;
        } else {
            document.getElementById('checkAll').checked = false;
        }
        console.log(document.getElementById('inputVariant').value, checked, price, quantity, id, idV, document.getElementById('inputQty').value);
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
                    document.getElementById('form').submit();
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

    function fillData() {

    }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>