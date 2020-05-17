<?php
require_once("Conexion.php");

class Like{

    public function registro($pNoticia, $pUsuario){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into like (noticia, usuario) values (?,?);");
        $sql->bind_param("i,i", $pNoticia, $pUsuario);
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