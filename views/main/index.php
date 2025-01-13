<section class="catalog">
    <h3>Каталог</h3>
        <div class="catalog__container">
        <?php foreach ($cats as $item){
            $img = _images::getImagesFromDBbyID($item->img_title);
        ?>
            <div class="catalog__container-item">
                <img src="/img/<?= $img->uri.".".$img->extension ?>" alt="">
                <h4><a href="http://<?=$rout->domain.$rout->start?>/products/category/<?=$item->ID?>"><?= $item->name?></a></h4>
            </div>
        <?php } ?>
    </div>
</section>
<section class="statpage">
    <h3><?= $spage->name ?></h3>
    <div class="statpage__content"><?= $spage->content ?></div>
</section>