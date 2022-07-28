<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
session_start();

$now = new DateTime();
$future_date = new DateTime('2022-07-21');

$interval = $future_date->diff($now)->format("%h jam");
$a = date('Y-m-d');

echo $interval;

$b = ",1,3,2,4,2,4";
$c = explode(',', $b);
array_shift($c);
print_r($c);

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>
<body>
  <select id="select-state" placeholder="Pick a state...">
    <option value="">Select a state...</option>
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
  </select>

    <script>
        $('#select-state').selectize({
        sortField: 'text'
        });
    </script>
</body>
</html>