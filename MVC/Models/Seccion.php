<?php
require_once("Conexion.php");

class Seccion{

    public $id;
    public $nombre;
    public $color;
    public $orden;
    public $activa;

    public function registro($opcion, $pNombre, $pColor, $activa){
        $DB= new conexion();
        $con = $DB->getConnection();

        //insert into seccion (seccion_nombre, color) values (?,?);
        $sql = $con->prepare("Call pSeccion(?,null,?,?,null,?)");
        $sql->bind_param("issi", $opcion,$pNombre, $pColor,$activa);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();
        $nota = null;

        $sql = $con->prepare("CALL seccionGet_ById(?);");
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

    public function update($opcion,$id, $pColor,$orden, $activa){
        $DB= new conexion();
        $con = $DB->getConnection();

        //update seccion set color=? where id_Seccion = ?;
        $sql = $con->prepare("call pSeccion(?,?,null,?,?,?)");
        $sql->bind_param("iisii", $opcion,$id,$pColor,$orden,$activa);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function delete($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("CALL seccionDelete_ById(?);");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $count = 0;

        $items = [];

        $sql = $con->prepare("CALL seccionGet_AllOrder();");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            session_start();

            if(isset($_SESSION['secciones'])){
                unset($_SESSION['secciones']);
            }
            $_SESSION['secciones']=array();
            while($row_data = $result->fetch_assoc()){
                
                
                $_SESSION['secciones'][$count]=array(
                    'id'=> $row_data["id_Seccion"],
                    'nombre'=>$row_data["seccion_nombre"],
                    'color'=>$row_data["color"],
                    'orden'=>$row_data["orden"],
                    'activa'=>$row_data["activa"]
                );
                $count++;
                /*$nota = new Seccion();
                $nota->id = $row_data["id_Seccion"];
                $nota->nombre = $row_data["seccion_nombre"];
                $nota->color = $row_data["color"];
                $nota->orden = $row_data["orden"];
                $nota->activa = $row_data["activa"];
            
                array_push($items, $nota);*/

            }
        }else {
            session_start();
            $_SESSION['secciones']=NULL;
        }
        
        $sql->close();
        $con->close();
        //return $items;
    }

}