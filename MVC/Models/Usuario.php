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


        $sql = $con->prepare("CALL usuarioRegistro(?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssii", $pCorreo, $contra, $pFirma, $pNombre, 
        $pApellidoP, $pApellidoM, $pTel, $pAvatar, $pTipoUsuario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function obtenerUsuario($pCorreo, $pContra){
        $DB= new conexion();
        $con = $DB->getConnection();
        //No terminado
        $sql = $con->prepare("CALL usuarioGet_porCorreoContra(?,?)");
        $sql->bind_param("ss", $pCorreo, $pContra);
        $sql->execute();

        //$id=null;

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            session_start();
            while($row_data = $result->fetch_assoc()){
                $_SESSION['usuario']=array(
                    "id_Usuario"=>$row_data['id_Usuario'],
                    "correo"=>$row_data['correo'],
                    "contraseña"=>$row_data['contraseña'],
                    "firma"=>$row_data['firma'],
                    "nombre"=>$row_data['nombre'],
                    "apellido_paterno"=>$row_data['apellido_paterno'],
                    "apellido_materno"=>$row_data['apellido_materno'],
                    "telefono"=>$row_data['telefono'],
                    "avatar"=>$row_data['avatar'],
                    "imagen"=>$row_data['imagen'],
                    "tipoUsuario"=>$row_data['tipoUsuario'],
                    "activo"=>$row_data['activo']
                );
            }
            //$id=$row_data['tipoUsuario'];
        }else {
            # No data actions
            echo 'No data here :(';
        }

        $sql->close();
        $con->close();
        return $_SESSION['usuario']['id_Usuario'];
    }

    public function findUser($id){
        $DB= new conexion();
        $con = $DB->getConnection();
        //No terminado
        $sql = $con->prepare("select tipoUsuario from usuario where id_Usuario = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $id=null;

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            //session_start();
            while($row_data = $result->fetch_assoc()){
                $_SESSION['usuario']=array(
                    $id = $row_data['tipoUsuario']
                );
            }
            //$id=$row_data['tipoUsuario'];
        }else {
            # No data actions
            echo 'No data here :(';
        }

        $sql->close();
        $con->close();
        return $id;
    }
    
}


?>