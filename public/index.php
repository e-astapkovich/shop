<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$db = new Db;
// $db->getConnection();

$user = new User($db);
var_dump($user->getOne(6));
var_dump($user->getAll());

$product = new Product($db);
var_dump($product->getOne(5));
// echo $product->getOne(5);
// echo $product->getAll();
