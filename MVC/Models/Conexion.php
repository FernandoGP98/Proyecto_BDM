<?php

class conexion{

    function __contruct(){
    }

    public static function getConnection(){
        
        //return new mysqli("localhost", "root", "root", "bdm_01");        // USO LOCAL
        return new mysqli("187.138.175.190", "root", "", "bdm_01");     // USO REMOTO

        //187.138.175.190
    }

    function __destruct(){
    }
}

?>