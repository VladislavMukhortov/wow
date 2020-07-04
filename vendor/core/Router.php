<?php 

namespace vendor\core;

class Router{

    protected static $routes = [];
    protected static $route;

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url){
    
        foreach(self::$routes as $key => $item){
            if(preg_match("#$key#i", $url, $mathes)){
                foreach($mathes as $k => $v){
                    if(is_string($k)){
                        $item[$k] = $v;
                    }
                }
                if(!isset($item["action"])){
                    $item["action"] = "index";
                }
                self::$route = $item;
                return true;
            }
        }

        return false;
        
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        $match = self::matchRoute($url);
        $controller = "app\controllers\\" . self::upperCamelCase(self::$route["controller"]) . "Controller";
        $action = self::lowerCamelCase(self::$route['action']) . "Action";
        if($match){
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }
                else{
                    echo " method $controller::$action not found";
                }
            }
            else{
                echo " class $controller not found";
            }
        }
    }

    public static function upperCamelCase($str){
        return str_replace(" ", "", ucwords(str_replace("-", " ", $str)));
    }

    public static function lowerCamelCase($str){
        return lcfirst(self::upperCamelCase($str));
    }

    public static function removeQueryString($url){
        if($url){
            $expUrl = explode("?", $url, 2);
            if(!strpos($expUrl[0], "=")){
                return $url = rtrim($expUrl[0], "/");
            }
        }
        return "";
    }
}