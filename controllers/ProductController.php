<?php

namespace app\controllers;

class ProductController {

    private $action;
    private $actionDefault = 'catalog';

    public function runAction($action) {
        $this->action = $action ?? $this->actionDefault;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            exit("action is not exists");
        }
    }
    
    public function actionCatalog() {
        echo 'catalog';
    }
    
    public function actionItem() {
        echo 'item';
    }
}