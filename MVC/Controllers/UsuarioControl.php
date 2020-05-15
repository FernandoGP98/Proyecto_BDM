<?php
class UsuarioControl{
    public function registrar(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        $_POST["nombre"], $_POST["ApPaterno"], $_POST["ApMaterno"], strval($_POST["telefono"]), 1, 1);
        Response::render("login", ["var"=>$us]);
    }

    public function obtener_porCorreoContra(){
        Usuario::obtenerUsuario($_GET["email"], $_GET["password"]);
        Response::render("perfil");
    }
}
?>