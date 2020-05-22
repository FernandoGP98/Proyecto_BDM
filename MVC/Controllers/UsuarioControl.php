<?php
class UsuarioControl{
    public function registrar(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        $_POST["nombre"], $_POST["ApPaterno"], $_POST["ApMaterno"], strval($_POST["telefono"]), 1, 1);
        Response::render("login", ["var"=>$us]);
    }

    public function registroByAdmin(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        "", "", "", "", null, $_POST["tipoUsuario"]);

        $seccion = Seccion::update($_GET["idSeccion"], $_GET["color"]);
        Seccion::getAll();
        header("Location: perfil_administrador?id=".$_SESSION['usuario']['id_Usuario'], 301);
    }

    public function obtener_porCorreoContra(){
        $id = Usuario::obtenerUsuario($_GET["email"], $_GET["password"]);

        if($_SESSION["usuario"]["tipoUsuario"] == 1){
            $notas = Noticia::getAll();
            $tiposUsuario = TipoUsuario::getAll();
            $users = usuario::getAll();
            Response::render("adminPerfil", ["notas"=>$notas,"tiposUsuario"=>$tiposUsuario, "users"=>$users]);

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
            $tiposUsuario = TipoUsuario::getAll();
            $users = usuario::getAll();
            Response::render("adminPerfil", ["notas"=>$notas,"tiposUsuario"=>$tiposUsuario, "users"=>$users]);

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

    public function borrarUsuario(){
        $us = usuario::borrarUsuario($_POST["idUsuario2"]);

        header("Location: perfil_administrador?id=".$_POST["userID"], 301);
    }
}
?>