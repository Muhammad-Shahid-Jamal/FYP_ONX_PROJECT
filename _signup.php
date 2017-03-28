<?php
$passNoM = "";
$emaiAllRead="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require("php/php_files/check_user_input.php");
    require("php/php_files/dbHelper.php");
    $userName = checkInput($_POST["name"]);
    $userEmail = checkInput($_POST["email"]);
    $pass1 = checkInput($_POST["pass1"]);
    $pass2 = checkInput($_POST["pass2"]);
    if($pass1 == $pass2){
        $myDb = new DBaseHelper();
        $con = $myDb->getConnection();
        $queryOfNewUser = "INSERT INTO newusers VALUES('','$userName','$userEmail','$pass1')";
        $querOfUsers = "INSERT INTO users VALUES('','$userEmail','$pass1')";
        $queryOfTypeOfUsers = "INSERT INTO type_of_user VALUES('$userEmail',2)";
        if($con->query($queryOfNewUser) && $con->query($querOfUsers) && $con->query($queryOfTypeOfUsers)){
                    session_start();
                    $_SESSION["auth_user"] = "true";
                    $_SESSION["user_name"] = $userName;
                    header('location:index.php');
        }else{
            session_start();
            session_unset();
            session_destroy();
            $emaiAllRead = "Email Already Exist Try New !";
        }
        $myDb->disconnect();
    }else{
        $passNoM = "Password Not Match";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ONX SignUp</title>
        <link type="x-icon" rel="icon" href="images/icons/x-icon.png">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/signup.css">
    </head>
    <body>
        <div class="container">
            <h1 id="user_icon" class="text-center"><span class="glyphicon glyphicon-user"></span></h1>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4" id="login-box">
                    <h2>SignUp</h2>
                    <br>
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <h3>User name</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="User_name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Email</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="abc@example.com" name="email">
                            </div>
                            <p class="text-danger"><strong><?=$emaiAllRead; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <h3>Password</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="****" name="pass1">
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Retype Password</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="****" name="pass2">
                            </div>
                            <p class="text-danger"><strong><?=$passNoM; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="SignUp" class="btn btn-primary" id="submitbtn">
                        </div>
                    </form>
                    <p class="text-warning"><strong>Already Registerd ?</strong><a href="#"> Click here</a></p>
                </div>
            </div>
        </div>
    </body>
</html>