<?php

namespace app\models;

class Order extends Model {
    public $id_order;
    public $user_id;
    public $user_phone;
    public $pickpoint_id;
    public $created_at;
    public $order_status;

    protected function getTableName() {
        return 'orders';
    }
}