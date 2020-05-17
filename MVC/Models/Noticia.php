<?php
require_once("Conexion.php");

class Noticia{

    public $id;
    public $titulo;
    public $fechaPublicacion;
    public $fechaAcontesimiento;
    public $lugar;
    public $descripcion;
    public $texto;
    public $destacada;
    public $activa;
    public $seccion;
    public $estatus;
    public $autor;

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
            $row_data = $result->fetch_assoc();
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];
                $nota->fechaAcontesimiento = $row_data["FechaAcontesimiento"];
                $nota->lugar = $row_data["Lugar"];
                $nota->descripcion = $row_data["Descripcion"];
                $nota->texto = $row_data["Texto"];
                $nota->destacada = $row_data["destacada"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->estatus = $row_data["estatus"];
                $nota->autor = $row_data["autor"];


                //array_push($noticias, $final);

            
        }else {
            # No data actions
            echo 'No data here :(';
        }
        $sql->close();
        $con->close();
        return $nota;
    }

    public function update($id){

    }

    public function delete($id){

    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("select * from noticia");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];
                $nota->fechaAcontesimiento = $row_data["FechaAcontesimiento"];
                $nota->lugar = $row_data["Lugar"];
                $nota->descripcion = $row_data["Descripcion"];
                $nota->texto = $row_data["Texto"];
                $nota->destacada = $row_data["destacada"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->estatus = $row_data["estatus"];
                $nota->autor = $row_data["autor"];


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