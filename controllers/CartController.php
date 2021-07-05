<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller {

    public function actionIndex() {
        $cart = Cart::getCart(1);
        echo $this->render('cart', ['cart' => $cart]);
    }

}