<?php

class SeccionControl{

    public function registarSeccion(){
        $seccion = Seccion::registro($_POST["nombreSeccion"], $_POST["colorSeccion"]);
        $secciones = Seccion::getAll();
        Response::render("adminPerfil", ["secciones"=>$secciones]);
    }

    public function editarSeccion(){
        $seccion = Seccion::update($_GET["idSeccion"], $_GET["color"]);
        $secciones = Seccion::getAll();
        Response::render("adminPerfil", ["secciones"=>$secciones]);
    }

    public function eliminarSeccion(){
        $seccion = Seccion::delete($_POST["idSeccion"]);
        $secciones = Seccion::getAll();
        Response::render("adminPerfil", ["secciones"=>$secciones]);

    }

    public function seccion(){
        //$notas;
        $test = Seccion::get($_GET["id"]);
        $secciones = Seccion::getAll();
        $notas = Noticia::getSeccion($_GET["id"]);
        Response::render("seccion", ["titulo"=>$test, "secciones"=>$secciones, "notas"=>$notas]);
    }
}