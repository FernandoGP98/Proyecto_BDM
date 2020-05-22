<?php

class NoticiaControl{

    public function index(){
        //$secciones = Seccion::getAll();
        $palabras = PalabraClave::getAll();
        Response::render("redactar", ["palabras"=>$palabras]);
    }

    public function registrarNoticia(){
        //echo $_POST["texto"];

        $palabra = $_POST["palabraClave"];
        $nuevaPalabra =$_POST["nuevaPalabra"];

        if($palabra == "nueva"){
            $palabra = $nuevaPalabra;
            PalabraClave::registro($palabra);
        }
        
        $noticia = Noticia::registro($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        $_POST["seccion"] , $_POST["estatus"], $_POST["autor"]);

        header("Location: redactar", 301);
    }

    public function updateNoticia(){
        $noticia = Noticia::update($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        $_POST["seccion"] , $_POST["estatus"], $_POST["idNoticia"]);

        header("Location: perfil_administrador?id=".$_POST["userID"], 301);
    }

    public function deleteNoticia(){
        $delete = Noticia::delete($_POST["idNoticia2"]);
        $notas = Noticia::getByUser($_POST["userID"]);
        //Response::render("perfil", ["notas"=>$notas]);
        header("Location: perfil_administrador?id=".$_POST["userID"], 301);
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
        Response::render("editarNoticia",["nota"=>$noticia, "palabras"=>$palabras]);
    }

    public function verNoticia(){
        $noticia = Noticia::get($_GET["id"]);
        $comentarios = Comentario::getComentarios($_GET["id"]);
        //$secciones = Seccion::getAll();
        Response::render("noticia",["nota"=>$noticia, "comentarios"=>$comentarios]);
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
        $nota = Noticia::publicar($_POST["idNoticia"]);
        header("Location: perfil_administrador?id=".$_POST["userID"], 301);
    }
}