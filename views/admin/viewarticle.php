<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index">Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewarticles">Cтатьи</a> > <?=$art->name?></p>
<br/><p><a href="http://<?=$rout->domain.$rout->start?>/admin/editarticle/<?=$art->ID?>">Изменить</a></p>
<h2>Просмотр данных статьи</h2>
<h3>Название:</h3>
<p><?=$art->name?></p><br/>
<h3>Титульное фото</h3>
<p><img src="/img/<?=_images::getImagesFromDBbyID($art->img_title)->uri."."._images::getImagesFromDBbyID($art->img_title)->extension?>"/></p>
<h3>Текст для предпросмотра:</h3>
<p><?=$art->preview?></p><br/>
<h3>Контент:</h3>
<article><?=$art->content?></article><br/>
<h3>Автор статьи:</h3>
<p><?=$art->author?></p><br/>
<h3>Опубликовал:</h3>
<p><?=$publish?></p><br/>
<h3>Дата Публикации:</h3>
<p><?=$art->date_pub?></p><br/>