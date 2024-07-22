<?php
include 'Dbh.class.php';
class Test extends Dbh{
    public function GetUsers(){
        $sql="SELECT * FROM utilisateurs ";
        $stmt=$this->connect()->query($sql);
        while($row=$stmt->fetch()){
            echo $row['nom'].' '.$row['prenom'].'<br>';
            
        }
    }
}

