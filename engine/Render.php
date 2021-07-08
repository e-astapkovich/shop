<?php

namespace app\engine;

use app\interfaces\Rendable;

class Render implements Rendable {

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . ".php";

        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        }
    }

}