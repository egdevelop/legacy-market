<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
session_start();
$text = '1 month';
echo date("Y-m-d", strtotime($text));
?>
