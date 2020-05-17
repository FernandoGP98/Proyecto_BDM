<?php

class SeccionControll{

    public function registarSeccion(){
        $seccion = Seccion::registro($_POST["nombre"], $_POST["color"]);
    }

    public function editarSeccion(){
        $seccion = Seccion::update($_GET["idSeccion"]);
    }

    public function eliminarSeccion(){
        $seccion = Seccion::delete($_GET["idSeccion"]);

    }
}