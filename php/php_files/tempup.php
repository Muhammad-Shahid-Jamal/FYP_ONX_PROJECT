<?php
require("dbHelper.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $myDb = new DBaseHelper();
    $con = $myDb->getConnection();
    $uploadOk = 0;
    $path = $_POST["path"];
    echo "<div class='photoUp'></div><h3>$path</h3>";
}else{
    echo "<h1>Sorry you Have not Permission To access that page</h2>";
}
?>