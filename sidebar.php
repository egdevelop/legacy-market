<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropdown Menu with Search Box | CodingNepal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style-sidebar.css?<?php echo time(); ?>">
</head>

<body>

    <nav class="sidebar">
        <div class="text">Side menu</div>
        <ul>
            <li>
                <a href="#" class="feat-btn">Features</a>
                <ul class="feat-show show">
                    <li><a href="#">pages</a></li>
                    <li><a href="#">Element</a></li>
                </ul>
            </li>
            <li><a href="#" class="mainMenu">Dashboard</a></li>
            <li>
                <a href="#" class="serv-btn">Services</a>
                <ul class="serv-show">
                    <li><a href="#">App Design</a></li>
                    <li><a href="#">Web Design</a></li>
                </ul>
            </li>
            <li><a href="#" class="mainMenu">Portfolio</a></li>
        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d005399.js"></script>
    <script>
    $('.feat-btn').click(function() {
        $('nav ul .feat-show').toggleClass('show');
        $('nav ul .serv-show').removeClass('show1');
    });
    $('.serv-btn').click(function() {
        $('nav ul .serv-show').toggleClass('show1');
        $('nav ul .feat-show').removeClass('show');
    });
    $('.mainMenu').click(function() {
        $('nav ul .feat-show').removeClass('show');
        $('nav ul .serv-show').removeClass('show1');
    });
    $('nav ul li').click(function() {
        $(this).addClass('activeMenuSide').siblings.removeClass('activeMenuSide');
    });
    </script>
</body>

</html>