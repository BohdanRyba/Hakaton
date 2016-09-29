<?php

class Router
{
    private $routes;
    public $uri;
    public $result;

    /*
     * include file "routes.php" from folder "config" with array inside
     * */
    public function __construct()
    {
        $routesPath = ROOT . 'config/routes.php';
        $this->routes = include($routesPath);
    }


    /*
     * return String from request field
     * */
    public function getURI()
    {

        if (!empty($_SERVER['REQUEST_URI'])) { // /php/students/Slobodeniuk/Hakaton/news
            $this->uri = preg_replace("/^(.*)Hakaton/", '', $_SERVER['REQUEST_URI']); // /php/students/Slobodeniuk/news
            $this->uri = trim($this->uri, '/');// php/students/Slobodeniuk
            return $this->uri;
        }
    }


    public function run()
    {
//        session_start();

        $uri = $this->getURI();
//        var_dump($this->routes);
//        echo $uri;
        if ($uri == 'admin') {
            $admin = new Admin();
            $admin->runAdmin();
        } else {
            foreach ($this->routes as $uriPattern => $path) {
                if (preg_match("~$uriPattern~", $uri)) {

                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    $segments = explode('/', $internalRoute);

                    $controllerName = array_shift($segments) . 'Controller';
                    $controllerName = ucfirst($controllerName);

                    $actionName = 'action' . ucfirst(array_shift($segments));

                    $parameters = $segments;


                    $controllerFile = ROOT . 'controllers/' . $controllerName . '.php';
                    if (file_exists($controllerFile)) {
                        include_once("$controllerFile");
                    }

                    $controllerObject = new $controllerName;
                    $this->result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                    if ($this->result !== '') {
                        break;
                    }


                }
//            echo $uriPattern.'<br>';
//            echo $path.'<br><hr>';
            }
        }


    }

}