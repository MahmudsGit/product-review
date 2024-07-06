<?php

namespace Core;

class Router
{
    private $routes = [];

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function dispatch($uri, $method)
    {
        if (isset($this->routes[$method][$uri])) {
            $controllerAction = explode('@', $this->routes[$method][$uri]);
            $controllerName = "\\App\\Controllers\\" . $controllerAction[0];
            $controllerMethod = $controllerAction[1];
            $controller = new $controllerName;

            return $controller->$controllerMethod();
        }

        Response::json(['message' => 'Not Found'], 404);
    }
}
