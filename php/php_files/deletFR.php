<?php
require("dbHelper.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["_id"])){
        $id = $_POST["_id"];
        $myDb = new DBaseHelper();
        $con = $myDb->getConnection();
        $query = "delete from userfeed where _id ='$id'";
        if($con->query($query)){
            $res = array("_delete"=>"true");
            echo json_encode($res);
        }
    }
}
?>