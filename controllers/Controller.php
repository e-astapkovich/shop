<?php

namespace app\controllers;

use app\engine\Render;

abstract class Controller {

    protected $action;
    protected $actionDefault = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    private $render;

    public function __construct(Render $render)
    {
        $this->render = $render;
    }

    public function runAction($action) {
        $this->action = $action ?? $this->actionDefault;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            exit("action is not exists");
        }
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
        return $this->render->renderTemplate($template, $params);
    }
}