<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> > Связи Категории-Изображения</p>
<h2>Просмотр данных связей Связи Категории-Изображения</h2>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/addcatsimages">Добавить связь Категории-Изображения</a></p>
<?php
if ($cats_images != null){
    echo "<table class='adminview'>
                <tr><td>ID</td><td>Категории</td><td>Изображения</td><td></td></tr>";
    foreach ($cats_images as $item){
        echo "<tr><td>".$item->ID."</td><td>"._categories::getCategoriesFromDBbyID($item->category)->name."</td>
                    <td>"._images::getImagesFromDBbyID($item->image)->uri."."._images::getImagesFromDBbyID($item->image)->extension."</td>
                    <td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deletecatsimages/".$item->ID."'>
                        <input type='submit' value='Удалить'></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Список записей пуст</p>";
}
?>