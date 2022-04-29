<?php
$host = "127.0.0.1";
$username = "egdev";
$password = "@egdev";
$db = "legacy-market";
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");
$kemarin = date("Y-m-d", strtotime("yesterday"));
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i:s");
$jam2 = date("H");
$conn = mysqli_connect($host, $username, $password, $db);