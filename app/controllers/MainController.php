<?php

namespace app\controllers;

use app\models\Main;
use app\models\Guide;
use vendor\core\Controller;

class MainController extends Controller{

    public function indexAction(){
        $mModel = new Main();
        $news = $mModel->findAll();
        $title = "Главная страница";
        $this->set(compact("news", "title"));
        dump($_SESSION);
    }

}