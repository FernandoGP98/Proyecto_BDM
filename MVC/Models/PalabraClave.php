<?php
require_once("Conexion.php");

class PalabraClave{

    public $id;
    public $PalabraClave;

    public function registro($pPalabra){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into palabraclave (PalabraClave) values (?);");
        $sql->bind_param("s", $pPalabra);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        //return $r;
    }

    public function get($id){

    }

    public function update($id){
        
    }

    public function delete($id){

    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("select * from palabraclave");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new PalabraClave();
                $nota->id = $row_data["id_PalabraClave"];
                $nota->PalabraClave = $row_data["PalabraClave"];
            
                array_push($items, $nota);

            }
        }else {
            $items = null;
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function getLast(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $id= null;

        $sql = $con->prepare("select ultimaPalabra()");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            $row_data = $result->fetch_assoc();
            $id = new PalabraClave();
            $id->id = $row_data["ultimaPalabra()"];

        }else {
           // $items = null;
        }
        $sql->close();
        $con->close();
        return $id;
    }
}