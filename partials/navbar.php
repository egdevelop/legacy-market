<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['userid'])){
    $cart = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM carts WHERE id_user = '$_SESSION[userid]'"));
}else{
    $cart = "";
}
?>
<!-- Mobile Navbar -->
<div class="main-nav w-100 position-fixed z-3 d-block d-sm-none pb-4">
    <div class="container">
        <form class="pb-1 pt-4 d-flex gap-3 align-items-center justify-content-center nosubmit" action="search.php" method="get">
            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search" name="search">
            <div class="position-relative">
                <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1">
                    <i class="ri-shopping-cart-line"></i>
                    <span class="numCart d-flex justify-content-center align-items-center">
                        <span class="fz-12"><?= $cart ?></span>
                    </span>
                </a>
            </div>
            <a href="chat.php" class="iconNavbar z-1"><i class="ri-customer-service-2-line"></i></a>
        </form>
    </div>
</div>

<!-- Desktop Navbar -->
<div class="bg-blue pt-2 pb-2 w-100 position-fixed z-3 d-none d-sm-block">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="left d-flex gap-2 align-items-center">
                <span class="fz-12 text-light">Ikuti kami di</span>
                <span class="text-light"><i class="ri-instagram-fill"></i></span>
            </div>
            <div class="cursor-pointer kanan d-flex align-items-center gap-2 position-relative">
                <?php if (!isset($_SESSION['userid'])) : ?>
                <a href="login.php" class="fz-12 text-light">Login</a>
                <?php else : ?>
                    <?php $profil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'")) ?>
                <div class="dropdown">
                    <div class="dropbtn d-flex align-items-center me-2">
                        <img src="<?= $profil['photo'] ?>" alt="" class="imgSmall">
                        <span class="fz-12 text-light ms-2"><?= $profil['name'] ?></span>
                    </div>
                    <div class="dropdown-content">
                        <a href="profilDetail.php" class="listProfile w-100 fz-12 m-auto">
                            Akun saya
                        </a>
                        <a href="pesanan-saya.php" class="listProfile w-100 fz-12 m-auto">
                            Pesanan saya
                        </a>
                        <a href="server/Login/logout.php" class="fz-12 m-auto listProfile w-100">
                            Logout
                        </a>
                        <!-- <div class="panah"></div> -->
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <form class="mt-2 d-flex gap-5 align-items-center justify-content-center nosubmit" autocomplete="off" action="search.php" method="get">
            <a href="index.php">
                <img src="assets/img/logo.svg" alt="Logo" class="logo">
            </a>
            <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search" name="keyword">
            <div class="position-relative">
                <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1">
                    <i class="ri-shopping-cart-line"></i>
                    <span class="numCart d-flex justify-content-center align-items-center">
                        <span class="fz-12"><?= $cart ?></span>
                    </span>
                </a>
            </div>
            <a href="chat.php" class="ms-3 text-light iconNavbar z-1"><i class="me-3 ri-customer-service-2-line"></i></a>
        </form>
    </div>
</div>