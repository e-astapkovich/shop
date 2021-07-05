<?php

use app\controllers\CartController;
use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db};

include "../config/config.php";
include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$controllerName = $_GET['c'] ?: "product";
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
} else {
    echo "404";
}




/*
    Тест CRUD-блока
    с использованием универсального метода save()
*/

////////////////////////////////////////////////////////////////////////

#update для продукта
// $prod = Product::getOne(4);
// $prod->price = 9999;
// $prod->category_id = 2;
// $prod->name_product = 'product-4m';

#create для продукта
// $prod = new Product('pppp', 500, 'img.jpg', 1, 1);

#применяем save для продукта
// $prod->save();

////////////////////////////////////////////////////////////////////////

#update для пользователя
// $user = User::getOne(3);
// $user->name_user = 'user-3m';

#create для пользователя
// $user = new User('test-user', 111, 'user', 'basic', 1);

#применяем save
// $user->save();

////////////////////////////////////////////////////////////////////////