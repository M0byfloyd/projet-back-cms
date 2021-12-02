<?php

namespace App\Controller;

class BaseController
{
    public $templatesPath = '../templates';
    public $template = 'layout.php';

    public function render (string $title, array $vars, string $view) {
        $view = $this->templatesPath . $view . '.view.php';
        ob_start();
        require $view;
        $content = ob_get_clean();

        echo $content;
        return require $this->template;
    }

}