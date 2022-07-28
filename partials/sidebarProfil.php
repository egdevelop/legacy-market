<?php
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'")); ?>
<div class="col-0 col-lg-2 left bg-white borad-10 p-4 d-none d-lg-block">
    <div class="d-flex gap-2">
        <div class="profile">
            <img src="<?= ($data['photo']) ?  $data['photo'] : "assets/img/profile.jpg" ?>" alt="" class="profileImg">
        </div>
        <div class="d-flex flex-column">
            <span class="fz-12 fw-bold"><?= ($data['name']) ?  $data['name'] : "Naufal" ?></span>
        </div>
    </div>
    <div class="container-menu mt-4">
        <nav>
            <ul class="menu">
                <li class="fz-12">
                    <a onclick="location.href = 'profilDetail.php';" class="cursor-pointer feat-btn activeMenu">
                        <span class="blue"><i class="ri-user-line"></i></span>
                        <span>Akun saya</span>
                    </a>
                    <ul class="feat-show show">
                        <?php $url = explode('/', $_SERVER['REQUEST_URI'])[1]; ?>
                        <li><a href="profilDetail.php" <?= ($url == "profilDetail.php") ? "class='activeSubmenu'" : ''; ?>>Profil</a></li>
                        <li><a href="alamat.php" <?= ($url == "alamat.php") ? "class='activeSubmenu'" : ''; ?> >Alamat</a></li>
                        <!-- <li><a href="ubah-sandi.php" <?= ($url == "ubah-sandi.php") ? "class='activeSubmenu'" : ''; ?> >Ubah sandi</a></li> -->
                        <li><a href="member.php" <?= ($url == "member.php") ? "class='activeSubmenu'" : ''; ?> >Member</a></li>
                    </ul>
                </li>
                <li class="fz-12">
                    <a href="pesanan-saya.php" class="mainMenu">
                        <span class="blue"><i class="ri-file-list-3-line"></i></span>
                        <span>Pesanan saya</span>
                    </a>
                </li>
                <!-- <li class="fz-12">
                    <a href="notifikasi.php" class="mainMenu">
                        <span class="blue"><i class="ri-notification-4-line"></i></span>
                        <span>Notifikasi</span>
                    </a>
                </li> -->
                <li class="fz-12">
                    <a href="voucher-akun.php" class="mainMenu">
                        <span class="blue"><i class="ri-coupon-2-line"></i></span>
                        <span>Voucher</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>