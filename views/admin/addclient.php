<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewclients">Клиенты</a> > Добавление Клиента</p>
<h3>Добавление Клиента</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/addclient">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="name" placeholder="Название"/></td></tr>
        <tr><td>Адрес:</td><td><input type="text" name="adress" placeholder="Адрес"/></td></tr>
        <tr><td>Телефон:</td><td><input type="tel" name="phone" placeholder="Телефон"/></td></tr>
        <tr><td>Тип клиента:</td><td><select name="clientType">
            <option value="client" selected>Клиент</option>
            <option value="trader">Трейдер</option>
            <option value="manufacturer">Производитель</option>
            <option value="employer">Сотрудник</option>
        </select></td></tr>
        <tr><td>Пользователь</td><td><select name="login">
            <option value='0' selected>Без аккаунта</option>
            <?php                 
                foreach ($usrs as $item){
                    echo "<option value='{$item->ID}'>{$item->login}</option>";
                }
            ?>
        </select>
        </td></tr>        
        <tr><td><input type="reset" value="Очистить"/></td>
            <td><input type="submit" value="Добавить"/></td></tr>
    </table>
</form>