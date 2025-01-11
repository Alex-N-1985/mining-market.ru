<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админпанель</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewusers"> Список зарегистрированных пользователей</a> > 
    Данные пользователя <?= $user->login ?></p>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/edituser/<?=$user->ID?>">Изменить</a></p>
<h3>Просмотр данных пользователя</h3>
<h3>Аватар:</h3>
<p><img src="/img/<?=$img->uri.".".$img->extension?>"/></p>
<h4>Логин:</h4>
<p><?=$user->login?></p><br/>
<h4>EMail:</h4>
<p><?=$user->email?></p><br/>
<h4>Дата регистрации:</h4>
<article><?=$user->date_reg?></article><br/>
<h4>Дата последнего входа:</h4>
<p><?=$user->date_log?></p><br/>
<h4>Статус пользователя:</h4>
<p><?php switch ($user->secure_level){
        case 0: echo "Забанен"; break;
        case 1: echo "Администратор"; break;
        case 2: echo "Пользователь"; break;
    }?></p><br/>