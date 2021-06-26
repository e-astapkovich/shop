<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\Autoload;

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$user = new User;
var_dump($user);

$product = new Product;
var_dump($user);