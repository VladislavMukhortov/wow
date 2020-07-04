<?php 

namespace vendor\core;

abstract class Controller{

    public $route;
    public $view;
    public $layout;
    public $vars;

    public function __construct($route){
       $this->route = $route;
       $this->view = $route['action'];
       if($route['controller'] == "/"){
            $route['controller'] = "main";
       }
    }

    public function getView(){
        $vObj = new View($this->route, $this->view, $this->layout);
        $vObj->render($this->vars);
    }

    public function set($vars){
        return $this->vars = $vars;
    } 

}