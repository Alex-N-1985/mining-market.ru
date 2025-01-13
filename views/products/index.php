<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > 
    <a href="http://<?=$rout->domain.$rout->start?>/categories/index">Каталог</a> > Товары</p>
<section class="goodslist">                
    <div class="goodslist__sidepanel">
        <h4>Категории</h4>
        <ul>
            <li><a href='http://<?=$rout->domain.$rout->start?>/products/index'>Все</a></li>
            <?php
                if ($cats != null){
                    foreach ($cats as $cat){
                        echo "<li><a href='http://".$rout->domain.$rout->start."/products/category/{$cat->ID}'>{$cat->name}</a></li>";
                    }
                }
            ?>
        </ul>
    </div>
    <div class="goodslist__container">
        <?php
            if ($prods != null){
                foreach ($prods as $item){?>
        <div class="goodslist__container-item">
            <img src="/img/<?= _images::getImagesFromDBbyID($item->photo)->uri."."._images::getImagesFromDBbyID($item->photo)->extension ?>" alt="">
            <h5><a href="http://<?=$rout->domain.$rout->start?>/products/details/<?=$item->ID?>"><?=$item->name?></a></h5>
            <p><?=$item->price?> p</p>
        </div>
        <?php }
            } else {
                echo "<p>Товары в данной категории на текущий момент отсутствуют.</p>";
            }?>
    </div>
</section>