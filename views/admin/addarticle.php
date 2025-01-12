<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewarticles">Статьи</a> > Добавление Статьи</p>
<h3>Добавление статьи</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/addarticle">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="aName"/></td></tr>
        <tr><td>Автор:</td><td><input type="text" name="author"/></td></tr>
        <tr><td>Титульное фото:</td><td><select name="image"><?php
                    foreach ($images as $item){?>
                        <option value="<?=$item->ID?>"><?=$item->uri.".".$item->extension?></option>
                    <?php }?>
                </select></td></tr>
        <tr><td>Текст предпросмотра:</td><td><textarea name="shorttext" rows="10" cols="100"></textarea></td></tr>
        <tr><td colspan="2">Контент статьи:</td></tr>
        <tr><td colspan="2"><textarea name="content" rows="50" cols="150"></textarea></td></tr>
        <tr><td><input type="reset" value="Очистить"/></td>
            <td><input type="submit" value="Добавить"/></td></tr>
    </table>
</form>