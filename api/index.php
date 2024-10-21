<?php

    include_once "./init.php";

    echo "<h3>Backend api-интерфейс портала</h3>";
    echo "<p>Для ввода запросов используются: <ul>
        <li>Параметры url-запроса;</li>
        <li>GET-параметры;</li>
    </ul></p>";
    $data = loadConfigData("config.json");
    var_dump($data);
?>