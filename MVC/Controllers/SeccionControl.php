<?php

class SeccionControl{

    public function registarSeccion(){
        $seccion = Seccion::registro($_POST["nombreSeccion"], $_POST["colorSeccion"]);
        //$secciones = Seccion::getAll();
        Seccion::getAll();

        header("Location: perfil_administrador?id=".$_SESSION['usuario']['id_Usuario'], 301);

        //Response::render("adminPerfil");
    }

    public function editarSeccion(){
        $seccion = Seccion::update($_GET["idSeccion"], $_GET["color"]);
        Seccion::getAll();
        //$secciones = Seccion::getAll();
        //Response::render("adminPerfil");
        header("Location: perfil_administrador?id=".$_SESSION['usuario']['id_Usuario'], 301);
    }

    public function eliminarSeccion(){
        $seccion = Seccion::delete($_POST["idSeccion"]);
        Seccion::getAll();
        //$secciones = Seccion::getAll();
        //Response::render("adminPerfil");
        header("Location: perfil_administrador?id=".$_SESSION['usuario']['id_Usuario'], 301);

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