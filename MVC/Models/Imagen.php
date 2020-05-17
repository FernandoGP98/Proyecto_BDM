<?php
require_once("Conexion.php");

class Imagen{

    public function registro($pimagen){

        //insert into imagen (imagen) values (?);
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into imagen (imagen) values (?);");
        $sql->bind_param("b", $pimagen);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){

    }

    public function delete($id){

    }
}