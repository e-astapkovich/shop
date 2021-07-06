<?php

namespace app\models;

final class Order extends DBModel {

    protected $user_id;
    protected $user_phone;
    protected $pickpoint_id;
    protected $created_at;
    protected $order_status;

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