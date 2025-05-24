<?php

namespace App\Http;

class Router
{
    private $routes = [];

    public function get($pattern, $callback)
    {
        $this->routes['GET'][] = ['pattern' => $pattern, 'callback' => $callback];
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        foreach ($this->routes[$method] ?? [] as $route) {
            if (preg_match("#^{$route['pattern']}$#", $uri, $matches)) {
                array_shift($matches);
                $response = call_user_func_array($route['callback'], $matches);
                echo $response;
                return;
            }
        }
        http_response_code(404);
        echo "Not Found";
    }
}
