<?php

class SeccionControl{

    public function registarSeccion(){
        $seccion = Seccion::registro($_POST["nombreSeccion"], $_POST["colorSeccion"]);
        //$secciones = Seccion::getAll();
        Seccion::getAll();
        Response::render("adminPerfil");
    }

    public function editarSeccion(){
        $seccion = Seccion::update($_GET["idSeccion"], $_GET["color"]);
        Seccion::getAll();
        //$secciones = Seccion::getAll();
        Response::render("adminPerfil");
    }

    public function eliminarSeccion(){
        $seccion = Seccion::delete($_POST["idSeccion"]);
        Seccion::getAll();
        //$secciones = Seccion::getAll();
        Response::render("adminPerfil");

    }

    public function seccion(){
        //$notas;
        $test = Seccion::get($_GET["id"]);
        //$secciones = Seccion::getAll();
        $notas = Noticia::getSeccion($_GET["id"]);
        //Response::render("seccion", ["titulo"=>$test, "secciones"=>$secciones, "notas"=>$notas]);
        Response::render("seccion", ["titulo"=>$test, "notas"=>$notas]);
    }
}