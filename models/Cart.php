<?php

namespace app\models;

use app\engine\Db;


final class Cart extends DBModel
{

    private $user_id;
    private $session_id;
    private $product_id;
    private $quantity;
    private $price;
    private $created_at;
    private $status;

    public function __construct($user_id = null, $session_id = null, $product_id = null, $quantity = null, $price = null, $status = null)
    {
        $this->user = $user_id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->status = $status;
    }

    public static function getCart($user_id) {
        // $tableName = static::getTableName();
        $sql = "SELECT products.name_product, carts.quantity, carts.price FROM carts JOIN products ON product_id = products.id WHERE carts.user_id = :user_id AND carts.status = 'in_cart';";
        $params = [':user_id' => $user_id];
        return Db::getInstance()->queryAll($sql, $params);
    }

    protected static function getTableName()
    {
        return 'carts';
    }
}
