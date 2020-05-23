<?php
require_once("Conexion.php");

class Comentario{

    public $id;
    public $comentario;
    public $fecha;
    public $noticia;
    public $usuario;
    public $imagen;

    public function registroComentario($pNoticia, $pUsuario, $pComentario){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into comentarios (noticia, usuario, comentario, fecha) values (?,?,?, now())");
        $sql->bind_param("iis", $pNoticia, $pUsuario, $pComentario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getComentarios($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("call obtenerComentarios(?)");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Comentario();
                $nota->id = $row_data["id_Comentario"];
                $nota->comentario = $row_data["comentario"];
                $nota->fecha = $row_data["fecha"];
                $nota->noticia = $row_data["noticia"];
                $nota->usuario = $row_data["firma"];
                $nota->imagen = $row_data["imagen"];

                array_push($items, $nota);
            }
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function deleteComentario($id){

    }

    public function getAll(){
        
    }
}