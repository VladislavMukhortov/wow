<?php 

namespace app\controllers;

use vendor\core\Controller;

class PostsController extends Controller{

    public function indexAction(){
      
    }

    public function postsTestAction(){

        $names = [
            "man" => "Vladislav",
            "woman" => "Natasha"
        ];
        $title = "PAGE TITLE";
        $this->set(compact("names", "title"));
    }

}