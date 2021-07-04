<?php

namespace app\models;

class Product extends Model {
    public $id;
    public $name_product;
    public $price;
    public $image_name;
    public $category_id;
    public $manufacturer_id;

    public function __construct($name = null, $price = null, $image_name = null, $category_id = null, $manufacturer_id = null)
    {
        $this->name_product = $name;
        $this->price = $price;
        $this->image_name = $image_name;
        $this->category_id = $category_id;
        $this->manufacturer_id = $manufacturer_id;
    }

    protected function getTableName() {
        return 'products';
    }
   
}