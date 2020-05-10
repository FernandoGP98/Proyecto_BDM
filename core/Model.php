<?php

class Model
{
    protected $table;
    protected $primaryKey;

    public static function find($id){
        $model = new static();

        //$sql = "select * from ".$model->table."where ".$model->primaryKey." =:id";
        $sql = "select * from ".$model->table." where ".$model->primaryKey." = :id";
        $param = ["id" => $id];
        $result = DB::query($sql, $param);

        foreach ($result as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }


}