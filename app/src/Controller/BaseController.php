<?php

namespace App\Controller;

class BaseController
{
    public string $templatesPath = './templates/';
    public string $template = 'layout.php';

    public function render (string $view, array $vars = [], string $pageTitle = 'Blog génial') {
        $view = $this->templatesPath . $view . '.view.php';

        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->templatesPath . $this->template;
    }

}