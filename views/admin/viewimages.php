<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> > Изображения</p>
<h3>Изображения пользователя</h3>
<p class=><a href="http://<?=$rout->domain.$rout->start?>/admin/addimage">Добавить изображение</a></p>
<?php
if ($imgs == null){
    echo "<p>Список изображений пуст.</p>";
} else {
    echo "<table>";
    foreach ($imgs as $item ){
        echo "<tr><td><img class='admpanel-icon' src='/img/".$item->uri.".".$item->extension."'></td><td>".$item->name."<br/>Дата добавления:".$item->date_pub."</td>
<td><form method='post' action='http://".$rout->domain.$rout->start."/admin/deleteimage/".$item->ID."'>
                                <input type='submit' value='Удалить'/></form></td></tr>";
    }
    echo "</table>";
}
?>
