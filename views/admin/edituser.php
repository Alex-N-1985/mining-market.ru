<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админпанель</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewusers"> Список зарегистрированных пользователей</a> > 
    Редактирование пользователя <?= $user->login ?></p>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/edituser/<?=$user->ID?>">Изменить</a></p>
<h3>Редактирование пользователя</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/edituser/<?=$user->ID?>">
    <table class="adminview">
        <tr><td>Логин:</td><td><input type="text" name="login" value="<?=$user->login?>" readonly></td></tr>
        <tr><td>Старый пароль:</td><td><input type="password" name="passw" value="<?=$user->password?>"></td></tr>
        <tr><td>Пароль:</td><td><input type="password" name="npassw" id="npassw"><input type="button" value="Сгенерировать" onclick="generatePassword()"/></td></tr>
        <tr><td>Ещё раз:</td><td><input type="password" name="cpassw"></td></tr>
        <tr><td>EMail:</td><td><input type="email" name="email" value="<?= $user->email?>" readonly></td></tr>
        <tr><td>Уровень допуска:</td><td><select name = 'sec_level'>
                    <option value="0" <? if ($user->secure_level == 0) echo "selected";?>>Забанен</option>
                    <option value="1" <? if ($user->secure_level == 1) echo "selected";?>>Админ</option>
                    <option value="2" <? if ($user->secure_level == 2) echo "selected";?>>Пользователь</option>
                </select></td></tr>
        <tr><td></td><td><input type="submit" value="Изменить"/></td></tr>
    </table>
</form>