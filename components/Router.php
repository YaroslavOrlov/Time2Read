<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    //returns the string of request
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        // get string request
        $uri = $this->getURI();

        //проверить наличие запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            //сравниваем имеющийся заспрос с полученым
            if (preg_match("~$uriPattern~", $uri)) {

                //получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //разделяем строку запроса
                $segments = explode('/', $internalRoute);

                //получаем имя контролера
                $controllerName = ucfirst(array_shift($segments) . 'Controller');
                //получаем имя екшена
                $actionName = 'action' . ucfirst(array_shift($segments));

                //список пришедших параметров
                $parameters = $segments;

                //include class controller
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}