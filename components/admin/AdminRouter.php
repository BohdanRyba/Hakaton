<?php

class AdminRouter
{
    private $routes;
    public $uri;
    public $result;

    /**
     * including a file "routes.php" from the folder "config" with array inside
     * */
    public function __construct()
    {
        $routesPath = ADMIN_ROOT . 'config/adminRoutes.php';
        $this->routes = include($routesPath);
    }


    /**
     * returns request String from request field
     * */
    public function getURI()
    {

        if (!empty($_SERVER['REQUEST_URI'])) { // /php/students/Slobodeniuk/Hakaton/news
            $this->uri = preg_replace("/(.*)Hakaton\/admin\//", '', $_SERVER['REQUEST_URI']); // /news
            $this->uri = trim($this->uri, '/');// news
            return $this->uri;
        }
    }


    public function runAdmin()
    {
//        echo '<pre>';
//        var_export($_SERVER);
//        echo '</pre>';
//        die;
        $uri = $this->getURI();
//        var_dump($this->routes);
//        echo '<br>';
//        echo $uri;
//        die;

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;
//                    echo '<pre>';
//                    var_export($parameters);
//                    echo '</pre>';

                $controllerFile = ADMIN_ROOT . 'controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once("$controllerFile");
                }

                $controllerObject = new $controllerName;
                $this->result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($this->result !== '') {
                    break;
                }

            }
        }
    }
}