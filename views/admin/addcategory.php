<p><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewcategories">Список Категорий</a> > Добавление категорий</p>
<h3>Добавление категории</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/addcategory">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="cName"/></td></tr>
        <tr><td>URI:</td><td><input type="text" name="cUri"/></td></tr>
        <tr><td>Тип категории:</td>
            <td><select name="catType">                    
                    <option value="Articles" selected>Статьи</option>
                    <option value="Images">Изображения</option>                   
                    <option value="Products">Товары</option>                    
                </select></td></tr>
        <tr><td>Титульное изображение</td><td><select name="imgTitle">
        <?php
            if (count($iTitles) > 0){                    
                foreach ($iTitles as $item){                        
                    $opt = "<option value='{$item->ID}'";
                    if ((int)$item->ID == 15){
                        $opt .= "selected";
                    }
                    $opt .= ">{$item->name}</option>";
                    echo $opt;
                }
            }
        ?>
        </select></td></tr>
        <tr><td><input type="reset" value="Очистить"/></td>
            <td><input type="submit" value="Добавить"/></td></tr>
    </table>
</form>