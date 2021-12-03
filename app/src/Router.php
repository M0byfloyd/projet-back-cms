<?php

namespace App;

class Router
{
    public function getController(){
        $xml = new \DOMDocument();
        $xml ->load('src/config/routes.xml');
        $routes = $xml->getElementsByTagName('route');
        var_dump($_GET['p']);

        isset($_GET['p']) ? $path = htmlspecialchars($_GET['p']) : $path = "";

        foreach ($routes as $route){
            if($path === $route->getAttribute('p')){
                $controllerClass = 'App\\Controller\\' . $route->getAttribute('controller');
                $action = $route->getAttribute('action');
                $params = [];
                if ( $route->hasAttribute('params')){
                    $keys = explode(',',$route->getAttribute('params'));
                    foreach ($keys as $key){
                        $params[$key] = $_GET[$key];
                    }
                }
                return new $controllerClass($action, $params);
            }
        }
        return 'culé tu as fais erreur trouve la bonne route';
    }
}