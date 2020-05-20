<?php
class UsuarioControl{
    public function registrar(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        $_POST["nombre"], $_POST["ApPaterno"], $_POST["ApMaterno"], strval($_POST["telefono"]), 1, 1);
        Response::render("login", ["var"=>$us]);
    }

    public function obtener_porCorreoContra(){
        $id = Usuario::obtenerUsuario($_GET["email"], $_GET["password"]);

        if($_SESSION["usuario"]["tipoUsuario"] == 1){
            $notas = Noticia::getAll();
            Response::render("adminPerfil", ["notas"=>$notas]);

        }else if($_SESSION["usuario"]["tipoUsuario"] == 2){
            $notas = Noticia::getByUser($id);
            Response::render("perfil",["notas"=>$notas]);

        }else if($_SESSION["usuario"]["tipoUsuario"] == 3){
            Response::render("perfilRegistrado");
        }
    }

    public function administrador(){
        session_start();
        //$secciones = Seccion::getAll();
        if($_SESSION["usuario"]["tipoUsuario"] == 1){
            $notas = Noticia::getAll();
            Response::render("adminPerfil", ["notas"=>$notas]);

        }else if($_SESSION["usuario"]["tipoUsuario"] == 2){
            $notas = Noticia::getByUser($_SESSION["usuario"]["id_Usuario"]);
            Response::render("perfil",["notas"=>$notas]);

        }else if($_SESSION["usuario"]["tipoUsuario"] == 3){
            Response::render("perfilRegistrado");
        }
    }

    public function logout(){
        session_start();
        if(isset($_SESSION['usuario'])){
            unset($_SESSION['usuario']);
        }
        Response::render("login");
    }

    public function login(){
        Response::render("login");
    }

    public function registrarse(){
        Response::render("registrarse");
    }
}
?>