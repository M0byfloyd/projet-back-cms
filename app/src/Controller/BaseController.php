<?php

namespace App\Controller;

class BaseController
{
    public $templatesPath = './templates/';
    public $template = 'layout.php';

    public function render (string $view, array $vars = [], string $pageTitle = 'Blog génial') {
        $view = $this->templatesPath . $view . '.view.php';

        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->templatesPath . $this->template;
    }

}