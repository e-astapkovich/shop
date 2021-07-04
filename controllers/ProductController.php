<?php

namespace app\controllers;

class ProductController {

    private $action;
    private $actionDefault = 'catalog';
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
    
    public function actionCatalog() {
        echo $this->render('index');
    }
    
    public function actionItem() {
        echo 'item';
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            echo $this->renderTemplate("layouts/" . $this->layout, [
                'menu' => $this->renderTemplate('menu'),
                'content' => $this->renderTemplate($template)
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