<?php

class conexion{
    private $con;

    function __contruct(){
        $this->con = new mysqli("localhost", "root", "", "bdm_01");

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    function __destruct(){
        $this->con->close();
    }
}

?>