<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> > Cтатьи</p>
<h3>Просмотр данных статей</h3>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/addarticle">Добавить статью</a></p>

    <?php
        if ($arts != null){
            echo "<table class='adminview'>
                <tr><td>ID</td><td>Название</td><td>Автор</td><td>Дата Публикации</td><td>Опубликовал</td><td></td></tr>";
            foreach ($arts as $item){
                echo "<tr><td><a href='http://".$rout->domain.$rout->start."/admin/viewarticle/".$item->ID."'>".$item->ID."</a></td>
                        <td>".$item->name."</td>
                        <td>".$item->author."</td>
                        <td>".$item->date_pub."</td>
                        <td>"._users::getUserFromDBbyID($item->published)->login."</td>
                        <td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deletearticle/".$item->ID."'>
                                <input type='submit' value='Удалить'/></form></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Список статей пуст</p>";
        }
    ?>
