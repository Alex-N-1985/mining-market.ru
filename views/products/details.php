<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/categories/index">Каталог</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/products/index">Товары</a> > 
    <?= $prod->name ?>
</p>
<section class="gooddata">
    <img src="/img/<?= _images::getImagesFromDBbyID($prod->photo)->uri."."._images::getImagesFromDBbyID($prod->photo)->extension?>" alt="" srcset="">
    <div class="gooddata__container">
        <h3><?= $prod->name ?></h3>
        <p class="gooddata__container-price"><?= $prod->price ?> p.</p>
        <div class="button__container-buttons">
            <form method="post" action="http://<?=$rout->domain.$rout->start?>/products/details/<?=$prod->ID?>">
            <p>Колличество: <input type="number" name="quantity" min="0" max="100" value="1"></p>
            <button type="submit">В корзину</button>
            </form>
        </div>
    </div>
</section>