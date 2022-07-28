<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));

if(!$_SESSION['userid']) {
    header('Location: /');
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "components/head.php"; ?>

    <title>Chat</title>
</head>

<body class="body-chat">

    <div class="body-wrapper bg-white">
        <!-- Mobile Navbar -->
        <div class="bg-blue text-light py-4 d-block d-md-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <a onclick="history.back()" class="text-light left d-flex align-items-center gap-2">
                        <i class="ri-arrow-left-s-line"></i>
                        <span class="fw-bold fz-14">Chat</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Desktop Navbar -->
        <div class="bg-blue pt-2 pb-2 w-100 position-fixed z-3 d-none d-sm-block">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="left d-flex gap-2 align-items-center">
                        <span class="fz-12 text-light">Ikuti kami di</span>
                        <span class="text-light"><i class="ri-instagram-fill"></i></span>
                    </div>
                    <div class="cursor-pointer kanan d-flex align-items-center gap-2 position-relative">
                        <?php if (!isset($_SESSION['userid'])) : ?>
                        <a href="daftar.php" class="fz-12 text-light">Daftar</a>
                        <span class="fz-12 text-light">|</span>
                        <a href="login.php" class="fz-12 text-light">Login</a>
                        <?php else : ?>
                            <?php $profil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[userid]'")) ?>
                        <div class="dropdown">
                            <div class="dropbtn d-flex align-items-center me-2">
                                <img src="<?= $profil['photo'] ?>" alt="" class="imgSmall">
                                <span class="fz-12 text-light ms-2"><?= $profil['name'] ?></span>
                            </div>
                            <div class="dropdown-content">
                                <a href="profilDetail.php" class="listProfile w-100 fz-12 m-auto">
                                    Akun saya
                                </a>
                                <a href="pesanan-saya.php" class="listProfile w-100 fz-12 m-auto">
                                    Pesanan saya
                                </a>
                                <a href="server/Login/logout.php" class="fz-12 m-auto listProfile w-100">
                                    Logout
                                </a>
                                <!-- <div class="panah"></div> -->
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <form class="mt-2 d-flex gap-5 align-items-center justify-content-center nosubmit">
                    <a href="index.php">
                        <img src="assets/img/logo.svg" alt="logo" class="logo">
                    </a>
                    <input class="nosubmit z-1 form-control" type="search" placeholder="Cari produk" aria-label="Search">
                    <a href="keranjang.php" class="ms-3 text-light iconNavbar z-1"><i class="ri-shopping-cart-line"></i></a>
                    <a href="chat.php" class="ms-3 text-light iconNavbar z-1"><i class="me-3 ri-customer-service-2-line"></i></a>
                </form>
            </div>
        </div>

        <!-- Chat Admin -->
        <div class="mt-2 mt-lg-4 mb-5 pt-1">
            <section class="wrapperChat">
                <section class="msger">
                    <header class="msger-header">
                        <div class="msger-header-title">
                        <i class="fas fa-comment-alt"></i> Chat Admin Sekarang
                        </div>
                    </header>

                    <main class="msger-chat" style="padding: 1rem;" id="chat-field">
                        
                    </main>

                    <form class="msger-inputarea">
                        <input type="text" class="msger-input" placeholder="Enter your message...">
                        <button type="submit" class="msger-send-btn">Send</button>
                    </form>
                </section>
            </section>
        </div>
        <?php include "partials/navBottom.php" ?>
        
        <!-- Foot -->
        <?php include "components/foot.php"; ?>
    </div>
    <script>
        const msgerForm = get(".msger-inputarea");
        const msgerInput = get(".msger-input");
        const msgerChat = get(".msger-chat");

        const PERSON_NAME = "<?= $data['name'] ?>";
        const PERSON_IMG = "<?= $data['photo'] ?>";
        const PERSON_ROLE = "<?= $data['role'] ?>";
        const scrollValue = 0;
        
        var currentPosition = $('#chat-field').scrollTop();
        var lastPosition = msgerChat.scrollTop;

        var to = <?= (isset($_GET['to'])) ? $_GET['to'] : "false"; ?>;

        msgerForm.addEventListener("submit", event => {
            event.preventDefault();

            const msgText = msgerInput.value;
            if (!msgText) return;

            if(PERSON_ROLE != 1) {
                appendMessage(PERSON_NAME, 0, msgText);
            } else {
                appendMessage("Admin", to, msgText);
            }
            msgerInput.value = "";

        });

        $('#chat-field').scroll(function() {
            currentPosition = $(this).scrollTop();
            if(currentPosition > lastPosition) {
                currentPosition = lastPosition;
            }
        });

        function appendMessage(name, to, text) {
            $.ajax({
                url: "server/ajax/insertChat.php",
                type: "POST",
                data: {
                    name: name,
                    to: to,
                    text: text
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }


        // loadMessages();
        function loadMessages() {
            if(PERSON_ROLE != 1) {
                var id = "<?= $_SESSION['userid'] ?>";
            } else {
                var id = 0;
            }
            $.ajax({
                url: "server/ajax/loadChat.php",
                type: "POST",
                data: {
                    id: id,
                    to: to
                },
                success: function(response) {
                    if(currentPosition == lastPosition) {
                        msgerChat.scrollTop += 500;
                        lastPosition = msgerChat.scrollTop;
                    }
                    $(".msger-chat").html(response);
                }
            });
        }

        setInterval(() => {
            loadMessages();
        }, 100);

        // Utils
        function get(selector, root = document) {
        return root.querySelector(selector);
        }

        function formatDate(date) {
        const h = "0" + date.getHours();
        const m = "0" + date.getMinutes();

        return `${h.slice(-2)}:${m.slice(-2)}`;
        }

        function random(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
        }


        document.addEventListener("DOMContentLoaded", function(event) {
            var navCustom = document.querySelectorAll('.nav-link-custom');

            if (navCustom) {

                navCustom.forEach(function(el, key) {

                    el.addEventListener('click', function() {
                        console.log(key);

                        el.classList.toggle("activePesanan");

                        navCustom.forEach(function(ell, els) {
                            if (key !== els) {
                                ell.classList.remove('activePesanan');
                            }
                            console.log(els);
                        });
                    });
                });
            }
        });

        var mainNav = document.querySelector('.main-nav');

        window.onscroll = function() {
            windowScroll();
        };

        function windowScroll() {
            mainNav.classList.toggle("bg-blue", mainNav.scrollTop > 50 || document.documentElement.scrollTop > 50);
        }
    </script>
</body>

</html>