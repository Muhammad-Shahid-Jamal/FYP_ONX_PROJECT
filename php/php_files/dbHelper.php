<?php
class User{
    private $userName;
    private $pass;
    public function __construct($userName="",$pass=""){
        $this->userName = $userName;
        $this->pass = $pass;
    }
}

class DBaseHelper{
    private $server;
    private $admin;
    private $pass;
    private $dbName;
    private $connection;
    private $connected=FALSE;
    public function __construct($server="127.0.0.1",$admin="root",$pass="",$dbName="onx_management_dbase"){
        $this->server=$server;
        $this->admin=$admin;
        $this->pass=$pass;
        $this->dbName=$dbName;
        $this->connected=$this->connect();
    }
    private function connect(){
        $this->connection=new mysqli($this->server,$this->admin,$this->pass,$this->dbName);
        if(!$this->connection){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function checkConnection(){
        return $this->connected;
    }

    public function disconnect(){
        $this->connection->close();
    }
}
?>