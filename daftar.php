<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$vairants = mysqli_query($conn, "SELECT * FROM variants WHERE id_product = 17");

?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/headMember.php"; ?>
    
    <title>Daftar Member</title>
</head>

<body>
    <div class="container position-relative">
        <div class="row d-flex justify-content-start">
            <div class="col-lg-6 col-12 col-lg-10 mx-auto mx-lg-0 pt-3 mt-1 ">
                <div class="d-none d-md-flex">
                    <div class="col-12">
                        <h1 class="f-40 fw-bold">Daftar Member</h1>
                        <p class="f-24 pt-3">Nikmati harga grosir dengan bergabung bersama kami</p>
                    </div>
                </div>
                <div class="d-flex d-md-none">
                    <div class="col-12 mx-auto">
                         <a onclick="history.back()" class="text-decoration-none text-dark d-flex align-items-center gap-3">
                            <i class="ri-arrow-left-s-line fz-14"></i>
                        </a>
                        <h1 class="f-24 text-center fw-bold">Daftar Member </h1>
                        <p class=" f-16 text-center px-5 py-2">Nikmati harga grosir dengan bergabung bersama kami</p>
                    </div>
                </div>
                <div class="d-none d-md-flex">
                    <img src="assets/img/underline.png" class="position-absolute " style="margin-top: -10px;" alt="">
                </div>
                <div class="d-flex d-md-none justify-content-center">
                    <img src="assets/img/underline.png" class="position-absolute pt-2" style="margin-top: -10px;"
                        alt="">
                </div>
                <form action="server/process/addToCart.php" method="post" id="form">
                    <div class="col-11 col-lg-7 pt-1 pt-md-4 mt-4 mx-auto mx-md-0 ">
                        <input type="text" class="form-control padding f-12 py-3 ps-3" id="inputReferal"
                            aria-describedby="nama" name="wa" required placeholder="Masukkan Referal">
                    </div>
                    <div class="col-11 col-lg-7 mt-0 mx-auto mx-md-0 ">
                        <label for="nama" class="form-label f-12 ">*Optional</label>
                    </div>
                    <div class="col-11 col-lg-7 mt-0 mx-auto mx-md-0 ">
                        <select class="form-control padding mt-2  f-12 py-3 ps-3" onchange="test()" id="select" required>
                            <option selected disabled>Pilih Paket Member</option>
                            <?php while ($row = mysqli_fetch_assoc($vairants)) : ?>
                                <option value="<?= $row['id'] ?>" data-price="<?= $row['retail_price'] ?>"><?= $row['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label for="" class="fw-bold py-4">Harga : </label>
                        <label for="" class="fw-bold py-3" id="harga"></label>
                        <input type="text" name="idVariant" id="inputV" value="" hidden>
                        <input type="text" name="qty" id="qty" value="1" hidden>
                        <input type="text" name="type" id="type" value="member" hidden>
                        <a href="javascript:void(0)" class="text-decoration-none d-none d-md-block py-3 btn2 text-center fw-semibold" onclick="asd()">Bayar Sekarang</a>
                    </div>
                </form>
            </div>
            <div class=" d-none d-lg-flex col-lg-6 h-100 position-fixed top-0 bottom-0 end-0">
                <img src="assets/img/backgroundd.svg"
                    class=" d-flex-justify-content-end align-items-end position-absolute end-0 h-100" alt="">
            </div>
        </div>
    </div>

    <footer class="d-flex d-md-none py-4 mt-4" style="background-color: #29AAE3;">
        <div class="col-10 mx-auto mt-2">
            <a href="#"  onclick="asd()"><button class="btnmobile py-3  fw-semibold w-100">Bayar Sekarang</button> </a>
            <p class="f-12 text-light text-center  mx-5 mt-4 fw-semibold">FAQ:join member untuk dapatkan akses pembelian
                lebih banyak</p>
            <p class="f-12 text-light text-center mt-3 fw-semibold">Copyright @ 2022</p>
        </div>
    </footer>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        const variants = document.querySelectorAll('.varian');
        const harga = document.getElementById('harga');
        const inputV = document.getElementById('inputV');
        function test() {
            var e = document.getElementById("select");
            var value = e.value;
            var text = e.options[e.selectedIndex].text;
            var price = e.options[e.selectedIndex].dataset.price;
            harga.innerText = "Rp. " + price;
            inputV.value = value;
            console.log(value, text, price);
        }

        function asd() {
            var a = document.getElementById("inputReferal").value;
            if(a.length > 0){
                $.ajax({
                    url: 'server/ajax/useReferal.php',
                    type: 'GET',
                    data: {
                        referal: a
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == "true") {
                            document.getElementById('form').submit();
                        }
                    }
                });
            } else {
                document.getElementById('form').submit();
            }
        }
    </script>
</body>
</html>