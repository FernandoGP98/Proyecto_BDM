<?php
require_once("Conexion.php");

class Imagen{

    public $id;
    public $imagen;

    public function registro($pimagen){

        //insert into imagen (imagen) values (?);
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("call spImagen('$pimagen')");
        $r=$sql->execute();

        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("CALL imagenGet_ById(?)");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            $row_data = $result->fetch_assoc();
                $nota = new Imagen();
                $nota->id = $row_data["id_Imagen"];
                $nota->imagen = $row_data["imagen"];
                //array_push($noticias, $final);

            
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $nota;
    }

    public function delete($id){

    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("CALL imagenGet_All()");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Imagen();
                $nota->id = $row_data["id_Imagen"];
                $nota->imagen = $row_data["imagen"];
            
                array_push($items, $nota);

            }
        }else {
            $items = null;
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function noticiaImagenes($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("call obtenerImagenesNoticia(?)");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Imagen();
                $nota->id = $row_data["id_Imagen"];
                $nota->imagen = $row_data["imagen"];
            
                array_push($items, $nota);

            }
        }else {
            $items = null;
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function deleteImagen($idNoticia ,$idImagen){
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("call noticiaImagenDelete(?,?)");
        $sql->bind_param("ii", $idNoticia, $idImagen);
        $sql->execute();

        $sql->close();
        $con->close();
    }
}