<!doctype html>
<html lang="en">

<head>
    <?php include "components/headMember.php"; ?>

    <title>Hello, world!</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="back-blue navbar navbar-light fixed-top mb-5">
        <div class="container-fluid position-relative pt-3">
            <a onclick="history.back()" class="text-decoration-none d-flex align-items-center gap-2">
                <i class="text-light ri-arrow-left-s-line"></i>
                <span class="f-16 fw-bold text-light me-auto">Pilih Voucher</span>
            </a>
            <form class="input-group d-flex ms-auto w-100 my-1 py-1">
                <input class="form-control py-3 me-0 f-10 text-prem" type="search" placeholder="Masukkan Kode Voucher"
                    aria-label="Search">
                <a class="btn bg-second position-absolute end-0 me-1 py-2  px-3 mt-1 ">Pakai</a>
            </form>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- CONTENT -->
    <section id="ongkir" class="bg-second position-relative pt-5 mt-5">
        <!-- Gratis Ongkir -->
        <div class="gratis-ongkir mt-5 mb-5">
            <div class="card mt-5 py-3 px-3">
                <div class="d-flex justify-content-between  my-1">
                    <h1 class="f-12 fw-bold text-dark">Voucher Gratis Ongkir</h1>
                    <p class="f-10">Pilih 1</p>
                </div>
                <div class="card-body border-card py-0 px-0 d-flex justify-content-between gap-2">
                    <img src="assets/img/free.png" class="imgVoucher" alt="">
                    <div class="d-block my-auto">
                        <h5 class="f-12 mt-3 me-4">Min. Belanja Rp200RB</h5>
                        <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                    </div>
                    <div class=" mt-auto me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" viewBox="0 0 24 24" width="12" height="12">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z"
                                fill="rgba(41,170,227,1)" />
                        </svg>
                        <p class="f-6 mb-0 ">S&K</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diskon -->
        <div class="gratis-ongkir mt-5 mb-5 pb-5">
            <div class="card mt-5 pt-3 px-3">
                <div class="d-flex justify-content-between  my-1">
                    <h1 class="f-12 fw-bold text-dark">Voucher Diskon</h1>
                    <p class="f-10">Pilih 1</p>
                </div>
                <div class="card-body border-card pb-3 py-0 px-0 d-flex justify-content-between gap-2">
                    <img src="assets/img/free.png" class="imgVoucher" alt="">
                    <div class="d-block my-auto">
                        <h5 class="f-12 mt-3 me-4">Min. Belanja Rp200RB</h5>
                        <p class="f-10 text-prem">Berakhir dlm 9 jam</p>
                    </div>
                    <div class=" mt-auto me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-4" viewBox="0 0 24 24" width="12" height="12">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z"
                                fill="rgba(41,170,227,1)" />
                        </svg>
                        <p class="f-6 mb-0 ">S&K</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal trigger -->
        <button class="btn back-blue py-3 text-light f-16 fw-bold d-grid w-100 fixed-bottom" data-bs-toggle="modal"
            data-bs-target="#reg-modal">
            Konfirmasi
        </button>
        <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="ri-arrow-right-s-line"></i>
                        <h5 class="f-16" id="modal-title">Pilih Voucher</h5>
                        <img type="button" class="" data-bs-dismiss="modal" aria-label="close"
                            src="assets/img/iconV.svg" alt="">
                    </div>
                    <div class="modal-body  pb-5 mb-5">
                        <form class="input-group d-flex position-absolute ms-0 me-0 w-90 my-1 py-1"
                            style="background-color: #F8F8F8;">
                            <div class="col-4 mt-1 ms-2">

                                <h5 class="f-10 mt-2">Tambah Voucher</h5>
                            </div>
                            <div class="col-5 mt-1">

                                <input class="form-control py-1 f-10 w-100  text-prem " type="search"
                                    placeholder="Masukkan Kode Voucher" aria-label="Search"
                                    style="border-color:#C1C1C1;">
                            </div>
                            <div class=" col-2">

                                <button class="btn  end-0 me-0 ms-3 f-10 py-1 mt-1"
                                    style="border-color:#C1C1C1;">Pakai</button>
                            </div>
                        </form>
                    </div>
                    <div class=" modal-scrollable">
                        <p>Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Itaque atque, laboriosam ut
                            voluptatem perferendis distinctio magnam expedita. Saepe aliquam inventore tempore sit
                            temporibus possimus deserunt harum officiis voluptatem sunt? At id voluptatum
                            repudiandae optio. Et accusamus minus error maxime dicta aliquam, veniam, esse quidem
                            provident sapiente deleniti qui dolores quam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem labore ullam at accusantium
                            impedit eius fugiat? Facere deserunt possimus earum inventore, natus quisquam quaerat
                            repellat cum, veritatis a culpa. Maiores quisquam facere nisi totam! Quo dolores,
                            suscipit nemo consequatur nesciunt labore magni earum molestiae dolorem quam doloremque
                            exercitationem voluptates nisi dolore, eligendi vitae ad praesentium dicta deserunt
                            nulla veritatis cumque id hic! Minus delectus alias ipsa ducimus deleniti eius cumque?
                            Nesciunt, est. Quae animi voluptas porro ipsam voluptatum, laudantium est sapiente quos
                            consequatur exercitationem enim harum magnam! Quibusdam mollitia dolores voluptates
                            culpa odio cupiditate quaerat explicabo, vero voluptatem omnis odit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include "components/foot.php"; ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</body>

</html>