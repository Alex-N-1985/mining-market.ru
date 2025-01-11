<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index"> Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewimages">Изображения</a> >
    Добавление изображение </p>
<h3>Добавить изображение</h3>
<form method="post" enctype="multipart/form-data" action="http://<?=$rout->domain.$rout->start?>/admin/addimage">
    <table>
        <tr><td>Добавить изображение:</td><td><input type="file" name="file" /></td></tr>
        <tr><td>Тип изображения</td><td><select name="imgType">
                    <?php
                        if ($cats != null){
                            foreach ($cats as $item){
                                echo "<option value='".$item->ID."'>".$item->name."</option>";
                            }
                        }
                    ?>
                </select></td></tr>
        <tr><td></td><td><input type="submit" value="Загрузить"/></td></tr>
    </table>
</form>
