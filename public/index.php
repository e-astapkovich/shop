<?php

use app\controllers\CartController;
use app\models\{Model, Product, User, Cart, Order};
use app\engine\{Autoload, Db, Render};

include "../config/config.php";
include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$controllerName = $_GET['c'] ?: "product";
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render);
    $controller->runAction($actionName);
} else {
    echo "<h2>404</h2>";
}




/*
    Тест CRUD-блока
    с использованием универсального метода save()
*/

////////////////////////////////////////////////////////////////////////

#update для продукта
// $prod = Product::getOne(3);

// var_dump($product->modifiedFields);

// $prod->price = 11000;
// $prod->category_id = 3;
// $prod->cat_ide = 777;  // НЕСУЩЕСТВУЮЩЕЕ СВОЙСТВО ОБЪЕКТА product. Провека работы метода update;
// $prod->name_product = 'product-mmm';

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