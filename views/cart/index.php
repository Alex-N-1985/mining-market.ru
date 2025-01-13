<h3>Корзина</h3>
<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > Корзина </p>            
<div class="cart">                
    <div class="cart__shoplist">
        <?php 
            if ($poArr != null){
                $count = 0;
                foreach ($poArr as $item){
                    $prod = _products::getProductsFromDBbyID($item->product);
                    $count += $prod->price * $item->quantity;
        ?>
        <div class="cart__shoplist-item">
            <img src="/img/<?= _images::getImagesFromDBbyID($prod->photo)->uri."."._images::getImagesFromDBbyID($prod->photo)->extension ?>" alt="">
            <div class="itemcontainer">
                <h4><?= $prod->name ?></h4>
                <p><?= $prod->price ?> р</p>
                <div class="itemcontainer__buttons">
                    <form method="post" action="http://<?=$rout->domain.$rout->start?>/cart/deleteitem/<?=$item->ID?>">
                        <button type="submit">Удалить</button>
                    </form>
                    <input type="number" min="0" max="100" value="<?=$item->quantity?>" disabled>
                </div>
            </div>
        </div>
            <?php }
            } else {
                echo "<p>Корзина пуста.</p>";
            }
        ?>
    </div>
    <div class="cart__calcdata">
        <h4>Ваша корзина</h4>
        <div class="cart__calcdata-column">
            <p>Товары:</p>
            <p><?=$count?> p</p>
        </div>
        <div class="cart__calcdata-column">
            <p>Скидка:</p>
            <p>0%</p>
        </div>
        <hr color="black" width="100%" size="2"/>
        <div class="cart__calcdata-column">
            <p>Итого:</p>
            <p><?=$count?> р</p>
        </div>
        <button>Перейти к оформлению</button>
        <p>На следующем шаге Вы сможете выбрать способ получения и оплаты</p>
    </div>
</div>