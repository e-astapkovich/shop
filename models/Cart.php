<?php

namespace app\models;

class Cart extends Model {

    public $id;
    public $user_id;
    public $session_id;
    public $product_id;
    public $quantity;
    public $price;
    public $created_at;
    public $status;

    protected function getTableName() {
        return 'carts';
    }

}