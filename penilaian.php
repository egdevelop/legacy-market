<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
if(!isset($_SESSION['userid'])){
    header('Location: /login.php');
}
$photo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id_product = '$_GET[id]'"))['photo'];
$reviews = mysqli_query($conn, "SELECT * FROM reviews WHERE id_product = '$_GET[id]'");
$r5 = 0; $r4 = 0; $r3 = 0; $r2 = 0; $r1 = 0;
$c = 0; $m = 0;
$sum = 0;
while($row = mysqli_fetch_assoc($reviews)){
    if($row['rate'] == 5) {
        $r5++;
    } elseif($row['rate'] == 4) {
        $r4++;
    } elseif($row['rate'] == 3) {
        $r3++;
    } elseif($row['rate'] == 2) {
        $r2++;
    } elseif($row['rate'] == 1) {
        $r1++;
    }
    if($row['review']) {
        $c++;
    }
    if($row['photo']) {
        $m++;
    }
    $sum += $row['rate'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$row[id_user]'"));
    $review[] = [
        'userImg' => $user['photo'],
        'id' => $row['id'],
        'name' => $user['name'],
        'rate' => $row['rate'],
        'review' => $row['review'],
        'photo' => $row['photo']
    ];
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    <title>Detail Products</title>
</head>

<body>

    <div class="body-wrapper">
        <div class="bg-white pt-4 px-lg-4 pb-3">
            <div class="container">
                <div class="d-flex gap-2 justify-content-between align-items-center">
                    <a onclick="history.back()" class="text-dark d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line fz-14"></i>
                        <span class="fz-14 fw-600">
                            Penilaian
                        </span>
                    </a>
                    <div class="right">
                        <img src="<?= $photo ?>" alt="" class="imgVariasi">
                    </div>
                </div>
                <hr class="my-2 py-0">
                <div class="row bg-pink p-4 mt-3 d-none d-lg-flex align-items-center justify-content-start">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-start flex-column">
                            <div class="left ms-2">
                                <span class="fz-16 fw-700 yellow"><?= $sum / count($reviews) ?></span>
                                <span class="fz-12 fw-500 yellow">dari 5</span>
                            </div>
                            <div class="right">
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><i class="ri-star-fill"></i></span>
                                <span class="fz-13 yellow"><?= $sum / count($reviews) ?>/5</span>
                                <span class="fz-13 yellow">(<?= count($reviews) ?> Ulasan)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="all" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Semua</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="5" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">5 Bintang (<?= $r5 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="4" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">4 Bintang (<?= $r4 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="3" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">3 Bintang (<?= $r3 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="2" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">2 Bintang (<?= $r2 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="1" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">1 Bintang (<?= $r1 ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="komentar" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Komentar (<?= $c ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="media" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Dengan Media (<?= $m ?>)</span>
                        </label>
                        <label class="card-ulasan m-1">
                            <input type="radio" name="radioUlasan" class="radio-ulasan" value="member" />
                            <span class="radio-btn variasi px-3 py-1 fz-10">Member (1)</span>
                        </label>
                    </div>
                </div>
                <div class="asd">
                    <?php
                    foreach($review as $r) :
                    ?>
                    <div class="row d-flex my-4 ms-lg-4">
                        <div class="col-1 profile">
                            <img src="<?= $r['userImg'] ?>" alt="" class="profileImg">
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <span class="fz-10"><?= $r['name'] ?></span>
                            <div class="star">
                                <?php for($i = 1; $i <= $r['rate']; $i++) : ?>
                                    <span class="fz-10 yellow"><i class="ri-star-fill"></i></span>
                                <?php endfor; ?>
                            </div>
                            <span class="fz-12 mt-3">
                                <?= $r['review'] ?>
                            </span>
                            <div class="d-flex gap-2">
                                <img src="<?= $r['photo'] ?>" alt="" class="imgUlasan mt-3">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var navCustom = document.querySelectorAll('.nav-link-custom');

        if (navCustom) {

            navCustom.forEach(function(el, key) {

                el.addEventListener('click', function() {
                    console.log(key);

                    el.classList.toggle("activeDetailProduk");

                    navCustom.forEach(function(ell, els) {
                        if (key !== els) {
                            ell.classList.remove('activeDetailProduk');
                        }
                        console.log(els);
                    });
                });
            });
        }
    });

    // Show Hide Member Features
    function hide() {
        document.getElementById("hide1").classList.add("d-none");
        document.getElementById("hide2").classList.add("d-none");
        document.getElementById("hide3").classList.add("d-none");
        document.getElementById("hide4").classList.add("d-none");
    }

    function show() {
        document.getElementById("hide1").classList.add("d-block");
        document.getElementById("hide2").classList.add("d-block");
        document.getElementById("hide3").classList.add("d-block");
        document.getElementById("hide4").classList.add("d-block");
        document.getElementById("hide1").classList.remove("d-none");
        document.getElementById("hide2").classList.remove("d-none");
        document.getElementById("hide3").classList.remove("d-none");
        document.getElementById("hide4").classList.remove("d-none");
    }

    // Navbar Scroll
    var mainNav = document.querySelector('.main-nav');

    window.onscroll = function() {
        windowScroll();
    };

    function windowScroll() {
        mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
    }

    const radios = document.querySelectorAll('.radio-ulasan');
        const id = <?= $_GET['id'] ?>;
        radios.forEach(function(radio) {
            radio.addEventListener('click', function() {
                $.ajax({
                    url: 'server/ajax/getUlasan.php',
                    type: 'POST',
                    data: {
                        id: id,
                        value: radio.value
                    },
                    success: function(data) {
                        $('.asd').html(data);
                    }
                });
            });
        });

    </script>
</body>

</html>