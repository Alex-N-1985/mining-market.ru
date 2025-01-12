<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewclients">Клиенты</a> > Редактирование Клиента</p>
<h3>Редактирование Клиента</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/editclient/<?=$clt->ID?>">
    <table class="adminview">
        <tr><td>Название:</td><td><input type="text" name="name" placeholder="Название" value="<?=$clt->name?>"/></td></tr>
        <tr><td>Адрес:</td><td><input type="text" name="adress" placeholder="Адрес" value="<?=$clt->adress?>"/></td></tr>
        <tr><td>Телефон:</td><td><input type="tel" name="phone" placeholder="Телефон" value="<?=$clt->phone?>"/></td></tr>
        <tr><td>Тип клиента:</td><td><select name="clientType">
            <option value="Клиент" <?php if ($clt->client_type == "Клиент") echo "selected";?> >Клиент</option>
            <option value="Трейдер" <?php if ($clt->client_type == "Трейдер") echo "selected";?> >Трейдер</option>
            <option value="Производитель" <?php if ($clt->client_type == "Производитель") echo "selected";?> >Производитель</option>
            <option value="Сотрудник" <?php if ($clt->client_type == "Сотрудник") echo "selected";?> >Сотрудник</option>
        </select></td></tr>
        <tr><td>Пользователь</td><td><select name="login">
            <option value='0' <?php if ($clt->login == 0) echo "selected";?>>Без аккаунта</option>
            <?php                 
                foreach ($usrs as $item){
                    $opt = "<option value='{$item->ID}' ";
                    if ($clt->login == $item->ID) $opt .= "selected"; 
                    $opt .= ">{$item->login}</option>";
                    echo $opt;
                }
            ?>
        </select>
        </td></tr>        
        <tr><td><input type="reset" value="Очистить"/></td>
            <td><input type="submit" value="Добавить"/></td></tr>
    </table>
</form>