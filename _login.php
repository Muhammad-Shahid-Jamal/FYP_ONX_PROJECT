<?php
    require("php/php_files/check_user_input.php");
    require("php/php_files/dbHelper.php");
    $errorMsg="";
    $errorMsg1="";
    $userEmail="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($_POST["email"]) && !empty($_POST["pass"])){
            
            $email = checkInput($_POST["email"]);
            $pass = checkInput($_POST["pass"]);
            $myDb = new DBaseHelper();
            $user = new User($email,$pass);
            $data = $myDb->checkUser($user);
            
            if($data == FALSE){
                $errorMsg = "Your Email is incorect *";
                $userEmail = $email;
            }else{
                if($data[1] == $email && $data[2] == $pass){
                    if($data[3] == 1){
                        session_start();
                        $_SESSION["auth_admin"] = "true";
                        header('location:php/php_admin_pannel/administration.php');
                    }else if($data[3] == 2){
                        session_start();
                        $_SESSION["auth_user"] = "true";
                        $_SESSION["user_name"] = $data[0];
                        header('location:index.php');
                    }
                }else{
                        session_start();
                        session_unset();
                        session_destroy();
                        $userEmail = $email;
                        $errorMsg1 = "Your Password is incorect";
                    }    
                }
            
            $myDb->disconnect();        
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ONline eXchange in Pakistan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="x-icon" rel="icon" href="images/icons/x-icon.png">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/_admin-style.css">
    </head>
    <body>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4" id="login-box">
                    <img src="images/icons/logo.png" alt="ONX LOGO" class="img-responsive">
                    <h2 style="color: #0080c0; margin-top: -5px;">Sign In</h2>
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <h3>Your Email</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="email" class="form-control" placeholder="Your_Email" name="email" value=<?=$userEmail; ?>>
                            </div>
                            <p class="text-danger"><strong><?=$errorMsg; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <h3>Password</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="****" name="pass">
                            </div>
                            <p class="text-danger"><strong><?=$errorMsg1; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Log In" class="btn btn-success" id="submitbtn">
                        </div>
                    </form>
                    <p class="text-warning"><strong>Forget Password ?</strong><a href="#"> Click here</a></p>
                </div>
            </div>
        </div>
    </body>
</html>