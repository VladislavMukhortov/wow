<?php 

namespace vendor\core;

abstract class Model{

    public $table;
    public $mySql;
    public $pk = "id";

    public function __construct(){
        $this->mySql = DB::getConnect();
    }

    public function query($sql){
        return $this->mySql->query($sql);
    }

    public function findAll(){
    $data = $this->mySql->query("SELECT * FROM {$this->table}");
            
        while($fetch = $data->fetch_assoc()){
            $fullData[] = $fetch;
        }
        return $fullData;
    }

    public function findOne($id, $field = ""){
        if(!empty($field)){
            $field = $field;
        }
        else{
            $field = $this->pk;
        }
        return $this->mySql->query(
            "SELECT * FROM {$this->table} WHERE {$id} = {$field} LIMIT 1"
            )->fetch_assoc();
    }

    public function findBySql($sql){
        $data = $this->mySql->query($sql);
        $fullData = [];
        if(!empty($data)){
            if($data->num_rows == 1){
                $fullData = $data->fetch_assoc();
            }
            else{
                while($fetch = $data->fetch_assoc()){
                    $fullData[] = $fetch;
                }
            }
        }
        else{
            $fullData = [];
        }
        return $fullData;
    }

}