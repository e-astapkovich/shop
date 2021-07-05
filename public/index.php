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