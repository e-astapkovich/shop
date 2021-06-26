<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$user = new User(new Db);
var_dump($user);
echo $user->getOne(100);
echo $user->getAll();

$product = new Product(new Db);
var_dump($product);
echo $product->getOne(5);
echo $product->getAll();
