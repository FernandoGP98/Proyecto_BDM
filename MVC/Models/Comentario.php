<?php
require_once("Conexion.php");

class Comentario{

    public function registroComentario($pNoticia, $pUsuario, $pComentario){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into comentarios (notica, usuario, comentario, fecha) values (?,?,?, now());");
        $sql->bind_param("i,i,s", $pNoticia, $pUsuario, $pComentario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getComentario($id){

    }

    public function deleteComentario($id){

    }
}