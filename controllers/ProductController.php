<?php

namespace app\controllers;

class ProductController {

    public function runAction($action) {
        echo "runAction " . $action;
    }
    
    public function actionCatalog() {
        echo 'catalog';
    }
    
    public function actionItem() {
        echo 'Item';
    }
}