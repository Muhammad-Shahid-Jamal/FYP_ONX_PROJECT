<?php
    
    $conection = mysql_connect("127.0.0.1","root","");

    if(!$conection){
        die("Conection Faild ".mysql_error());
    }
?>