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
    public $nombreSeccion;
    public $estatus;
    public $estatusNombre;
    public $autor;
    public $firma;
    public $palabra;
    public $palabraNombre;
    public $video;
    public $imagen;

    public function registro($pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $pAutor, $pPalabra){
        $DB= new conexion();
        $con = $DB->getConnection();


        $sql = $con->prepare("insert into noticia (Titulo, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion, estatus, autor, palabra) 
        values (?,?,?,?,?,?,?,?,?);");
        //$sql = $con->prepare("CALL noticiaRedactar(?,?,?,?,?,?,?,?);");
        $sql->bind_param("sssssiiii", $pTitulo, $pFechaAcotencimiento, $pLugar, $pDescripcion, $pTexto, $pSeccion, $pEstatus, $pAutor, $pPalabra);
        $r=$sql->execute();
        $sql->close();
        $con->close();

        return $r;
    }

    public function get($id){
        $DB= new conexion();
        $con = $DB->getConnection();


        //$sql = $con->prepare("select * from noticia where id_Noticia = ?");
        $sql = $con->prepare("select * from vVerNoticia where id_Noticia = ?");
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
                //$nota->autor = $row_data["Autor"];
                $nota->nombreSeccion = $row_data["seccion_nombre"];
                $nota->firma = $row_data["firma"];
                $nota->palabra = $row_data["palabra"];
                $nota->palabraNombre = $row_data["PalabraClave"];
                $nota->video = $row_data["direccion_video"];

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

        //CALL noticiaGet_All()
        $sql = $con->prepare("select * from vNoticiaCard where estatus = 2 and activa = 1");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];


                $nota->descripcion = $row_data["Descripcion"];

                $nota->destacada = $row_data["destacada"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->estatus = $row_data["estatusNombre"];
                $nota->autor = $row_data["firma"];
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

    //select * from bdm_01.noticia where seccion = 3
    public function getSeccion($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //$sql = $con->prepare("select * from noticia where seccion = ?");
        $sql = $con->prepare("select * from vNoticiaCard where seccion = ? and estatus = 3");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];
                $nota->descripcion = $row_data["Descripcion"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];

                array_push($items, $nota);

            }
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function getRelevantes($palabra){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //$sql = $con->prepare("select * from noticia where seccion = ?");
        $sql = $con->prepare("call spNotasRelacionadas(?)");
        $sql->bind_param("s", $palabra);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];
                $nota->descripcion = $row_data["Descripcion"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];

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
                $nota->descripcion = $row_data["descripcion"];
                $nota->activa = $row_data["activa"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];


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
                $nota->descripcion = $row_data["descripcion"];
                $nota->activa = $row_data["activa"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];


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
        //CALL noticiaGet_ByUser(?)
        $sql = $con->prepare("select * from vNoticiaCard where autor = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->fechaPublicacion = $row_data["FechaPublicacion"];
                $nota->descripcion = $row_data["Descripcion"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->estatusNombre = $row_data["estatusNombre"];
                $nota->estatus = $row_data["estatus"];
                $nota->autor = $row_data["autor"];
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

    //update bdm_01.noticia set estatus=3 where id_Noticia=12;
    public function publicar($id, $destacado){
        $DB= new conexion();
        $con = $DB->getConnection();

        //delete from seccion where id_seccion=1;
        //$sql = $con->prepare("delete from noticia where id_Noticia = ?");
        $sql = $con->prepare("update noticia set estatus = 3, destacada = ? where id_Noticia = ?");
        $sql->bind_param("ii", $destacado,$id);
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
        $sql = $con->prepare("select * from vNoticiaCard where seccion = ? and activa = 1  and estatus = 3 
            order by destacada desc, FechaPublicacion desc 
            limit 6;");
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
                $nota->descripcion = $row_data["Descripcion"];
                $nota->destacada = $row_data["destacada"];
                $nota->activa = $row_data["activa"];
                $nota->seccion = $row_data["seccion"];
                $nota->estatus = $row_data["estatusNombre"];
                $nota->autor = $row_data["firma"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];


                array_push($items, $nota);

            }
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $items;
    }

    public function portada(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        //select * from noticia where seccion = ? and activa = 1 and estatus = 3;
        $sql = $con->prepare("call spPortada()");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Noticia();
                $nota->id = $row_data["id_Noticia"];
                $nota->titulo = $row_data["Titulo"];
                $nota->descripcion = $row_data["descripcion"];
                $nota->destacada = $row_data["destacada"];
                $nota->activa = $row_data["activa"];
                $nota->imagen = $row_data["imagen"];
                $nota->palabraNombre = $row_data["PalabraClave"];


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