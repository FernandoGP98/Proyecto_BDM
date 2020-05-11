<?php
require_once("Conexion.php");

class test{

    private $personID, $LastName, $FirstName, $Address, $City;
    
    function getPersonID(){
        return $this->personID;
    }
    function setPersonID($p){
        $this->personID = $p;
    }

    function getLastName(){
        return $this->LastName;
    }
    function setLastName($p){
        $this->LastName = $p;
    }

    function getFirstName(){
        return $this->FirstName;
    }
    function setFirstName($p){
        $this->FirstName = $p;
    }

    function getAddress(){
        return $this->Address;
    }
    function setAddress($p){
        $this->Address = $p;
    }

    function getCity(){
        return $this->City;
    }
    function setCity($p){
        $this->City = $p;
    }

    public function registrarTest($ln, $fn, $addr, $city){
        /*$con = new mysqli("localhost", "root", "", "bdm_01");
        $sql = "insert into Test (LastName, FirstName, Address, City) values('".$this->LastName."','".$this->FirstName."','".$this->Address."','".$this->City."')";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        $con->close();*/
        $DB = new conexion;
        $con = $DB->getConnection();
        
        //$sql = $con->prepare("INSERT INTO Test(LastName, FirstName, Address, City) VALUES(?,?,?,?)");
        $sql = $con->prepare("CALL testRegistro(?,?,?,?)");
        $sql->bind_param("ssss", $ln, $fn, $addr, $city);
        $r = $sql->execute();
        $sql->close();
        $con->close();
        return $r;
    }

    public function getTest(){
        $DB = new conexion;
        $con = $DB->getConnection();
        $id=1;
        
        $sql = $con->prepare('CALL testGet(?)');
        $sql->bind_param("i", $id);
        //$sql = $con->prepare("SELECT * from test");
        $sql->execute();
        //mysqli_stmt_bind_param($sql, 'i', $i);
        //mysqli_stmt_execute($sql);


        $result = $sql->get_result();
        if ($result->num_rows>=1) {
            while($row_data = $result->fetch_assoc()){
                echo $row_data['LastName'];
            }
        }else {
            # No data actions
            echo 'No data here :(';
        }
        $sql->close();
        $con->close();
    }
}
?>