<?php 

namespace vendor\core;

class View{

    public $route;
    public $view;
    public $layout;

    public function __construct($route, $view = "", $layout = ""){
        $this->route = $route;
        $this->view = $view;
        $this->layout = $layout ?: "default";
    }

    public function render($vars = ""){
        if(!empty($vars)){
            extract($vars);
        }
        ob_start();
        $file_view = "../app/views/{$this->route['controller']}/{$this->view}.php";
        if(is_file($file_view)){
            require $file_view;
        }
        else{
            echo "View not found";
        }

        $content = ob_get_clean();
        $file_layout = "../app/views/layouts/{$this->layout}.php";

        if(is_file($file_layout)){
            require $file_layout;
        }
        else{
            echo "Layout not found";
        }
    }

}