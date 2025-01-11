<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админпанель</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewspages"> Список статических страниц</a> > 
    Редактирование статической страницы "<?=  $spage->name ?>"</p>
<h3>Редактирование статической страницы</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/editspages/<?=$spage->ID?>">
    <input type="hidden" name="pageID" value="<?=$spage->ID?>">
    <table>
        <tr><td>Название:</td><td><input type="text" name="spName" value="<?=$spage->name?>" readonly /></td></tr>
        <tr><td colspan="2"><textarea name="spContent" cols="150" rows="50"><?=$spage->content?></textarea></td></tr>
        <tr><td colspan="2" align="right"><input type="submit" value="Изменить"/></td></tr>
    </table>
</form>