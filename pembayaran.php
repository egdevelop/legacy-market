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

    <title>Metode Pembayaran</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Navbar -->
        <div class="bg-blue text-light py-4 border-bottom-custom">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Metode Pembayaran</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- keranjang -->
        <div class="bg-white pt-1 pb-5 mb-5">
            <div class="container-fluid px-0">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="ri-money-dollar-circle-line orange ps-0 ms-0"></i>
                                <span class="fz-12 fw-600"> Transfer Bank</span>
                            </button>
                        </p>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1 position-relative">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/bca.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Bank BCA </span>
                                        <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BCA. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/mandiri.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Bank Mandiri </span>
                                        <span class="fz-9" style="width: 90%">Hanya menerima dari Bank Mandiri termasuk Bank Syariah Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/bni.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Bank BNI </span>
                                        <span class="fz-9" style="width: 90%">Hanya menerima dari Bank BNI
                                            Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="assets/img/alfamart.svg" alt="">
                                <span class="fz-12 fw-600">Alfamart</span>
                            </button>
                        </p>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/alfamart.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Alfamart </span>
                                        <span class="fz-10">Hanya menerima dari Alfamart. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button d-flex align-items-center gap-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <img src="assets/img/indomaret.svg" alt="">
                                <span class="fz-12 fw-600">Indomaret</span>
                            </button>
                        </p>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body mt-1">
                                <label class="radioWrapper ps-2 row d-flex align-items-start py-3" style="border-top: 1px solid rgba(196, 196, 196, 0.2) !important;">
                                    <div class="col-1 left me-3">
                                        <img src="assets/img/indomaret.svg" alt="">
                                    </div>
                                    <div class="col-10 ps-1 pe-1 d-flex gap-2 flex-column">
                                        <span class="fw-600 fz-12">Indomaret</span>
                                        <span class="fz-10">Hanya menerima dari Indomaret. Metode Pembayaran Lebih Mudah</span>
                                        <input type="radio" name="radio">
                                        <span class="checkmark position-absolute top-50 me-2"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Navbar Bottom -->
    <div class="navbarBottom bg-white container-fluid px-0 position-fixed bottom-0 mt-5">
        <div class="d-flex justify-content-between gap-3 align-items-center ps-3">
            <div class="left d-flex flex-column align-items-end">
                <span class="fz-12 fw-500">Biaya penanganan</span>
                <span class="fz-12 fw-600 orange">Rp2.500</span>
            </div>
            <a href="pengiriman.php" class="right bg-blue text-light p-3">
                Konfirmasi
            </a>
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