<?php

namespace app\models;

final class Product extends DBModel {

    protected $name_product;
    protected $price;
    protected $image_name;
    protected $category_id;
    protected $manufacturer_id;

    public function __construct($name = null, $price = null, $image_name = null, $category_id = null, $manufacturer_id = null)
    {
        $this->name_product = $name;
        $this->price = $price;
        $this->image_name = $image_name;
        $this->category_id = $category_id;
        $this->manufacturer_id = $manufacturer_id;
    }

    protected static function getTableName() {
        return 'products';
    }
   
}