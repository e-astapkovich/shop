<h2>Каталог</h2>

<?php foreach ($catalog as $item):?>
    <h3><a href="/?c=product&a=item&id=<?=$item['id']?>"><?=$item['name_product']?></a></h3>
    <p>Цена: <?=$item['price']?></p>
    <button>Купить</button>
    <br><br>
<?php endforeach;?>