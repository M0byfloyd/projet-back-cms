<?php

namespace App\Controller;

class BaseController
{
    public $params;
    public $templatesPath = './templates/';
    public $template = 'layout.php';

    public function render (string $view, array $vars = [], string $pageTitle = 'Blog génial') {
        $view = $this->templatesPath . $view . '.view.php';

        foreach ($vars as $var) {
            ${$var} = $var;
        }

        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->templatesPath . $this->template;
    }

    /**
     * BaseController constructor
     * @param string $action
     * @param null $id
     */
    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;

        $method = ucfirst($action);
        if (!is_callable([$this, $method])){
            throw new \RuntimeException('L\'action "' . $method . '" n\'est pas définie sur ce module');
        }
        $this->$method();
    }



}