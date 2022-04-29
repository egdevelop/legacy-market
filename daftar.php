<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style2.css?<?php echo time(); ?>">
    <title>Daftar Member</title>
</head>

<body>
    <div class="container position-relative ">
        <div class="row d-flex justify-content-start ">

            <div class="col-xl-6 col-12 col-lg-10 mx-auto mx-xl-0 pt-3 mt-1 ">
                <div class="d-none d-md-flex">
                    <div class="col-12">
                        <h1 class="f-40 fw-bold">Daftar Member</h1>
                        <p class="f-24 pt-3">Nikmati harga grosir dengan bergabung bersama kami</p>

                    </div>
                </div>
                <div class="d-flex d-md-none">
                    <div class="col-12 mx-auto">
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

                <div class="col-11 col-xl-7 pt-1 pt-md-4 mt-4 mx-auto mx-md-0 ">
                    <input type="number" class="form-control padding f-12 py-3 ps-3" id="inputNama"
                        aria-describedby="nama" name="nama" required placeholder="Masukkan no.Whatsapp">
                </div>
                <div class="col-11 col-xl-7 mt-0 mx-auto mx-md-0 ">
                    <label for="nama" class="form-label f-12 ">*Optional</label>
                    <input type="text" class="form-control padding  f-12 py-3 mt-2 ps-3" id="inputNama"
                        aria-describedby="nama" name="nama" required placeholder="Masukkan Username instagram">
                </div>
                <div class="col-11 col-xl-7 mt-0 mx-auto mx-md-0 ">
                    <label for="nama" class="form-label f-12 ">*Optional</label>
                    <select class="form-control padding mt-2  f-12 py-3 ps-3" id="select" required>
                        <option selected>Pilih Paket Member</option>
                        <option value="pro">PRO PELER</option>
                        <option value="nub">NUB PELER</option>
                        <option value="hoki">HOKI PELER</option>
                    </select>
                    <label for="" class="fw-bold py-4">Harga</label>
                    <a href="#" class="text-decoration-none d-none d-md-block py-3 btn2 text-center fw-semibold">Bayar
                        Sekarang</a>

                </div>
            </div>
            <div class=" d-none d-xl-flex col-xl-6 h-100 position-fixed top-0 bottom-0 end-0">
                <img src="assets/img/backgroundd.svg"
                    class=" d-flex-justify-content-end align-items-end position-absolute end-0 h-100" alt="">
            </div>
        </div>
    </div>

    <footer class="d-flex d-md-none py-4 mt-4 fixed-bottom" style="background-color: #29AAE3;">
        <div class="col-10 mx-auto mt-2">
            <a href="#"><button class="btnmobile py-3  fw-semibold w-100">Bayar Sekarang</button> </a>
            <p class="f-12 text-light text-center  mx-5 mt-4 fw-semibold">FAQ:join member untuk dapatkan akses pembelian
                lebih banyak</p>
            <p class="f-12 text-light text-center mt-3 fw-semibold">Copyright @ 2022</p>
        </div>

    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>