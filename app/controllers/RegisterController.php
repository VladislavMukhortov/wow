<?php

namespace app\controllers;

use vendor\core\Controller;
use app\models\Users;

class RegisterController extends Controller{

    public function indexAction(){
        
    }

    public function ajaxAction(){
        echo json_encode($_POST);
        die();
        if(empty($_POST['register'])){
            return;
        }
        if(!empty($_POST["name"]) || !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"])){
            //header('location: /');
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $password = md5(strip_tags($_POST['password']));
            $confirm =  md5(strip_tags($_POST['confirm-password']));
            
            if($password != $confirm){
                return;
            }
            
            $mUsers = new Users();

            $sqlInsert = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('{$name}', '{$email}', '{$password}')";
            $sqlSelect = "SELECT * FROM `{$mUsers->table}` WHERE `email` = '{$email}'";

            $userArr = $mUsers->findBySql($sqlSelect);
            
            if(!empty($userArr)){
                if($email = $userArr['email']){
                    $this->set(compact('userArr'));
                    return;
                }  
            }
            $_SESSION['user'] = $userArr;
            $this->set(compact('userArr'));
            $mUsers->query($sqlInsert);
            echo json_encode("sdfsdfsdf");
            die();
        }
        echo json_encode("sdfsdfsdf");
        die();
        return;
    }

}