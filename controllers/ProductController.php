<?php

namespace app\controllers;

use app\models\Product;

class ProductController {

    private $action;
    private $actionDefault = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action) {
        $this->action = $action ?? $this->actionDefault;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            exit("action is not exists");
        }
    }

    public function actionIndex() {
        echo $this->render('index');
    }
    
    public function actionCatalog() {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

    public function actionItem() {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('product', ['product' => $product]);
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            echo $this->renderTemplate("layouts/" . $this->layout, [
                'menu' => $this->renderTemplate('menu'),
                'content' => $this->renderTemplate($template, $params)
                ]
            );
        } else {
            $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . ".php";

        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        }
    }
}