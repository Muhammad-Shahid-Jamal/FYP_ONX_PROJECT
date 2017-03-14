<?php
    // require("../php_files/admin_page_class.php");
    // $check = new Page();
    // echo $check->getName();
    $welcome = "undefined";
    define("ADMIN","shahid_jamal");
    define("PASS","abc123");
        $uName = $_POST["name"];
        $uPass = $_POST["pass"];
        if($uName == ADMIN && $uPass == PASS){
            $welcome = "Welcome Admin";
        }else{
            $welcome = "Incorect Password";
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Pannel</title>
    </head>
    <body>
        <h1>Shahid</h1>
        <?php echo $welcome; ?>
    </body>
</html>