<?php
if(!empty($_POST["name"]) && !empty($_POST["pass"])){
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    print("<script>alert(\"$name & $pass\");</script>");
}else{
    print("<script>alert(\"error\")</script>");
}
?>
<!DOCTYPE html>
<html>
    <head>
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
                    <h2>Admin Panel Access</h2>
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <h3>User_name</h3>
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
                            <input type="submit" value="Log_In" class="form-control btn btn-success" id="submitbtn">
                        </div>
                    </form>
                    <p class="text-warning"><strong>Warning!</strong> Only Admin Have to Authorized for this Login.</p>
                </div>
            </div>
        </div>
    </body>
</html>