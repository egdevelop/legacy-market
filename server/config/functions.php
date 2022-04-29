<?php
require $_SERVER['DOCUMENT_ROOT'] . '/server/config/db.php';

// Functions
function censoredEmail($email)
{
    $count = strlen($email) - 12;
    $output = substr_replace($email, str_repeat('*', $count), 2, $count);
    return $output;
}

function saveProfile($profile, $email)
{
    global $conn;

    $name = $profile['name'];
    $gender = $profile['gender'];
    $ttl = $profile['tanggal'] . " " . $profile['bulan'] . " " . $profile['tahun'];

    // foto acan

    mysqli_query($conn, "UPDATE users SET name = '$name', gender = '$gender', ttl = '$ttl'");
    if (mysqli_affected_rows($conn) > 0) {
        return "Berhasil memperbaharui profil";
    } else {
        return "Gagal memperbaharui profil";
    }
}

function tambahAlamat($datas, $userid) {
    global $conn;

    $name = $datas['name'];
    $nohp = $datas['nohp'];
    $address1 = $datas['address1'];
    $address2 = $datas['address2'];

    mysqli_query($conn, "INSERT INTO addresses (userid, name, nohp, address1, address2) VALUES ('$userid', '$name', '$nohp', '$address1', '$address2')");
    if (mysqli_affected_rows($conn) > 0) {
        return "Berhasil menambahkan/mengubah alamat";
    } else {
        return "Gagal menambahkan/mengubah alamat";
    }
}
?>