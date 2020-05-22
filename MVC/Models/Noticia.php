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
        //$sql = $con->prepare("CALL noticiaRedactar(?,?,?,?,?,?,?,?);");
        $sql->bind_param("sssssiii", $pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $pAutor);
        $r=$sql->execute();
        $sql->close();
        $con->close();

        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();


        //$sql = $con->prepare("select * from noticia where id_Noticia = ?");
        $sql = $con->prepare("CALL noticiaGet_ById(?)");
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
        }
        $sql->close();
        $con->close();
        return $nota;
    }

    public function update($pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $id){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("update noticia set Titulo=?, FechaAcontesimiento = ?, Lugar = ?, Descripcion = ?, Texto =?, seccion = ?, estatus=? where id_Noticia = ?;");
        //$sql = $con->prepare("CALL noticiaRedactar(?,?,?,?,?,?,?,?);");
        $sql->bind_param("sssssiii", $pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();

        return $r;
    }

    public function delete($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        //delete from seccion where id_seccion=1;
        //$sql = $con->prepare("delete from noticia where id_Noticia = ?");
        $sql = $con->prepare("CALL noticiaDelete_ById(?)");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();

        return $r;
    }

    public function softDelete($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        //delete from seccion where id_seccion=1;
        //$sql = $con->prepare("update noticia set activa=0 where id_Noticia = ?");
        $sql = $con->prepare("CALL noticiaSoftDelete_ById(?)");
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

        $sql = $con->prepare("CALL noticiaGet_All()");
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
        }
        $sql->close();
        $con->close();
        return $items;
    }

    //select * from bdm_01.noticia where seccion = 3
    public function getSeccion($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //$sql = $con->prepare("select * from noticia where seccion = ?");
        $sql = $con->prepare("CALL noticiaGet_BySeccion(?)");
        $sql->bind_param("i", $id);
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
        }
        $sql->close();
        $con->close();
        return $items;
    }

    //select * from bdm_01.noticia where Titulo Like "%Ru%";
    public function busquedaTexto($texto){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $string = "%";
        $string = $string.$texto.$string;
        //$sql = $con->prepare("select * from noticia where Titulo Like ?");
        $sql = $con->prepare("CALL noticiaBusqueda_ByTitulo(?)");
        $sql->bind_param("s", $string);
        $sql->execute();
        echo $string;
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
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function busquedaOpcion($pOpcion, $pTexto, $pFechaIni, $pFechaFin){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("call testBusquedaOpcion(?,?,?,?)");
        $sql->bind_param("isss", $pOpcion, $pTexto, $pFechaIni,$pFechaFin);
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
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function getByUser($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //$sql = $con->prepare("select * from noticia where autor = ?");
        $sql = $con->prepare("CALL noticiaGet_ByUser(?)");
        $sql->bind_param("d", $id);
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
        }
        $sql->close();
        $con->close();
        return $items;
    }

    //update bdm_01.noticia set estatus=3 where id_Noticia=12;
    public function publicar($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        //delete from seccion where id_seccion=1;
        //$sql = $con->prepare("delete from noticia where id_Noticia = ?");
        $sql = $con->prepare("update noticia set estatus = 3 where id_Noticia = ?");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();

        return $r;
    }

    public function homeNoticias($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //select * from noticia where seccion = ? and activa = 1 and estatus = 3;
        $sql = $con->prepare("select * from noticia where seccion = ? and activa = 1 order by id_Noticia limit 3");
        $sql->bind_param("i", $id);
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
        }
        $sql->close();
        $con->close();
        return $items;
    }
}