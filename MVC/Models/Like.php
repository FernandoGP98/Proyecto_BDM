<?php
require_once("Conexion.php");

class Like{

    public $id;
    public $noticia;
    public $usuario;

    public function registro($opcion,$pNoticia, $pUsuario){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("call spLike(?,?,?)");
        $sql->bind_param("iii",$opcion, $pNoticia, $pUsuario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getLikes($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //$sql = $con->prepare("select * from noticia where seccion = ?");
        $sql = $con->prepare("call spGetLikes(?);");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Like"];
                $nota->usuario = $row_data["usuario"];

                array_push($items, $nota);
            }
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function delete($opcion, $pNoticia, $pUsuario){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("call spLike(?,?,?)");
        $sql->bind_param("iii",$opcion, $pNoticia, $pUsuario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }
}