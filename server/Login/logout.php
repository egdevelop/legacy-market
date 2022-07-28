<?php
require_once 'google-login.php';

session_start();

$client->revokeToken();
session_unset();
session_destroy();

header('Location: ../../index.php');
exit;