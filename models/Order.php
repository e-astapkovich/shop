<?php

namespace app\models;

class Order extends Model {
    public $id;
    public $user_id;
    public $user_phone;
    public $pickpoint_id;
    public $created_at;
    public $order_status;

    public function __construct($user_id = null, $user_phone = null, $pickpoint_id = null, $order_status = null)
    {
        $this->user_id = $user_id;
        $this->user_phone = $user_phone;
        $this->pickpoint_id = $pickpoint_id;
        $this->order_status = $order_status;
    }

    protected static function getTableName() {
        return 'orders';
    }
}