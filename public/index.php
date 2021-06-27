<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$user = new User();
var_dump($user->getOne(6)->password_hash);
var_dump($user->getOne(4)->id);
var_dump($user->getOne(4));
// var_dump($user->getAll());

// $product = new Product();
// var_dump($product->getOne(5));
// echo $product->getOne(5);
// echo $product->getAll();
