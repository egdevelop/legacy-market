<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));

if(isset($_POST['sandi1'])) {
    $query = "UPDATE users SET password = '" . $_POST['sandi1'] . "' WHERE id = " . $_SESSION['userid'];
    mysqli_query($conn, $query);
    echo "true";
    header('Location: /');
}


?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Ubah Sandi</title>
</head>

<body>

    <div class="body-wrapper">
        <?php include "partials/navbar.php" ?>

        <section class="py-2 py-sm-4 px-0 px-sm-4 mt-profile mb-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                <?php include "partials/sidebarProfil.php" ?>
                    <div class="col-9 right bg-white borad-10 p-4">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h6 class="fw-600">Ubah Sandi</h6>
                                <p class="fz-14 abu">Untuk keamanan akun Anda, mohon untuk tidak menyebarkannya ke orang
                                    lain.
                                </p>
                            </div>
                        </div>
                        <hr class="my-2 py-0">
                        <div class="row d-flex gap-2 d-flex justify-content-between">
                            <form action="" method="post" id="form">
                            <div class="col-12 left">
                                    <?php if($data['password'] != null) : ?>
                                    <div class="row d-flex align-items-center my-3">
                                        <div class="col-2">
                                            <label for="sandi1" class="fz-12 col-form-label">Sandi saat ini</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="sandi" class="form-control fz-12">
                                        </div>
                                        <div class="col-4">
                                            <a href="lupa-sandi.php" class="text-dark fz-12 w-100">Lupa Password?</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="row align-items-center my-3">
                                        <div class="col-2">
                                            <label for="sandi2" class="fz-12 col-form-label">Sandi yang baru</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="sandi1" name="sandi1" class="form-control fz-12">
                                        </div>
                                    </div>
                                    <div class="row align-items-center my-3">
                                        <div class="col-2">
                                            <label for="confirmSandi" class="fz-12 col-form-label">Konfirmasi sandi</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="sandi2" class="form-control fz-12">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-6">
                                            <a href="javascript:void(0)" id="confirm" class="btn text-light fz-12 bg-blue px-4 py-2 borad-10 w-auto">Konfirmasi</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        $('.feat-btn').click(function() {
            $('nav ul .feat-show').toggleClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('.serv-btn').click(function() {
            $('nav ul .serv-show').toggleClass('show1');
            $('nav ul .feat-show').removeClass('show');
        });
        $('.mainMenu').click(function() {
            $('nav ul .feat-show').removeClass('show');
            $('nav ul .serv-show').removeClass('show1');
        });
        $('nav ul li').click(function() {
            $(this).addClass('activeMenuSide').siblings.removeClass('activeMenuSide');
        });

        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }

        const confirm = document.getElementById('confirm');
        confirm.addEventListener('click', function() {
            console.log('clicked');
            var sandi1 = document.getElementById('sandi1').value;
            var sandi2 = document.getElementById('sandi2').value;
            if(sandi1 != null) {
                if(sandi1 == sandi2) {
                    document.getElementById('form').submit();
                }
            } else {
                
            }
        });

    </script>
</body>

</html>