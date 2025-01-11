<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админпанель</a> > Список статических страниц </p>
<h3>Просмотр данных статических страниц</h3>
<table class="adminview">
    <tr><th>ID:</th><th>Название</th><th></th></tr>
    <?php foreach ($spages as $item){?>
        <tr>
            <td><?= $item->ID?></td>
            <td><?= $item->name?></td>
            <td><a href="http://<?=$rout->domain.$rout->start?>/admin/editspages/<?=$item->ID?>">Изменить</a></td>
        </tr>
    <?php } ?>
</table>