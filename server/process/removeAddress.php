<?php
require_once '../config/db.php';
session_start();

//delete address
$query = mysqli_query($conn, "DELETE FROM address WHERE id = '$_GET[id]'");
if ($query) {
    echo "<script>
    alert('Alamat berhasil dihapus');
    window.location.href='../../alamat.php';
    </script>";
} else {
    echo "<script>
    alert('Alamat gagal dihapus');
    window.location.href='../../alamat.php';
    </script>";
}