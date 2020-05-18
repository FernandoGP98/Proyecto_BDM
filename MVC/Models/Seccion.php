<?php
require_once("Conexion.php");

class Seccion{

    public $id;
    public $nombre;
    public $color;
    public $orden;
    public $activa;

    public function registro($pNombre, $pColor){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into seccion (seccion_nombre, color) values (?,?);");
        $sql->bind_param("ss", $pNombre, $pColor);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("select * from seccion where id_Seccion = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            $row_data = $result->fetch_assoc();
                $nota = new Seccion();
                $nota->id = $row_data["id_Seccion"];
                $nota->nombre = $row_data["seccion_nombre"];
                $nota->color = $row_data["color"];
                $nota->orden = $row_data["orden"];
                $nota->activa = $row_data["activa"];
            
        }else {
            # No data actions
            echo 'No data here :(';
        }
        $sql->close();
        $con->close();
        return $nota;
    }

    public function update($id, $pColor){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("update seccion set color=? where id_Seccion = ?;");
        $sql->bind_param("si", $pColor, $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function delete($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("delete from seccion where id_Seccion = ?;");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("select * from seccion");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Seccion();
                $nota->id = $row_data["id_Seccion"];
                $nota->nombre = $row_data["seccion_nombre"];
                $nota->color = $row_data["color"];
                $nota->orden = $row_data["orden"];
                $nota->activa = $row_data["activa"];
            
                array_push($items, $nota);

            }
        }else {
            # No data actions
            echo 'No data here :(';
        }
        $sql->close();
        $con->close();
        return $items;
    }

}