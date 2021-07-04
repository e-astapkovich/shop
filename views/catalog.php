<h2>Каталог</h2>

<?php foreach ($catalog as $item):?>
    <h3><a href="/?c=product&a=item&id=<?=$item['id']?>"><?=$item['name']?></a></h3>
    <p>Цена: <?=$item['price']?></p>
    <button>Купить</button>
<?php endforeach;?>