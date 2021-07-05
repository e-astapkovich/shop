<h2>Корзина</h2>

<?php foreach ($cart as $item):?>
    <span><?=$item['name_product']?></span>
    <span><?=$item['quantity']?></span>
    <span><?=$item['price']?></span>
    <br>
<?php endforeach;?>