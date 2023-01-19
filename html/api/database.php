<?php
echo '<div>';

try {
    $link = mysqli_connect('localhost', 'root', file_get_contents('../../sql/sql_password.txt'), 'web_database');

    if ($link == false) {
        echo ("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "   <br>");
    } else {
        echo ("Соединение установлено успешно<br>");
    }


    try {
        mysqli_set_charset($link, "utf8");
        $sql = 'select * from users';
        $result = mysqli_query($link, $sql);
        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }
    } catch (Throwable $e) {
        echo "Ошибка" . $e;
    }

    while ($row = mysqli_fetch_array($result)) {
        echo $row['name'] . "<br>";
    }
} catch (Throwable $e) {
    echo "Was error: " . $e->getMessage();
}
echo '</div>';