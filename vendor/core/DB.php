<?php 

namespace vendor\core;

class DB{

    protected static $link; 

    protected static function connect(){
        $con = require $_SERVER['DOCUMENT_ROOT'] . "/config/conf_db.php";

        return self::$link = mysqli_connect($con['host'], $con['user'], $con['password'], $con['db']);
        
    }

    public static function getConnect(){
        if (empty(self::$link)) {
            return self::connect();
        }
        return self::$link;
    }
}