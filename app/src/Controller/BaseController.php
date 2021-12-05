<?php

namespace App\Controller;

use App\Vendor\Core\HTTPRequest;
use App\Vendor\Core\HTTPResponse;

class BaseController
{
    public string $templatesPath = './templates/';
    public string $template = 'layout.php';
    public array $params;
    public HTTPRequest $HTTPRequest;
    public HTTPResponse $HTTPResponse;

    public function render (string $view, array $vars = [], string $pageTitle = 'Blog génial') {
        $view = $this->templatesPath . $view . '.view.php';

        foreach ($vars as $key => $value) {
            ${$key} = $value;
        }

        ob_start();
        require $view;

        $content = ob_get_clean();
        require $this->templatesPath . $this->template;

        return ob_get_clean();
    }

    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;
        $this->HTTPRequest = new HTTPRequest();
        $this->HTTPResponse = new HTTPResponse();

        $method = ucfirst($action);
        if (!is_callable([$this, $method])){
            throw new \RuntimeException('L\'action "' . $method . '" n\'est pas définie sur ce module');
        }
        $this->$method();
    }



}