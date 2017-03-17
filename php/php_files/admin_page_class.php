<?php
class DBaseHelper{
    private $server;
    private $admin;
    private $pass;
    private $dbName;
    private $connection;
    public function __construct($server="127.0.0.1",$admin="root",$pass="",$dbName="onx_management_dbase"){
        $this->server=$server;
        $this->admin=$admin;
        $this->pass=$pass;
        $this->dbName=$dbName;
    }
    public function connectToDatabase(){
        $this->connection = mysql_connect($this->server,$this->admin,$this->pass);
        mysql_select_db($this->dbName);
    }
    public function closeConnection(){
        mysql_close($this->connection);
    }
}
?>