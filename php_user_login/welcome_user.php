<?php
$userName = "";
session_start();
if(!$_SESSION["auth_user"]){
    session_start();
    session_unset();
    session_destroy();
    header("location:../index.php");
}
if($_SESSION["welcome"] == "true"){
if(isset($_SESSION["user_name"])){
    $userName = $_SESSION["user_name"];
}
}else{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to ONX</title>
        <link type="x-icon" rel="icon" href="../images/icons/x-icon.png">
        <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../css/welcom_user.css">
    </head>
    <body>
        <div class="container text-center">
            <img src="../images/icons/x-icon.png" alt="Icon" id="onx-icon">
            <h1>Welcome <?= $userName;?></h1>
            <a href="../index.php"><h2>Goto Home Page !</h2></a>
            <img src="../images/icons/logo.png" alt="logo">
            <p class="text-primary">Team</p>
        </div>
    </body>
</html>