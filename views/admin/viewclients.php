<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> > Cтатьи</p>
<h3>Просмотр данных клиентов</h3>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/addclient">Добавить клиента</a></p>
<?php 
    if ($clts != null){
        echo "<table class='adminview'>
                <tr><td>ID</td><td>Название</td><td>Адрес</td><td>Телефон</td><td>Тип Клиента</td><td>Пользователь</td><td></td></tr>";
        foreach ($clts as $item){
            echo "<tr><td><a href='http://".$rout->domain.$rout->start."/admin/viewclient/".$item->ID."'>".$item->ID."</a></td>
                    <td>".$item->name."</td>
                    <td>".$item->adress."</td>
                    <td>".$item->phone."</td>
                    <td>".$item->client_type."</td>
                    <td>"._users::getUserFromDBbyID($item->login)->login."</td>
                    <td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deleteclient/".$item->ID."'>
                        <input type='submit' value='Удалить'/></form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Список клиентов пуст</p>";
    }
?>