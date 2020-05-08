<?php
class UsuarioControl{
    public function registrar(){
        $us = usuario::registrarUsuario($_POST["username"]);
    }
}
?>