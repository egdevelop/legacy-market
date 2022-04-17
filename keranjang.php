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

    <title>Keranjang Saya</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Keranjang Saya</span>
                    </a>
                    <div class="right d-flex align-items-center gap-2">
                        <span class="fw-500 fz-14">Ubah</span>
                        <i style="font-size: 1.5rem;" class="ri-chat-1-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- keranjang -->
        <div class="bg-white pt-4 pb-5 mb-5">
            <div class="container pt-4 pb-3 d-flex gap-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
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
                    <input type="checkbox" class="form-check-input" style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
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
                    <input type="checkbox" class="form-check-input" style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
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
                    <input type="checkbox" class="form-check-input" style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
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
        </div>

        <!-- Navbar Bottom -->
        <div class="navbarBottom bg-white container-fluid px-0 position-fixed bottom-0 mt-5">
            <div class="d-flex flex-column gap-2">
                <div class="container pt-2">
                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="left d-flex align-items-center">
                            <img src="assets/img/voucher.svg" alt="" class="me-2">
                            <span class="fz-11">Voucher</span>
                        </div>
                        <div class="right d-flex align-items-center ps-3">
                            <span class="abu fz-11">Gunakan / masukkan kode</span>
                            <i class="abu ri-arrow-right-s-line"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-4">
                    <div class="container">
                        <div class="left d-flex align-items-center">
                            <input type="checkbox" class="form-check-input me-2" style="font-size: 18px; border-radius: 0; border: 1px solid #29AAE3" id="exampleCheck1">
                            <span class="fz-11">Semua</span>
                        </div>
                    </div>
                    <div class="right d-flex justify-content-end gap-3 align-items-center ps-3">
                        <div class="left d-flex flex-column align-items-end">
                            <span class="fz-12 fw-500">Total</span>
                            <span class="fz-12 fw-600 orange">Rp0</span>
                        </div>
                        <a href="checkout.php" class="right bg-blue text-light p-3 w-100 h-100">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Button Cart Increment Decrement
        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");
        let a = 1;
        plus.addEventListener("click", () => {
            a++;
            a = (a < 10) ? a : a;
            num.innerText = a;
        });

        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                a = (a < 10) ? a : a;
                num.innerText = a;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>