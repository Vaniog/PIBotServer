<!DOCTYPE html>
<html lang="en">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet">
<body>

<?php
session_start();
require_once(__DIR__ . "/../api/auth/UsersDatabase.php");
$db = new UsersDatabase();

if (isset($_SESSION['User'])) {
    echo "You " . $_SESSION['User']['name'] . "<br>";
    $_SESSION['User'] = $db->UserGet($_SESSION['User']['name']);
}
?>


<?php
if (isset($_SESSION['User']) && $_SESSION['User']['is_admin']) {
    ?>

    You admin


    <?php
    echo "<table border='1'>";
    $all_users = $db->AllUsers();
    echo "<tr>
        <td>ID</td>
        <td>Name</td>
        <td>Password</td>
        <td>IsAdmin</td>
    </tr>";
    while ($user = mysqli_fetch_assoc($all_users)) {
        echo "<tr>";
        foreach ($user as &$column) {
            echo "<td>$column</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

} else {
    ?>

    You arent admin

    <?php
}
?>

</body>
</html>
