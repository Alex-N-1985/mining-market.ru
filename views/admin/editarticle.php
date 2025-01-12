<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewarticles">Статьи</a> > Редактирование Статьи</p>
<h3>Редактирование статьи</h2>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/editarticle/<?=$art->ID?>">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="aName" value="<?=$art->name?>"/></td></tr>
        <tr><td>Автор:</td><td><input type="text" name="author" value="<?=$art->author?>"></td></tr>
        <tr><td>Титульное фото:</td><td><select name="image"><?php
                    foreach ($images as $item){?>
                        <option value="<?=$item->ID?>" <?php if ($item->ID == $art->img_title) echo "selected"?> ><?=$item->uri.".".$item->extension?></option>
                    <?php }?>
                </select></td></tr>
        <tr><td>Текст предпросмотра:</td><td><textarea name="shorttext" rows="10" cols="100"><?=$art->preview?></textarea></td></tr>
        <tr><td colspan="2">Контент статьи:</td></tr>
        <tr><td colspan="2"><textarea name="content" rows="50" cols="150"><?=$art->content?></textarea></td></tr>
        <tr></td><td><input type="submit" value="Изменить"/></td></tr>
    </table>
</form>
