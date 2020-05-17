<?php
require_once("Conexion.php");

class PalabraClave{

    public function registro($pPalabra){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into palabraclave (PalabraClave) values (?);");
        $sql->bind_param("s", $pPalabra);
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