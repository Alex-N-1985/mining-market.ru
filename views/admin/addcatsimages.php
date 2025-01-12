<p><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewcatsimages">Связи Категорий-Изображения</a> > Добавление связи Изображения-Категории</p>
<h2>Добавление связи Изображения-Категории</h2>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/addcatsimages">
    <table class="adminview">
        <tr><td>Изображения: </td><td><select name="image"><?php
                    foreach ($images as $item){?>
                        <option value="<?=$item->ID?>"><?=$item->uri.".".$item->extension?></option>
                    <?php }?>
                </select></td></tr>
        <tr><td>Категория: </td><td><select name="cat"><?php
                    foreach ($cats as $item){?>
                        <option value="<?=$item->ID?>"><?=$item->name?></option>
                    <?php }?>
                </select></td></tr>
        <tr><td><input type="reset" value="Очистить" /></td><td><input type="submit" value="Добавить" /></td></tr>
    </table>
</form>