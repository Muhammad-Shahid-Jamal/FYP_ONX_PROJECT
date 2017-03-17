<?php
    require("php/php_files/check_user_input.php");
if(!empty($_POST["name"]) && !empty($_POST["pass"])){
    $name = checkInput($_POST["name"]);
    $pass = checkInput($_POST["pass"]);
    print("<script>alert(\"$name & $pass\");</script>");
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
                            <h3>User name</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="User_name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Password</h3>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" placeholder="****" name="pass">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Log In" class="btn btn-success" id="submitbtn">
                        </div>
                    </form>
                    <a href="#"><p class="text-warning"><strong>Forget Password ?</strong> Click here</p></a>
                </div>
            </div>
        </div>
    </body>
</html>