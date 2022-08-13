<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = " . $_SESSION['userid']));
if(!$_SESSION['userid']) {
    header('Location: /login.php');
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
        <?php include "partials/navbarProfil.php" ?>

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
                        <input type="text" class="msger-input" placeholder="Enter your message..." autofocus>
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

        const PERSON_ID = "<?= $data['id'] ?>";
        const PERSON_IMG = "<?= $data['photo'] ?>";
        const PERSON_ROLE = "<?= $data['role'] ?>";
        const scrollValue = 0;
        
        var currentPosition = $('#chat-field').scrollTop();
        var lastPosition = msgerChat.scrollTop;

        var to = 0;

        msgerForm.addEventListener("submit", event => {
            event.preventDefault();

            const msgText = msgerInput.value;
            if (!msgText) return;

            appendMessage(PERSON_ID, 0, msgText);
            msgerInput.value = "";

        });

        $('#chat-field').scroll(function() {
            currentPosition = $(this).scrollTop();
            if(currentPosition > lastPosition) {
                currentPosition = lastPosition;
            }
        });

        function appendMessage(from, to, text) {
            $.ajax({
                url: "server/ajax/insertChat.php",
                type: "POST",
                data: {
                    from: from,
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
            $.ajax({
                url: "server/ajax/loadChat.php",
                type: "POST",
                data: {
                    id: PERSON_ID,
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