<?php
session_start();
// authenticate
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
    header('Location: /');
} elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == '0') {
    header('Location: /admin/pages/');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">

    <title>Admin | Joco</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/logo.png">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/libs/chartist/dist/chartist.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css?<?php echo time(); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="dist/css/style.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="dist/css/styleChat.css?<?php echo time(); ?>">
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <div class="container mt-5 pt-5">
                <div class="row justify-content-center">
                    <form action="server/login.php" method="POST" class="card col-12 col-lg-5">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="usernameInput" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="usernameInput" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input type="password" name="pw" class="form-control" id="passwordInput">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Joco-Production
            </footer>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>