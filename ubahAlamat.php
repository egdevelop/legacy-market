<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/server/config/db.php";
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'"));
$a = new rajaongkir();
$kota = $a->get_city();
$kota_array = json_decode($kota, true);
if ($kota_array['rajaongkir']['status']['code'] == 200) :
  $kota_result  = $kota_array['rajaongkir']['results'];
else :
  die('This key has reached the daily limit.');
endif;
$provinces = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
$districts = mysqli_query($conn, "SELECT * FROM districts ORDER BY name ASC");

// add address
if(isset($_POST['name'])) {
    $userid = $_SESSION['userid'];
    $name = $_POST['name'];
    $nohp = $_POST['number'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $city_id = $_POST['city_id'];
    $postcode = $_POST['postcode'];
    $detail = $_POST['detail'];
    $sql = "INSERT INTO address (user_id, name, no, province, city, city_id, district, code, detail, isPrimary) VALUES ('$userid', '$name', '$nohp', '$province', '$city', '$city_id', '$district', '$postcode', '$detail', 0)";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Alamat berhasil ditambahkan'); window.location = 'ubahProfil.php'</script>";
    }else{
        echo mysqli_error($conn);
    }
}
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>
    <title>Ubah Alamat</title>
</head>

<body>

    <div class="body-wrapper">
        <!-- Mobile Navbar -->
        <div class="w-100 position-fixed bg-white z-3 d-block d-sm-none py-4">
            <div class="container">
                <a onclick="history.back()" class="text-dark d-flex align-items-center gap-3">
                    <i class="ri-arrow-left-s-line fz-14"></i>
                    <span class="fz-12 fw-bold fz-14">Ubah Alamat</span>
                </a>
            </div>
        </div>
        <?php include "partials/navbarProfil.php" ?>

        <section class="mtProfil py-2 py-sm-4 px-0 px-sm-4 mb-5">
            <div class="container mb-4">
                <form action="" method="post" id="form">
                    <div class="row d-flex justify-content-between">
                        <span class="fz-12 mb-2">Kontak</span>
                        <input name="name" type="text" class="my-1 fz-12 border-0 bg-white col-12 d-block d-lg-none py-2"/>
                        <input name="number" type="text" class="my-1 fz-12 border-0 bg-white col-12 d-block d-lg-none py-2"/>
                        
                        <span class="fz-12 mb-2 mt-3">Alamat</span>
                        <select name="province" id="select-state" required="true">
                            <option value=""></option>
                            <?php while($p = mysqli_fetch_assoc($provinces)) : ?>
                            <option value="<?= $p['name']; ?>"><?= $p['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <select name="city_id" id="select-state2" required="true">
                            <option value=""></option>
                            <?php foreach ($kota_result as $key => $value) : ?>
                            <option value="<?= $value['city_id']; ?>" onclick="document.getElementById('nama').value = '<?= $value['city_name'] ?>'"><?= $value['city_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="district" id="select-state3" required="true">
                            <option value=""></option>
                            <?php while($k = mysqli_fetch_assoc($districts)) : ?>
                            <option value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="text" class="fz-12 form-control" name="postcode" id="kode" placeholder="Kode Pos">
                        <input type="text" name="city" id="nama" value="" hidden>
                        
                        <span class="fz-12 mb-2 mt-3">Detail Alamat</span>
                        <input name="detail" type="text" class="my-1 fz-12 border-0 bg-white col-12 d-block d-lg-none py-2"/>
                    </div>
                </form>
            </div>
            <div class="position-fixed bottom-0 w-100 bg-blue px-2 py-3" onclick="document.getElementById('nama').value = document.getElementById('select-state2').innerText;document.getElementById('form').submit();">
                <span class="text-light d-flex align-items-center justify-content-center">
                    Simpan
                </span>
            </div>
        </section>
    </div>

    <!-- Foot -->
    <?php include "components/foot.php"; ?>
    <script>
        $('#select-state').selectize({
            sortField: 'text'
        });
        $('#select-state2').selectize({
            sortField: 'text'
        });
        $('#select-state3').selectize({
            sortField: 'text'
        });

        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }
    </script>
</body>

</html>