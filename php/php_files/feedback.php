<?php
    require("dbHelper.php");
        header("Content-Type: text/javascript charset=UTF-8");
        $mydb = new DBaseHelper();
        $con = $mydb->getConnection();
        $result = $con->query("select * from userfeed");
        $output = array();
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($output);
        $mydb->disconnect();
?>