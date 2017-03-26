<?php
session_start();
if(!$_SESSION["auth_user"]){
    header("location:../_login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>USer log Test</title>
    </head>
    <body>
        <h1>Welcome User</h1>
        <a href="../php/php_admin_pannel/logout.php">Logout!</a>
    </body>
</html>