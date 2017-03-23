<?php
class User{
    private $userName;
    private $pass;
    public function __construct($userName="",$pass=""){
        $this->userName = $userName;
        $this->pass = $pass;
    }
    public function getUserName(){
        return $this->userName;
    }

    public function getPass(){
        return $this->pass;
    }
}

class DBaseHelper{
    private $server;
    private $admin;
    private $pass;
    private $dbName;
    private $connection;
    private $userData = array("","");
    public function __construct($server="127.0.0.1",$admin="root",$pass="",$dbName="onx_management_dbase"){
        $this->server=$server;
        $this->admin=$admin;
        $this->pass=$pass;
        $this->dbName=$dbName;
        $this->connect();
    }
    private function connect(){
        $this->connection=new mysqli($this->server,$this->admin,$this->pass,$this->dbName);
        if($this->connection->connect_error){
            die("Connection Faild ".$this->connection->connect_error);
        }
    }

    public function checkUser(User $user){
        $username = $user->getUserName();
        $password = $user->getPass();
        $query = "select _user,_pass from users where _user='$username'";
        $result=$this->connection->query($query);
            while($row = $result->fetch_assoc()){
                 $this->userData[0] = $row["_user"];
                 $this->userData[1] = $row["_pass"];
            }
            if($this->userData[0] != "" && $this->userData[1] != ""){
                return $this->userData;
            }else{
                return FALSE;
            }
    }

    public function userFrom($userName){
        $valueOfUser="";
        $query = "select _type from type_of_user where _user='$userName'";
        $result=$this->connection->query($query);
        while($row=$result->fetch_assoc()){
            $valueOfUser = $row["_type"];
        }
        if($valueOfUser != ""){
            return $valueOfUser;
        }else{
            return FALSE;
        }

    }

    public function disconnect(){
        $this->connection->close();
    }
}
?>