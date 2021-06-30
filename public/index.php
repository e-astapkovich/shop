<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);


// $user = new User();
// var_dump($user->getOne(6)->password_hash);
// var_dump($user->getOne(4)->id);
// var_dump($user->getOne(4));
// var_dump($user->getAll());

//TODO СДЕЛАТЬ НОВЫЙ ДАМП БАЗЫ - ИЗМЕНИЛ ИМЯ ПОЛЯ С КАРТИНКОЙ ТОВАРА

$product = new Product('test_prod22', 10000, 'test22.jpg', 4, 5);
var_dump($product);
$product->insert();
var_dump($product);
