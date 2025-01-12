<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewarticles">Cтатьи</a> > <?=$art->name?></p>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/editarticle/<?=$art->ID?>">Изменить</a></p>
<h3>Просмотр данных статьи</h3>
<h4>Название:</h4>
<p><?=$art->name?></p><br/>
<h4>Титульное фото</h4>
<p><img src="/img/<?=_images::getImagesFromDBbyID($art->img_title)->uri."."._images::getImagesFromDBbyID($art->img_title)->extension?>"/></p>
<h4>Текст для предпросмотра:</h4>
<p><?=$art->preview?></p><br/>
<h4>Контент:</h4>
<article><?=$art->content?></article><br/>
<h4>Автор статьи:</h4>
<p><?=$art->author?></p><br/>
<h4>Опубликовал:</h4>
<p><?=$publish?></p><br/>
<h4>Дата Публикации:</h4>
<p><?=$art->date_pub?></p><br/>