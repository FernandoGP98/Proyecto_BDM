<?php

class NoticiaControl{

    public function index(){
        //$secciones = Seccion::getAll();
        $palabras = PalabraClave::getAll();
        Response::render("redactar", ["palabras"=>$palabras]);
    }

    public function registrarNoticia(){
        echo $palabra = $_POST["palabraClave"];
        echo $nuevaPalabra =$_POST["nuevaPalabra"];

        if($palabra == "nueva"){
            $palabra = $nuevaPalabra;
            PalabraClave::registro($palabra);
            $palabra = null;
            $pNueva = PalabraClave::getLast();
            $palabra = $pNueva->id;
        }
        
        $noticia = Noticia::registro($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        $_POST["seccion"] , $_POST["estatus"], $_POST["autor"], $palabra);


        $count = count($_FILES['imagenes']["name"]);
        //echo $count;
        for ($i=0; $i < $count; $i++) { 
            if(!empty($_FILES["imagenes"]["name"][$i])){
                $name = $_FILES["imagenes"]["name"][$i];
                $type = $_FILES["imagenes"]["type"][$i];
                $data = file_get_contents($_FILES["imagenes"]["tmp_name"][$i]);
                $data2 = addslashes($data);
                
                $insert = Imagen::registro($data2);
                $data = null;
                $data2 = null;
            }
        }

        if(!empty($_FILES["video"]["name"])){
            
            $nuevoNombre = uniqid() .".mp4";
            $rutaDeGuardado = "public/resources/video". "/" . $nuevoNombre;
            $rutaFinal = "resources/video". "/" . $nuevoNombre;
            move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);

            $inserVideo = Video::registro($rutaFinal);
        }

        header("Location: redactar", 301);
    }

    public function updateNoticia(){
        
        $palabra = $_POST["palabraClave"];
        $nuevaPalabra =$_POST["nuevaPalabra"];

        if($palabra == "nueva"){
            $palabra = $nuevaPalabra;
            PalabraClave::registro($palabra);
            $palabra = null;
            $pNueva = PalabraClave::getLast();
            $palabra = $pNueva->id;
        }

        $noticia = Noticia::update($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        $_POST["seccion"] , $_POST["estatus"], $_POST["idNoticia"], $palabra);

        
        if($_POST["imgE"]!=""){
            $imagenes = Imagen::noticiaImagenes($_POST["idNoticia"]);
            $imgE[]=explode("|", $_POST["imgE"]);
            foreach ($imagenes as $item) {
                $img = new Imagen();
                $img=$item;
                for ($i=0; $i < count($imgE[0]); $i++) { 
                    if($img->id==intval($imgE[0][$i])){
                        Imagen::deleteImagen($_POST["idNoticia"] ,$img->id);
                    }
                }
            }
        }

        if(isset($_FILES['imagenes'])){
            $count = count($_FILES['imagenes']["name"]);
            //echo $count;
            for ($i=0; $i < $count; $i++) { 
                if(!empty($_FILES["imagenes"]["name"][$i])){
                    $name = $_FILES["imagenes"]["name"][$i];
                    $type = $_FILES["imagenes"]["type"][$i];
                    $data = file_get_contents($_FILES["imagenes"]["tmp_name"][$i]);
                    $data2 = addslashes($data);
                    
                    $insert = Imagen::registro($data2);
                    $data = null;
                    $data2 = null;
                }
            }
        }

        if(!empty($_FILES["video"]["name"])){
            $video = Video::getById($_POST["idNoticia"]);

            Video::deleteById($_POST["idNoticia"],$video->idVideo);
            
            $nuevoNombre = uniqid() .".mp4";
            $rutaDeGuardado = "public/resources/video". "/" . $nuevoNombre;
            $rutaFinal = "resources/video". "/" . $nuevoNombre;
            move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);

            $inserVideo = Video::registro($rutaFinal);
        }

        header("Location: perfil?id=".$_POST["userID"], 301);
    }

    public function deleteNoticia(){
        $delete = Noticia::delete($_POST["idNoticia2"]);
        $notas = Noticia::getByUser($_POST["userID"]);
        //Response::render("perfil", ["notas"=>$notas]);
        header("Location: perfil?id=".$_POST["userID"], 301);
    }

    public function deleteNoticiaAdmin(){
        $delete = Noticia::delete($_POST["idNoticia2"]);
        //Response::render("perfil", ["notas"=>$notas]);
    }

    public function obtenerNoticia(){
        //$noticia = new Noticia();
        $noticia = Noticia::get($_GET["id"]);
        //$secciones = Seccion::getAll();
        $palabras = PalabraClave::getAll();
        $imagenes = Imagen::noticiaImagenes($_GET["id"]);
        
        Response::render("editarNoticia",["nota"=>$noticia, "palabras"=>$palabras, "imagenes"=>$imagenes]);
    }

    public function verNoticia(){
        $noticia = Noticia::get($_GET["id"]);
        $comentarios = Comentario::getComentarios($_GET["id"]);
        $imagenes = Imagen::noticiaImagenes($_GET["id"]);

        $quitarLike = false;
        $likes = Like::getLikes($noticia->id);
        $likesCount = count($likes);

        $relevantes = Noticia::getRelevantes($noticia->palabraNombre); 
        //$secciones = Seccion::getAll();
        Response::render("noticia",["nota"=>$noticia, "comentarios"=>$comentarios, "imagenes"=>$imagenes, 
        "relevantes"=>$relevantes, "likesCount"=>$likesCount, "likes"=>$likes]);
    }

    public function todasNotas(){
        $notas = Noticia::getAll();
        Response::render("test", ["notas"=>$notas]);
    }

    public function buscar(){
        $notas = Noticia::busquedaTexto($_GET["texto"]);
        //$secciones = Seccion::getAll();
        Response::render("busqueda",["notas"=>$notas]);
    }

    public function busquedaOpcion(){
        //$secciones = Seccion::getAll();
        $fechaBase = "2020-05-01";
        //if($_GET["has"])
        $notas = Noticia::busquedaOpcion($_GET["opcion"], $_GET["texto"], $_GET["desdeFecha"], $_GET["hastaFecha"]);
        Response::render("busqueda",["notas"=>$notas]);
    }

    public function publicar(){
        $destacado = 0;
        if(isset($_POST["destacada"])){
            $destacado = 1;
        }

        $nota = Noticia::publicar($_POST["idNoticia"],$destacado);
        header("Location: perfil?id=".$_POST["userID"], 301);
    }
}