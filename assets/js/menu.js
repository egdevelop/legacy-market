$(document).ready(function () {
    $('.menu li:has(ul)').click(function (e) {
        e.preventDefault();

        if ($(this).hasClass('activeMenu')) {
            $(this).removeClass('activeMenu');
            $(this).children('ul').slideUp();
        } else {
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activeMenu');
            $(this).addClass('activeMenu');
            $(this).children('ul').slideDown();
        }

        $('.menu li ul li a').click(function () {
            window.location.href = $(this).attr('href');
        })
    });
});