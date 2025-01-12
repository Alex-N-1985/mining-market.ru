<h3>Партнеры</h3>
<section class="clients">
    <ul>
    <?php 
        if ($clts != null){
            foreach ($clts as $item) {
                echo "<li>{$item->name}</li>";
            }
        }
    ?>
    </ul>
</section>