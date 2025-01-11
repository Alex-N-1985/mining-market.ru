<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админпанель</a> > Список зарегистрированных пользователей </p>
<h3>Список зарегистрированных пользователей</h3>
<?php
    if ($users != null){
        echo "<table class='adminview'>
                <tr><td>ID</td><td>Логин</td><td>EMail</td><td>Дата Регистрации</td><td>Дата авторизации</td><td>Статус</td><td></td></tr>";
        foreach ($users as $item){
            $cont = "<tr><td><a href='http://".$rout->domain.$rout->start."/admin/viewuser/".$item->ID."'>".$item->ID."</a></td>
                    <td>".$item->login."</td><td>".$item->email."</td><td>".$item->date_reg."</td>
                    <td>".$item->date_log."</td><td>";
            switch ($item->secure_level){
                case 0: $cont .= "Забанен.</td>"; break;
                case 1: $cont .= "Администратор.</td>"; break;
                case 2: $cont .= "Пользователь.</td>"; break;
            }
            $cont .= "<td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deleteuser/".$item->ID."'>
                <input type='submit' value='Удалить'></form></td></tr>";
            echo $cont;
        }
        echo "</table>";
    } else {
        echo "<p>Список пользователей пуст</p>";
    }
?>