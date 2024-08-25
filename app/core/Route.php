<?php


namespace app\core;


class Route
{
    public $requestType;
    public $url;
    public $route = [];
    private $loader;

    public function __construct()
    {
        $this->loader =  new ControllerLoader();
    }

    /**
     * @param $methodName
     * @param $arguments
     */
    public static function __callStatic($methodName, $arguments)
    {
        //instantiating Route class
        $obj = new Route();

        $obj->route = $obj->extractRoute($methodName);

        //if $arguments[0] doesn't contain @ but /
        if($obj->routeMatched($obj->route, $arguments[0])){
            $actions = explode('@', $arguments[1]);
            $controller = $actions[0];
            $method = $actions[1];

            //loading the requested controller and method
            $obj->loader->loadController($controller, $method);
            die();
        }
    }


    /**
     * @param $requestType
     * @return array
     */
    public function extractRoute($requestType)
    {
        //figuring out the route
        switch ($requestType){
            case 'get':

                if(isset($_SERVER['REQUEST_URI'])){
                    $this->url = $_SERVER['REQUEST_URI'];
                }
                else
                    $this->url = '/';
                break;

            case 'post':
                if($_SERVER['REQUEST_URI']){
                    $this->url = $_SERVER['REQUEST_URI'];
                }
                else
                    $this->url = '/';
                break;
        }

        if($this->url){
            return explode('/', trim($this->url, '/'));
        }
    }


    /**
     * @param $urlRoutes
     * @param $definedRoute
     * @return bool
     */
    public function routeMatched($urlRoutes, $definedRoute)
    {
        $definedRoute = explode('/', trim($definedRoute, '/'));

        if(count($urlRoutes) == count($definedRoute)){
            foreach ($urlRoutes as $key => $urlRoute){
                if($urlRoute != $definedRoute[$key]){
                    return false;
                }
            }
        }else{
            return false;
        }
        return true;
    }

}