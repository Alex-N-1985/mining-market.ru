<p><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> > Категории</p>
<h3>Просмотр данных категорий</h3>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/addcategory">Добавить категорию</a></p>
<table class="adminview">
    <tr><td>ID</td><td>Название</td><td>Тип категории</td><td>Изменить</td><td>Удалить</td></tr>
    <?php
    if ($cats != null){
        foreach ($cats as $item) {
            echo "<tr><td>".$item->ID."</td><td>".$item->name."</td><td>".$item->uri."</td><td>".$item->cat_type."</td>
            <td>".$item->img_title."</td><td><a href='http://".$rout->domain.$rout->start."/admin/editcategories/".$item->ID."'>Изменить</a></td>
            <td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deletecategory/".$item->ID."'>
                <input type='submit' value='Удалить' /></form></td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Список категорий пуст.</td></tr>";
    }
    ?>
</table>
