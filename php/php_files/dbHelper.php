<?php
class User{
    private $userEmail;
    private $pass;
    public function __construct($userEmail="",$pass=""){
        $this->userEmail = $userEmail;
        $this->pass = $pass;
    }
    public function getUserEmail(){
        return $this->userEmail;
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

    public function getConnection(){
        return $this->connection;
    }

    public function checkUser(User $user){
        $useremail = $user->getUserEmail();
        $password = $user->getPass();
        $query = "select _user_email,_pass from users where _user_email='$useremail'";
        $result=$this->connection->query($query);
            while($row = $result->fetch_assoc()){
                 $this->userData[0] = $row["_user_email"];
                 $this->userData[1] = $row["_pass"];
            }
            if($this->userData[0] != "" && $this->userData[1] != ""){
                return $this->userData;
            }else{
                return FALSE;
            }
    }

    public function userFrom($userEmail){
        $valueOfUser="";
        $query = "select _type from type_of_user where _user_email='$userEmail'";
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