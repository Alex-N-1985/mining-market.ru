<?php

    include_once "./models/users.php";

    echo "<h3>Backend api-интерфейс портала</h3>";
    echo "<p>Для ввода запросов используются: <ul>
        <li>Параметры url-запроса;</li>
        <li>GET-параметры;</li>
    </ul></p>";

    $users = _Users::getUsersFromDB();
    var_dump($users);
?>