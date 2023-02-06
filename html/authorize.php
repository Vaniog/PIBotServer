<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__ . "/api/auth/UsersDatabase.php");

$errors = [];

function Register()
{
    global $errors;

    if (!isset($_POST['nickname'])) {
        $errors[] = "Enter name!";
    } else if (strlen($_POST['nickname']) < 4) {
        $errors[] = "Too short name (minimum 4 letters)";
    }
    if (!isset($_POST['password'])) {
        $errors[] = "Enter password!";
    } else if (strlen($_POST['password']) < 4) {
        $errors[] = "Too short password (minimum 4 letters)";
    }


    if (count($errors) != 0) {
        return;
    }

    $db = new UsersDatabase();
    if ($db->UserExists($_POST['nickname'])) {
        $errors[] = "User with this nickname exists";
        return;
    }

    $db->UserAdd($_POST['nickname'], $_POST['password']);

    $_SESSION['User'] = $db->UserGet($_POST['nickname']);
}

function Login()
{
    global $errors;
    if (!isset($_POST['nickname'])) {
        $errors[] = "Enter name!";
    }
    if (!isset($_POST['password'])) {
        $errors[] = "Enter password!";
    }

    if (count($errors) != 0) {
        return;
    }

    $db = new UsersDatabase();
    if (!$db->UserLogin($_POST['nickname'], $_POST['password'])) {
        $errors[] = "Wrong login";
        return;
    }


    $_SESSION['User'] = $db->UserGet($_POST['nickname']);
}

if ($_POST != null && isset($_POST['action'])) {
    if ($_POST['action'] == 'register')
        Register();
    else if ($_POST['action'] == 'login') {
        Login();
    }
}


?>


<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet">
<link rel="stylesheet" href="css/authorize.css">

<head>
    <link rel="icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-smileys/48/10103-robot-face-icon.png">
    <title>
        Authorization
    </title>
</head>
<body>

<?php
if (isset($_SESSION['User']['nickname'])) {
    echo "<div class='reg_as'>Вы зарегистрированы как "
        . $_SESSION['User']['nickname'] .
        "</div>";
}
?>

<div class="reg">
    <div class="reg_title">Authorization</div>
    <form class="reg_form" action="authorize.php" method="POST">
        <input type="hidden" name="action" value="register">
        <label>
            <input type="text" id="name_input" name="nickname" placeholder="Enter nickname"
                   value='<?php if (isset($_POST['nickname'])) echo $_POST['nickname'] ?>'>
        </label>
        <label>
            <input type="text" id="password_input" name="password" placeholder="Enter password"
                   value='<?php if (isset($_POST['password'])) echo $_POST['password'] ?>'>
        </label>
        <input type="submit" name="action" value="login">
        <input type="submit" name="action" value="register">
    </form>

    <?php
    if (count($errors) != 0) {
        echo '<div class="reg_errors">';
        foreach ($errors as $elem) {
            echo $elem . "<br>";
        }
        echo '</div>';
    }
    ?>
</div>

<?php
if (isset($_SESSION['User']['nickname'])) {
    echo "<a href='http://" . $_SERVER["SERVER_NAME"] . "'>Главная страница</a>";
}
?>

</body>
</html>