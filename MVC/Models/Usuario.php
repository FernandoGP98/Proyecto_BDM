<?php
require_once("Conexion.php");
class usuario{
    public $id, $correo, $contraseña, $firma, $nombre, $apPaterno, $apMaterno, $telefono, $avatar, $tipoUsuario, $activo;

    public function registrarUsuario($pCorreo, $contra, $pFirma, $pNombre, $pApellidoP, $pApellidoM, 
    $pTel, $pAvatar, $pTipoUsuario){
        $DB= new conexion();
        $con = $DB->getConnection();

        if($pFirma == null) $pFirma = "";
        if($pNombre == null) $pNombre = "";
        if($pApellidoP == null) $pApellidoP = "";
        if($pApellidoM == null) $pApellidoM = "";
        if($pTel == null) $pTel = "";

        $sql = $con->prepare("CALL usuarioRegistro(?,?,?,?,?,?,?,null,?)");
        $sql->bind_param("sssssssi", $pCorreo, $contra, $pFirma, $pNombre, 
        $pApellidoP, $pApellidoM, $pTel, $pTipoUsuario);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r; //si falla regresa null,false,"(vacio)"
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
                if($row_data["activo"]== 0){
                    return false;
                }else{
                    $_SESSION['usuario']=array(
                        "id_Usuario"=>$row_data['id_Usuario'],
                        "correo"=>$row_data['correo'],
                        "contraseña"=>$row_data['contraseña'],
                        "firma"=>$row_data['firma'],
                        "nombre"=>$row_data['nombre'],
                        "apellido_paterno"=>$row_data['apellido_paterno'],
                        "apellido_materno"=>$row_data['apellido_materno'],
                        "telefono"=>$row_data['telefono'],
                        "imagen"=>$row_data['imagen'],
                        "tipoUsuario"=>$row_data['tipoUsuario'],
                        "activo"=>$row_data['activo']
                    );
                }
            }
            //$id=$row_data['tipoUsuario'];
        }else {
            # No data actions
            return false;
        }
        $sql->close();
        $con->close();
        return $_SESSION['usuario']['id_Usuario'];
    }

    public function findUser($id){
        $DB= new conexion();
        $con = $DB->getConnection();

        //$sql = $con->prepare("select * from vusuario where id_Usuario = ?");
        $sql = $con->prepare("CALL usuarioGet_ById(?)");
        $sql->bind_param("i", $id);
        $sql->execute();

        $usuario = new usuario();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            //session_start();
            while($row_data = $result->fetch_assoc()){
               
                $usuario->id = $row_data['id_Usuario'];
                $usuario->correo = $row_data['correo'];
                $usuario->contraseña= $row_data['contraseña'];
                $usuario->firma = $row_data['firma'];
                $usuario->nombre = $row_data['nombre'];
                $usuario->apPaterno = $row_data['apellido_paterno'];
                $usuario->apMaterno = $row_data['apellido_materno'];
                $usuario->telefono = $row_data['telefono'];
                $usuario->imagen = $row_data['imagen'];
                $usuario->tipoUsuario = $row_data['tipoUsuario'];
                $usuario->activo = $row_data['activo'];
            
            }
            //$id=$row_data['tipoUsuario'];
        }else {
            # No data actions
            echo 'No data here :(';
        }

        $sql->close();
        $con->close();
        return $usuario;
    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("CALL usuarioGet_All();");
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
                $nota->imagen = $row_data['imagen'];
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

        $sql = $con->prepare("call usuarioBorrar(?);");
        $sql->bind_param("i", $id);
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function updateUsuario($id, $nombre, $paterno, $materno, $firma, $telefono, $avatar, $contraseña){
        $DB= new conexion();
        $con = $DB->getConnection();

        if($avatar == null){
            $sql = $con->prepare("CALL spUpdateUsuario(?,?,?,?,?,?, null,?)");
            $sql->bind_param("issssss", $id, $nombre, $paterno, $materno, $firma, $telefono, $contraseña);
        }else{
            $sql = $con->prepare("CALL spUpdateUsuario(?,?,?,?,?,?,'$avatar',?)");
            $sql->bind_param("issssss", $id, $nombre, $paterno, $materno, $firma, $telefono,$contraseña);    
        }
        $r=$sql->execute();
        $sql->close();
        $con->close();
        return $r; //si falla regresa null,false,"(vacio)"
    }

    public function resssion($id){
        $DB= new conexion();
        $con = $DB->getConnection();
        //No terminado
        $sql = $con->prepare("call psUsuarioByID(?)");
        $sql->bind_param("i", $id);
        $sql->execute();

        //$id=null;

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            session_start();
            if(isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }
            while($row_data = $result->fetch_assoc()){
                if($row_data["activo"]== 0){
                    return false;
                }else{
                    $_SESSION['usuario']=array(
                        "id_Usuario"=>$row_data['id_Usuario'],
                        "correo"=>$row_data['correo'],
                        "contraseña"=>$row_data['contraseña'],
                        "firma"=>$row_data['firma'],
                        "nombre"=>$row_data['nombre'],
                        "apellido_paterno"=>$row_data['apellido_paterno'],
                        "apellido_materno"=>$row_data['apellido_materno'],
                        "telefono"=>$row_data['telefono'],
                        "imagen"=>$row_data['imagen'],
                        "tipoUsuario"=>$row_data['tipoUsuario'],
                        "activo"=>$row_data['activo']
                    );
                }
            }
            //$id=$row_data['tipoUsuario'];
        }else {
            # No data actions
            return false;
        }
        $sql->close();
        $con->close();
        //return $_SESSION['usuario']['id_Usuario'];
    }
}

?>