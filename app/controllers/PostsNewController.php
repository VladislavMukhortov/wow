<?php 

namespace app\controllers;

use vendor\core\Controller;
use vendor\core\Model;

class PostsNewController extends Controller{

    public function __construct(){
        $o = new Model();
        $o->findOne(2);
    }

    public function indexAction(){
        echo "I am method PostsNew::index";
    }

    public function testTestAction(){
        //dump($_GET);
        echo "I am method PostsNew::testTest";
    }

}