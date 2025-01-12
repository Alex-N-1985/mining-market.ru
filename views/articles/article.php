<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
<a href="http://<?=$rout->domain.$rout->start?>/articles/index">Статьи</a> > <?=$art->name?></p>
<section class="article">
    <h3><?= $art->name?></h3>
    <img src="/img/<?= _images::getImagesFromDBbyID($art->img_title)->uri."."._images::getImagesFromDBbyID($art->img_title)->extension;?>" alt="">
    <div><?=$art->content?></div>
    <p>Автор: <?=$art->author?> <br>Дата Публикации: <?=$art->date_pub?></p>
</section>