<?php
class Test extends Dbh{
    public function GetUsers(){
        $sql="SELECT * FROM users ";
        $stmt=$this->connect()->query($sql);
        while($row=$stmt->fetch()){
            echo $row['users_name'];
        }
    }
}
