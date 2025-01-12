<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > <a href="http://<?=$rout->domain.$rout->start?>/user/viewuser">Пользователь</a> > Редактирование </p>
<h3>редактирование пользовательских данных</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/user/edituser/<?=$usr->ID?>">
    <table>
        <tr><td>Аватар:  <select name="avatar">
            <?php
                if ($avatars != null) {
                    $cID = _categories::getCategoriesFromDBbyName("Аватары")->ID;                    
                    foreach ($avatars as $item) {
                        $IC = _cats_images::getImageCatsFromDBbyImageAndCatID($item->ID, $cID);                        
                        if ($IC != null){
                            $opt = "<option value='".$item->ID."'";
                            if ((int)$item->ID == (int)$usr->avatar){
                                $opt .= " selected";
                            }
                            $opt .= ">".$item->name."</option>";
                            echo $opt;
                        }
                    }
                }
            ?>
        </select></td><td><img src="/img/<?=$img->uri.".".$img->extension?>"></td></tr>
        <tr><td>Логин:</td><td><?=$usr->login?></td></tr>
        <tr><td>Текущий Пароль:</td><td><input name="passw" type="password"></td></tr>
        <tr><td>Новый Пароль:</td><td><input name="npassw" type="password" id="npassw"/><input type="button" value="Сгенерировать" onclick="generatePassword()"/></td></tr>
        <tr><td>Повторите пароль:</td><td><input name="cpassw" type="password"></td></tr>
        <tr><td>EMail:</td><td><input type="email" name="mail" value="<?=$usr->email?>"></td></tr>
        <tr><td><input type="reset" value="Сбросить"></td><td><input type="submit" value="Изменить"></td></tr>
    </table>
</form>