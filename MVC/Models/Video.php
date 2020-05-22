<?php
require_once("Conexion.php");

class Video{
    public $id;
    public $video;

    public function registro($pVideo){
        //insert into imagen (imagen) values (?);
        $DB= new conexion();
        $con = $DB->getConnection();

        $sql = $con->prepare("insert into video (direccion_video) values ('$pVideo')");
        $r=$sql->execute();

        $sql->close();
        $con->close();
        return $r;
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

        $sql = $con->prepare("select * from video");
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            
            while($row_data = $result->fetch_assoc()){
                $nota = new Video();
                $nota->id = $row_data["id_Video"];
                $nota->video = $row_data["direccion_video"];
            
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