<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewclients">Клиенты</a> > <?=$clt->name?></p>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/editclient/<?=$clt->ID?>">Изменить</a></p>
<h3>Просмотр данных клиента</h3>
<h4>Название:</h4>
<p><?=$clt->name?></p><br/>
<h4>Адрес:</h4>
<p><?=$clt->adress?></p>
<h4>Телефон:</h4>
<p><?=$clt->phone?></p><br/>
<h4>Тип клиента:</h4>
<p><?=$clt->client_type?></p>
<h4>Пользователь:</h4>
<p><?=_Users::getUserFromDBbyID($clt->login)->login?></p><br/>
