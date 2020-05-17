<?php
require_once("Conexion.php");

class Video{

    public function registro($pDireccion){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into video (direccion) values (?);");
        $sql->bind_param("s", $pDireccion);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){

    }

    public function update($id){
        
    }

    public function delete($id){

    }
}