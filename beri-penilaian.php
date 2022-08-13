<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
session_start();
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Beri Penilaian</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-lg-none py-4">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                        <i class="ri-arrow-left-s-line fz-14"></i>
                        <span class="fz-12 fw-bold fz-14">Penilaian Produk</span>
                    </a>
                    <span class="fz-12">Kirim</span>
                </div>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <!-- Carousel -->
        <section
            class="bg-white py-3 d-flex flex-column align-items-center justify-content-center px-0 container position-relative mt-profile">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="my-3 d-flex gap-2 align-items-center justify-content-center">
                            <form action="/server/process/addReview.php" method="post" enctype="multipart/form-data">
                            <div class="rating-box">
                                <div class="rating-container">
                                    <input class="inputStar" type="radio" name="rating" value="5" id="star-5"> <label class="labelStar" for="star-5">&#9733;</label>                                   
                                    <input class="inputStar" type="radio" name="rating" value="4" id="star-4"> <label class="labelStar" for="star-4">&#9733;</label>                                   
                                    <input class="inputStar" type="radio" name="rating" value="3" id="star-3"> <label class="labelStar" for="star-3">&#9733;</label>                                  
                                    <input class="inputStar" type="radio" name="rating" value="2" id="star-2"> <label class="labelStar" for="star-2">&#9733;</label>       
                                    <input class="inputStar" type="radio" name="rating" value="1" id="star-1"> <label class="labelStar" for="star-1">&#9733;</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 borStar px-3 py-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="fz-12">Tambah Foto</label>
                                <input type="file" class="form-control fz-12" name="gambar" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            </div>
                        </div>   
                        <div class="my-3 form-floating">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2" class="fz-12">Beri tahu pengguna lain mengapa Anda sangat menyukai produk ini.</label>
                        </div>
                        <input type="text" name="idProduct" id="idProduct" value="<?= $_GET['id'] ?>" hidden>
                        <button class="btn bg-blue px-3 py-2 text-light float-end fz-12 d-none d-sm-block" type="submit">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>     
        </section>

        <!-- Navbar Bottom -->
        <?php include "partials/navBottom.php" ; ?>
    </div>
    
    <!-- Foot -->
    <?php include "components/foot.php" ; ?>
    <script>
        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }

        var rating = 0;


        $(document).ready(function() {
            $('.inputStar').click(function() {
                console.log($(this).val());
            });
        });
    </script>
</body>

</html>