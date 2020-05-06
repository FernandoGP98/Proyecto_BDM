<?php

class conexion{

    function __contruct(){
    }

    public static function getConnection(){
        return new mysqli("localhost", "root", "", "bdm_01");
    }

    function __destruct(){
    }
}

?>