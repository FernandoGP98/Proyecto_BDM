<?php
require_once("Conexion.php");
class usuario{
    private $correo, $contraseña, $firma, $nombre, $apPaterno, $apMaterno, $telefono, $avatar, $tipoUsuario, $activo;

    function getCorreo(){
        return $this->correo;
    }
    function setCorreo($p){
        $this->correo = $p;
    }

    function getContraseña(){
        return $this->contraseña;
    }
    function setContraseña($p){
        $this->contraseña = $p;
    }

    function getFirma(){
        return $this->firma;
    }
    function setFirma($p){
        $this->firma = $p;
    }

    function getNombre(){
        return $this->nombre;
    }
    function setNombre($p){
        $this->nombre = $p;
    }

    function getApPaterno(){
        return $this->apPaterno;
    }
    function setApPaterno($p){
        $this->apPaterno = $p;
    }

    function getApMaterno(){
        return $this->apMaterno;
    }
    function setApMaterno($p){
        $this->apMaterno = $p;
    }

    function getTelefono(){
        return $this->telefono;
    }
    function setTelefono($p){
        $this->telefono = $p;
    }

    function getAvatar(){
        return $this->avatar;
    }
    function setAvatar($p){
        $this->avatar = $p;
    }

    function getTipoUsuario(){
        return $this->tipoUsuario;
    }
    function setTipoUsuario($p){
        $this->tipoUsuario = $p;
    }

    function getActivo(){
        return $this->activo;
    }
    function setActivo($p){
        $this->activo = $p;
    }

    public function registrarUsuario($pCorreo, $contra, $pFirma, $pNombre, $pApellidoP, $pApellidoM, 
    $pTel, $pAvatar, $pTipoUsuario){
        $DB= new conexion();
        $con = $DB->getConnection();
        /*$sql = $con->prepare("CALL usuarioRegistro(?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssii", $pCorreo, $contra, $pFirma, $pNombre, 
        $pApellidoP, $pApellidoM, $pTel, $pAvatar, $pTipoUsuario);
        $sql->execute();
        $sql->close();*/

        $storedProc = "CALL usuarioRegistro(?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($con, $storedProc);
        mysqli_stmt_bind_param($stmt, "sssssssii",$pCorreo, $contra, $pFirma, $pNombre, 
        $pApellidoP, $pApellidoM, $pTel, $pAvatar, $pTipoUsuario);
        //QUE PEDO NO ESTA HACIENDO LO DEL STORE >:0 PERO NO MARCA NINGUN ERROR
        mysqli_stmt_execute($stmt);
        return "Ola";
        mysqli_stmt_close($stmt);

        $con->close();
    }

    function obtenerUsuario(){
        $temp="Hola soy un usuario desde el Models Usuario, controlado por obtenerUsuario";
        return $temp;
    }
}


?>