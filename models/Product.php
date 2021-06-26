<?php

namespace app\models;

class Product extends Model {
    public $id_product;
    public $name_product;
    public $price;
    public $image_link;
    public $category_id;
    public $manufacturer_id;

    protected function getTableName() {
        return 'products';
    }
   
}