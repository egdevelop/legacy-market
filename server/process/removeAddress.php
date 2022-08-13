<?php
require_once '../config/db.php';
session_start();

//delete address
$query = mysqli_query($conn, "DELETE FROM address WHERE id = '$_GET[id]'");
if ($query) {
    echo "<script>
    window.location.href='../../alamat.php';
    </script>";
} else {
    echo "<script>
    window.location.href='../../alamat.php';
    </script>";
}