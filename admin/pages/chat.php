<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/functions.php';

if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
};
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
    header('Location: /');
};

$sql = "SELECT * FROM chats WHERE sender_id = 0 OR receiver_id = 0 ORDER BY timestamp DESC";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include "../partials/meta.php"; ?>
    <title>Chat | Joco</title>
    <?php include "../partials/head.php"; ?>
</head>

<body>
    <?php include "../partials/loader.php"; ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include "../partials/header.php"; ?>
        <?php include "../partials/sidebar.php"; ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/admin/pages/" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chat</h4>
                            </div>
                            <div class="container d-flex align-items-start wrapperChat p-4 gap-5">
                                <!-- Chat -->
                                <div class="nav nav-pills" style="overflow-y: scroll; border: 1px solid #eee" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <!-- <div class="nav-link active d-flex justify-content-between gap-3" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <img src="../assets/img/products1.jpg" alt="" class="imgChat">
                                        <div class="d-flex flex-column gap-2">
                                            <span class="fz-12 fw-bold">Topi Fashion Anak Laki.....</span>
                                            <span class="fz-12">Halo kak,ada yang bisa dibantu ?</span>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="fz-12 text-dark">19:01 AM</span>
                                            <span class="fz-12 text-info fw-bold">Selected</span>
                                        </div>
                                    </div> -->
                                    <?php 
                                    $exist = [];
                                    $first = '';
                                    $no = 1;
                                    foreach($data as $a) :
                                        if($a['sender_id'] == 0) {
                                            continue;
                                        }
                                        if(!in_array($a['sender_id'], $exist)) {
                                            array_push($exist, $a['sender_id']);
                                        } else {
                                            continue;
                                        }
                                        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '". $a['sender_id'] ."'"));
                                        if($no == 1) {
                                            $first = $user['name'];
                                        }
                                        $date = explode(" ", $a['timestamp'])[0];
                                        $date1 = strtotime($date);
                                        $now = strtotime(date('Y-m-d'));
                                        $diffInSeconds = $now - $date1;
                                        $diffInDays = $diffInSeconds / 86400;
                                        if($date1 == $now) {
                                            $hour = date("H:i", strtotime($a['timestamp']));
                                        } elseif($diffInDays == 1) {
                                            $hour = "Yesterday";
                                        } else {
                                            $hour = $diffInDays . " days ago";
                                        }
                                    ?>
                                    <div class="nav-link w-100 <?= ($no == 1) ? 'active' : '' ;?> d-flex justify-content-between gap-3" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" onclick="changeTo(<?= $a['sender_id'] ?>, '<?= $user['name'] ?>')" aria-controls="v-pills-profile" aria-selected="false">
                                        <div class="d-flex gap-2 align-items-start">
                                            <img src="<?= $user['photo'] ?>" alt="" class="imgChat">
                                            <div class="d-flex flex-column gap-2">
                                                <span class="fz-12 fw-bold"><?= $user['name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="fz-10 text-dark"><?= $hour ?></span>
                                        </div>
                                    </div>
                                    <?php $no++; endforeach; ?>
                                </div>
                                <!-- Chat Detail -->
                                <div class="tab-content wrapperChat" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active msger position-relative" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <header class="msger-header">
                                            <div class="msger-header-title">
                                                <i class="fas fa-comment-alt"></i> <span id="nama"><?= $first ?></span>
                                            </div>
                                        </header>
                                        <main class="msger-chat" id="chat-field"></main>
                                        <form class="msger-inputarea">
                                            <input type="text" class="msger-input" placeholder="Enter your message...">
                                            <button type="submit" class="msger-send-btn">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../partials/foot.php'; ?>

    <script>
        const msgerForm = get(".msger-inputarea");
        const msgerInput = get(".msger-input");
        const msgerChat = get(".msger-chat");

        const PERSON_NAME = "<?= $data['name'] ?>";
        const PERSON_ROLE = "<?= $data['role'] ?>";
        // const scrollValue = 0;
        
        var to = "<?= $exist[0] ?>";
        var currentPosition = $('#chat-field').scrollTop();
        var lastPosition = msgerChat.scrollTop;
        var nama = document.getElementById('nama');

        msgerForm.addEventListener("submit", event => {
            event.preventDefault();

            const msgText = msgerInput.value;
            if (!msgText) return;

            appendMessage(0, to, msgText);
            
            msgerInput.value = "";

        });

        $('#chat-field').scroll(function() {
            currentPosition = $(this).scrollTop();
            if(currentPosition > lastPosition) {
                currentPosition = lastPosition;
            }
        });

        function changeTo(id, name) {
            to = id;
            currentPosition = $('#chat-field').scrollTop();
            lastPosition = msgerChat.scrollTop;
            nama.innerHTML = name;
            console.log(to);
        }

        function appendMessage(from, to, text) {
            $.ajax({
                url: "/server/ajax/insertChat.php",
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
            var id = 0;
            $.ajax({
                url: "/server/ajax/loadChat.php",
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
                    console.log(to, id);
                },
                error: function (jqXHR, exception) {
                    console.log(jqXHR);
                    console.log(to, id);
                }
            });
        }

        const a = setInterval(() => {
            loadMessages();
        }, 200);

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
    </script>
</body>

</html>