<?php

namespace app\models;

final class Cart extends DBModel
{

    public $id;
    public $user_id;
    public $session_id;
    public $product_id;
    public $quantity;
    public $price;
    public $created_at;
    public $status;

    public function __construct($user_id = null, $session_id = null, $product_id = null, $quantity = null, $price = null, $status = null)
    {
        $this->user = $user_id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->status = $status;
    }

    protected static function getTableName()
    {
        return 'carts';
    }
}
