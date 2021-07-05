<?php

use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../config/config.php";
include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$controllerName = $_GET['c'] ?: "product";
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
var_dump($controllerClass);
var_dump(class_exists($controllerClass));

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
} else {
    echo "404";
}




// $product = Product::getOne(3);
// var_dump($product);

// $product = new Product('test_prod22', 10000, 'test22.jpg', 4, 5);
// var_dump($product);

// $product->insert();
// var_dump($product);

// if ($product->delete()) unset($product);
// var_dump($product);