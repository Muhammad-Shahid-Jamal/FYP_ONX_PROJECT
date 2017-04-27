<?php
require("dbHelper.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $myDb = new DBaseHelper();
    $con = $myDb->getConnection();
    $uploadOk = 0;
    echo "<div class='photoUp'></div>";
}else{
    echo "<h1>Sorry you Have not Permission To access that page</h2>";
}
?>