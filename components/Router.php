<?php
require_once(ROOT . 'components/Traits.php');
class Router
{
    use messagesOperations;

    private $routes;
    public static $uri;
    public $result;
    public static $permalink;
    public static $any_last_path_value;

    public static function set_last_path_value(){
        $request_url = explode('/', $_SERVER['REQUEST_URI']);
        $last_element = $request_url[count($request_url)-1];
        self::$any_last_path_value = $last_element;
    }

    /**
     * include file "routes.php" from folder "config" with array inside
     * */
    public function __construct()
    {
        $project = pathinfo($_SERVER['PHP_SELF']);
        $root_path = rtrim( '//' . $_SERVER['HTTP_HOST'] . $project['dirname'], '/' ) . '/';
        self::$permalink = $root_path;
        self::set_last_path_value();

        $routesPath = ROOT . 'config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * return String from request field
     * */
    public function getURI()
    {

        if (!empty($_SERVER['REQUEST_URI'])) { // /php/students/Slobodeniuk/Hakaton/admin
            self::$uri = preg_replace("/(.*)Hakaton\//", '', $_SERVER['REQUEST_URI']); // /admin
            self::$uri = trim(self::$uri, '/');// admin
            return self::$uri;
        }
    }

    public function run()
    {
        $uri = $this->getURI();
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
        }
    }
}