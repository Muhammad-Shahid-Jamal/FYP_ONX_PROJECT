<?php
    require("dbHelper.php");
//    header("Content-Type: text/javascript charset=UTF-8");
    $myDb = new DBaseHelper();
    $con = $myDb->getConnection();
    $result = $con->query("select _id,_name,_user_email,_type from users");
    $output1 = $result->fetch_all(MYSQLI_ASSOC);
    $myDb->disconnect();
    $length = count($output1);
    echo "<h2>Users</h2>";
?>
<div class="table-responsive">
    <table class="table table-bordered table-user">
        <tr>
            <th class="text-center"><h3>_id</h3></th>
            <th class="text-center"><h3>_name</h3></th>
            <th class="text-center"><h3>_email</h3></th>
            <th class="text-center"><h3>_type</h3></th>
        </tr>
        <?php for($i = 0; $i<$length; $i++){
            $id = $output1[$i]["_id"];
            $name = $output1[$i]["_name"];
            $email = $output1[$i]["_user_email"];
            $type = $output1[$i]["_type"];
            $userType = "User";
            if($type == 1){
                $userType = "Admin";
            }
        ?>
        <tr>
            <td><h4><?=$id?></h4></td>
            <td><h4><?=$name?></h4></td>
            <td><h4><?=$email?></h4></td>
            <td><h4><?=$userType?></h4></td>
        </tr>
        <?php }?>
    </table>
</div>