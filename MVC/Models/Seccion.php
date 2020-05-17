<?php
require_once("Conexion.php");

class Seccion{

    public function registro($pNombre, $pColor){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into seccion (seccion_nombre, color) values (?,?);");
        $sql->bind_param("s,s", $pNombre, $pColor);
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

    public function getAll(){
        
    }

}