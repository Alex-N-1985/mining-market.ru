<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > Блог </p>
<section class="blog">
    <h2>Статьи</h2>
        <?php 
            if ($arts != null) {
                foreach ($arts as $item){ ?>
        <div class="blog__article">
            <img src="/img/<?= _images::getImagesFromDBbyID($item->img_title)->uri."."._images::getImagesFromDBbyID($item->img_title)->extension;?>" alt="">
            <div class="blog__article-container">
                <h3><a href="http://<?=$rout->domain.$rout->start?>/articles/article/<?=$item->ID?>"><?=$item->name?></a></h3>
                <p><?=$item->preview?></p>
            </div>
        </div>
        <?php     }
            } else {
                echo "<p><b>Список статей пуст.</b></p>";
            }
        ?>     
</section>