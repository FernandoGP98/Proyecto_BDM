<?php
require_once("Conexion.php");

class Noticia{

    public function registro($pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $pAutor){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into noticia (Titulo, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion, estatus, autor) 
        values (?,?,?,?,?,?,?,?);");
        $sql->bind_param("sssssiii", $pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $pAutor);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("select * from noticia where id_Noticia = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            while($row_data = $result->fetch_assoc()){
                echo $row_data["id_Noticia"];
                echo $row_data["Titulo"];
                echo $row_data["FechaPublicacion"];
                echo $row_data["FechaAcontesimiento"];
                echo $row_data["Lugar"];
                echo $row_data["Descripcion"];
                echo $row_data["Texto"];
                echo $row_data["destacada"];
                echo $row_data["activa"];
                echo $row_data["seccion"];
                echo $row_data["estatus"];
                echo $row_data["autor"];

            }
        }else {
            # No data actions
            echo 'No data here :(';
        }
        $sql->close();
        $con->close();
       // return $row_data;
    }

    public function update($id){

    }

    public function delete($id){

    }
}