<?php
require_once("Conexion.php");

class TipoUsuario{

    public $id;
    public $tipoUsuario;

    public function registro(){
    }

    public function get($id){

    }

    public function update($id){
        
    }

    public function delete($id){

    }

    public function getAll(){
        $DB= new conexion();
        $con = $DB->getConnection();

        $items = [];

        $sql = $con->prepare("select * from tipousuario");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new TipoUsuario();
                $nota->id = $row_data["id_TipoUsuario"];
                $nota->tipoUsuario = $row_data["TipoUsuario"];
            
                array_push($items, $nota);

            }
        }else {
            $items = null;
        }
        $sql->close();
        $con->close();
        return $items;
    }
}