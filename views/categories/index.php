            <p class="breadcrumbs"><a href="./index.html">Главная</a> > Каталог</p>
            <section class="catalog">
                <h3>Каталог</h3>
                <div class="catalog__container">
                    <?php foreach ($cats as $item){
                        $img = _images::getImagesFromDBbyID($item->img_title);
                        ?>
                    <div class="catalog__container-item">
                        <img src="/img/<?= $img->uri.".".$img->extension ?>" alt="">
                        <h4><a href=""><?= $item->name?></a></h4>
                    </div>
                    <?php } ?>
                </div>
            </section>           
