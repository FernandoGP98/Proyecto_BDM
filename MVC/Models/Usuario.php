<?php
require_once("Conexion.php");
class usuario{
    public $id, $correo, $contraseña, $firma, $nombre, $apPaterno, $apMaterno, $telefono, $avatar, $tipoUsuario, $activo;

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
            echo $row_data['avatar'];
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
        //$sql = $con->prepare("select tipoUsuario from usuario where id_Usuario = ?");
        $sql = $con->prepare("CALL usuarioTipoUsuario_ById(?)");
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

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("select * from usuario where activo = 1 and tipoUsuario != 1");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new usuario();
                $nota->id = $row_data['id_Usuario'];
                $nota->correo = $row_data['correo'];
                $nota->contraseña= $row_data['contraseña'];
                $nota->firma = $row_data['firma'];
                $nota->nombre = $row_data['nombre'];
                $nota->apPaterno = $row_data['apellido_paterno'];
                $nota->apMaterno = $row_data['apellido_materno'];
                $nota->telefono = $row_data['telefono'];
                $nota->avatar = $row_data['avatar'];
                //$nota->avatar = $row_data['imagen'];
                $nota->tipoUsuario = $row_data['tipoUsuario'];
                $nota->activo = $row_data['activo'];

                /*
                $id, $correo, $contraseña, $firma, $nombre, 
                $apPaterno, $apMaterno, $telefono, 
                $avatar, $tipoUsuario, $activo;
                */
                array_push($items, $nota);
            }
        }else {
            # No data actions
        }
        $sql->close();
        $con->close();
        return $items;
    }
    
    public function borrarUsuario($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("update usuario set activo = 0 where id_Usuario = ?");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }
}


?>