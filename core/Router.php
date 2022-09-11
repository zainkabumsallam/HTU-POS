<?php

namespace Core;

use Core\Helpers\Tests;

class Router
{

    use Tests;

    public static $get_routes = [];
    public static $post_routes = [];

    public static function get($route, $controller)
    {
        self::test_file_exists("./resources/views/$controller.php");
        self::$get_routes[$route] = $controller;
    }

    public static function post($route, $controller)
    {
        self::test_file_exists("./resources/views/$controller.php");
        self::$post_routes[$route] = $controller;
    }

    public static function redirect()
    {

        $request = $_SERVER['REQUEST_URI'];
        $request = explode('?', $request)[0];

        $routes = [];

        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $routes = self::$get_routes;
                break;
            case "POST":
                $routes = self::$post_routes;
                break;
        }

        if (empty($routes) || !array_key_exists($request, $routes)) {
            http_response_code(404);
            die("Page doesn't exist.");
        }

        $controller_namespace = "Core\\Controllers\\";
        $controller_methods = explode('.', $routes[$request]);
        $controller_name = $controller_namespace . ucfirst(strtolower($controller_methods[0]));
        $controller = new $controller_name;
        $controller->render();
    }
}
