<?php
session_start();

if(isset($_SESSION['userid']) && $_SESSION['userid'] == '0') {
    session_destroy();
    header('Location: /admin/');
} else {
    header('Location: /');
}