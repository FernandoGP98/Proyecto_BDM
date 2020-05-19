<?php

class NoticiaControl{

    public function index(){
        $secciones = Seccion::getAll();
        $palabras = PalabraClave::getAll();
        Response::render("redactar", ["secciones"=>$secciones, "palabras"=>$palabras]);
    }

    public function registrarNoticia(){
        //echo $_POST["texto"];

        
        $noticia = Noticia::registro($_POST["titulo"],$_POST["fecha"], $_POST["lugar"],$_POST["descripcion"], $_POST["texto"],
        null , $_POST["estatus"], $_POST["autor"]);

        Response::render("redactar");
    }

    public function updateNoticia(){

    }

    public function deleteNoticia(){

    }

    public function obtenerNoticia(){
        //$noticia = new Noticia();
        $noticia = Noticia::get($_GET["id"]);
        //$secciones = Seccion::getAll();
        $palabras = PalabraClave::getAll();
        Response::render("editarNoticia",["nota"=>$noticia, "secciones"=>$secciones, "palabras"=>$palabras]);
    }

    public function verNoticia(){
        $noticia = Noticia::get($_GET["id"]);
        //$secciones = Seccion::getAll();
        Response::render("noticia",["nota"=>$noticia, "secciones"=>$secciones]);
    }

    public function todasNotas(){
        $notas = Noticia::getAll();
        Response::render("test", ["notas"=>$notas]);
    }

    public function buscar(){
        $notas = Noticia::busquedaTexto($_GET["texto"]);
        //$secciones = Seccion::getAll();
        Response::render("busqueda",["secciones"=>$secciones, "notas"=>$notas]);
    }

    public function busquedaOpcion(){

        //$secciones = Seccion::getAll();
        $notas = Noticia::busquedaOpcion($_GET["opcion"], $_GET["texto"], $_GET["desdeFecha"], $_GET["hastaFecha"]);
        Response::render("busqueda",["secciones"=>$secciones, "notas"=>$notas]);
    }
}