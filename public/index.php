<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

use vendor\core\Router;

define("APP", dirname(__DIR__) . "/app");
define("ROOT", dirname(__DIR__));

require "../vendor/core/functions.php";

spl_autoload_register(function($class){
    $file = ROOT . "/" . str_replace("\\", "/", $class)  . '.php';
    if(is_file($file)){
        require $file;
    }
});


$query = rtrim($_SERVER['REQUEST_URI'], '/');
$url = substr($query, 1);

Router::add('^page/(?P<alias>[a-z-]+)$', ["controller" => "Page", "action" => "test"]);

Router::add('^guide/list/(?P<alias>[1-9]+)$', ["controller" => "Guide", "action" => "List"]);

Router::add("^$", ["controller" => "Main", "action" => "index"]);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($url);
//dump(Router::getRoutes());
//dump(Router::getRoute());