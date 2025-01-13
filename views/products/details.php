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
            <p>Колличество: <input type="number" min="0" max="100"></p>
            <button >В корзину</button>
        </div>
    </div>
</section>