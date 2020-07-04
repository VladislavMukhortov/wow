<?php

namespace app\controllers;

use app\models\Guide;
use vendor\core\Controller;

class GuideController extends Controller{

    public function indexAction(){
        $gModel = new Guide();
        $guidesIds = $gModel->findAll();
        
        $this->set(compact('guidesIds'));
    }

    public function listAction(){
        $gModel = new Guide();
        $sqlGuide = "SELECT `id` FROM `guides`";
        $guide = $gModel->findOne($this->route['alias']);
        $table_of_contents = explode(',', $guide['table_of_contents']);
        $this->set(compact('guide', 'table_of_contents'));
    }

}