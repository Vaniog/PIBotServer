<!DOCTYPE html>
<?php
session_start();
$is_admin = false;
if (isset($_SESSION['User'])) {
    echo "<div class='reg_as'>Вы зарегистрированы как "
        . $_SESSION['User']['name'] .
        "</div>";
    $is_admin = true;
}/* else {
    header('Location: http://' . $_SERVER["SERVER_NAME"] . '/admin/authorize.php');
}*/
?>

<html lang="en">

<head>
    <link rel="icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-smileys/48/10103-robot-face-icon.png">
    <title>
        BotLaunch
    </title>
</head>

<style>
    .button {
        font-size: 2em;
        width: 200px;
        height: 100px;
        border-radius: 20px;
        border: none;
    }

    .button:hover {
        transform: scale(0.97);
    }
</style>

<body>

<div style="display: flex; flex-direction: column; align-items: center">

    <h1>
        Press to ping
    </h1>

    <div id="api_answer"></div>
    <div>
        <button id="btn_ping" class="button">PING</button>
        <?php
        if ($is_admin) {
            ?>
            <button id="btn_launch" class="button">LAUNCH</button>
            <button id="btn_kill" class="button">KILL</button>
            <?php
        } ?>
    </div>
    <a href="https://t.me/Vaniog_bot">Бот</a>
    <a href="authorize.php">Авторизация</a>
    <?php if ($is_admin) echo '<a href="admin/users.php">Пользователи</a>';
    ?>
</div>

<script type="module" src="js/main.js"></script>
</body>

</html>