<p><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewcategories">Категории</a> > Редактирование категорий</p>
<h3>Редактирование категорий</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/editcategories/<?=$cat->ID?>">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="cName" value="<?=$cat->name?>"/></td></tr>
        <tr><td>URI:</td><td><input type="text" name="cUri" value="<?=$cat->uri?>"/></td></tr>
        <tr><td>Тип категории:</td>
            <td><select name="catType">
                    <option value="Articles" <?php if ($cat->cat_type == "Articles") echo "selected";?> >Статьи</option>
                    <option value="Images" <?php if ($cat->cat_type == "Images") echo "selected";?> >Изображения</option>
                    <option value="Products" <?php if ($cat->cat_type == "Products") echo "selected";?> >Товары</option>
                </select></td></tr>
        <tr><td>Титульное фото</td><td><select name="imgTitle">
            <?php                
                if (count($iTitles) > 0){                    
                    foreach ($iTitles as $item){                        
                        $opt = "<option value='{$item->ID}'";
                        if ((int)$item->ID == (int)$cat->img_title){
                            $opt .= "selected";
                        }
                        $opt .= ">{$item->name}</option>";
                        echo $opt;
                    }
                }
            ?>
        </select></td></tr>
        <tr><td></td><td><input type="submit" value="Изменить"/></td></tr>
    </table>
</form>