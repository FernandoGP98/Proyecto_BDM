<?php
class UsuarioControl{
    public function registrar(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        $_POST["nombre"], $_POST["ApPaterno"], $_POST["ApMaterno"], strval($_POST["telefono"]), null, 3);
        
        if($us == null){
            echo "null";
            Response::render("registrarse",["error"=>false, "correo"=>$_POST["email"]]);
        }else{
            Response::render("login", ["var"=>$us]);
        }
    }

    public function registroByAdmin(){
        $us = Usuario::registrarUsuario($_POST["email"], $_POST["password"], $_POST["username"], 
        "", "", "", "", null, $_POST["tipoUsuario"]);

        $seccion = Seccion::update(2,$_GET["idSeccion"], $_GET["color"],$_GET["orden"],1);
        Seccion::getAll();
        header("Location: perfil?id=".$_SESSION['usuario']['id_Usuario'], 301);
    }

    public function obtener_porCorreoContra(){
        $id = Usuario::obtenerUsuario($_POST["email"], $_POST["password"]);

        if($id != false){
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
        }else{
            Response::render("login",["error"=>true]);
        }
    }

    public function perfil(){
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

        header("Location: perfil?id=".$_POST["userID"], 301);
    }

    public function borrarUsuarioPropio(){
        session_start();
        if(isset($_SESSION['usuario'])){
            unset($_SESSION['usuario']);
            echo "borando session";
        }
        $us = usuario::borrarUsuario($_POST["userID"]);
        header("Location: home", 301);

    }

    public function update(){
        $avatar = null;
        $data = null;
        $data2 = null;
        $name = null;
        if(!empty($_FILES["avatar"]["name"])){
            $name = $_FILES["avatar"]["name"];
            $type = $_FILES["avatar"]["type"];
            $data = file_get_contents($_FILES["avatar"]["tmp_name"]);
            $data2 = addslashes($data);
            $avatar = $data2;

        }

        $r = usuario::updateUsuario($_POST["idUsuario"], $_POST["nombre"],$_POST["paterno"], 
            $_POST["materno"], $_POST["firma"], $_POST["telefono"], $avatar, $_POST["contraseña"]);
        usuario::resssion($_POST["idUsuario"]);

        header("Location: perfil?id=".$_POST["idUsuario"], 301);
        
    }
}
?>