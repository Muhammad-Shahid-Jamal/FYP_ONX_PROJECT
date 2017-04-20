<?php
    //for connecting to server
    require("php/php_files/server_connect_db.php");
    //for checking user input for any wrong input for hacking:-)
    require("php/php_files/check_user_input.php");
    //testing
    session_start();
    $logoutBtn="";
    $userName="My Account";
    $hoverSignUp = "<div class=\"hoverBox\">".
                   "<h2 class=\"text-center\"><a href=\"_signup.php\" style=\"text-decoration:none; color:white;\">Sign Up</a></h2>".
                   "</div>";
    if(!isset($_SESSION["auth_user"])){
        $_SESSION["auth_user"]="false";
    }else{
        if($_SESSION["auth_user"]=="true"){
            $_SESSION["welcome"]="false";
            $logoutBtn = "<li class=\"select\"><a href=\"php_user_login/user_logout.php\"><span class=\"glyphicon glyphicon-off\"></span> Logout</a></li>";
            $userName=$_SESSION["user_name"];
            $hoverSignUp="";
        }
    }
    //checking condition of form of feedback
    if($_POST){
        session_unset();
        session_destroy();
        if(!empty($_POST["nameOfUserFeed"]) && !empty($_POST["emailOfUserFeed"]) && !empty($_POST["msgOfUserFeed"])){
            mysql_select_db("onx_management_dbase");
            $name = checkInput($_POST["nameOfUserFeed"]);
            $email = checkInput($_POST["emailOfUserFeed"]);
            $msg = checkInput($_POST["msgOfUserFeed"]);
           $queryOfInsert = "INSERT INTO userfeed (_name, _email, _msg) values('$name','$email','$msg')";
           if(mysql_query($queryOfInsert,$conection)){
              echo("<script>alert('Thanks for Feedback');</script>");
           }else{
             echo("<script>alert('something went Wrong!');</script>");
           }
       }else{
             if(isset($_POST["nameOfUserFeed"]) && isset($_POST["emailOfUserFeed"]) && isset($_POST["msgOfUserFeed"])){
             echo("<script> alert(\"Please Fill Feedback Form\");</script>");
             }
        }
    }
    mysql_close($conection);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ONline eXchange in Pakistan</title>
        <link type="x-icon" rel="icon" href="images/icons/x-icon.png">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="page-loading-icon"></div>
        <!--Navbar in this navbar we have icon and name and navigation buttons-->
        <nav class="navbar navbar-default header navbar-fixed-top" role="navigation" id="onxNav">
            <div class="container navbar-my">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a href="#" class="navbar-brand">
                        <img src="images/icons/logo.png" class="logo">| ONline eXchange
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="select"><a href="_login.php"><span class="glyphicon glyphicon-user"></span> <?= $userName;?></a></li>
                        <li class="select"><a href="_postad.html"><span class="glyphicon glyphicon-log-in"></span> Submit Ad</a></li>
                        <?php echo $logoutBtn; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Slider Box-->
        <div class="container-fluid slider-box" id="slider">
            <img src="images/slider/sl1.jpg" class="slider show img-responsive">
            <img src="images/slider/sl2.jpg" class="slider">
            <img src="images/slider/sl3.jpg" class="slider">
            <img src="images/slider/sl4.jpg" class="slider">
            <img src="images/slider/sl5.jpg" class="slider">
            <img src="images/slider/sl6.jpg" class="slider">
            <img src="images/slider/sl7.jpg" class="slider">
            <img src="images/slider/sl8.jpg" class="slider">
            <!--Hover SignUp Button-->
            <?php echo $hoverSignUp; ?>
        </div>
        <!--heading of categories-->
        <div class="visible-xs container text-center categ-sm">
            <h1>Categories</h1>
        </div>
        <div class="visible-lg visible-md visible-sm container text-center categ">
            <h1>Categories</h1>
        </div>
        <!--arrows < > -->
        <div class="visible-lg visible-md visible-sm container-fluid arrows">
            <div class="raw">
                <div class="col-sm-6 col-md-6 col-lg-6 text-left">
                    <h1><span class="glyphicon glyphicon-chevron-left arrow-anim" id="prev"></span></h1>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                    <h1><span class="glyphicon glyphicon-chevron-right arrow-anim" id="next"></span></h1>
                </div>
            </div>
        </div>
<!------this is for md and lg and sm screen sizes later will be modified-->
        <div class="container cat visible-md visible-lg visible-sm">
            <div class="row md-cat">
                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                    <img src="images/icons/mob.png" alt="Mobile Icon" class="img-responsive cat-icons">
                    <a href="_categ.php?categ=mobile" class="h3" style="text-decoration:none; display:block;">Mobile</a>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                    <img src="images/icons/car.png" alt="Car Icon" class="img-responsive cat-icons">
                    <a href="_categ.php?categ=cars" class="h3" style="text-decoration:none; display:block;">Cars</a>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                    <img src="images/icons/bikes.png" alt="Bikes" class="img-responsive cat-icons">
                    <a href="_categ.php?categ=bikes" class="h3" style="text-decoration:none; display:block;">Bike</a>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                    <img src="images/icons/elec.png" alt="electronic item icon" class="img-responsive cat-icons">
                    <a href="_categ.php?categ=electronic" class="h3" style="text-decoration:none; display:block;">Electronic Item</a>
                </div>
            </div>
        </div>
<!------this is for small screens only latter will be modified through js but this time cary on-->
        <div class="container visible-xs">
        <!--landing page categorie-->
            <div class="row" id="categ1">
                <div class="cat text-center">
                    <img src="images/icons/mob.png" alt="mobile pic">
                    <a href="_categ.php?categ=mobile" class="h3" style="text-decoration:none; display:block;">Mobile</a>
                </div>
                <div class="cat text-center">
                    <img src="images/icons/car.png" alt="Car Icon">
                    <a href="_categ.php?categ=cars" class="h3" style="text-decoration:none; display:block;">Cars</a>
                </div>
                <div class="cat text-center">
                    <img src="images/icons/bikes.png" alt="Bikes">
                    <a href="_categ.php?categ=bikes" class="h3" style="text-decoration:none; display:block;">Bike</a>
                </div>
                <div class="cat text-center">
                    <img src="images/icons/elec.png" alt="electronic item icon">
                    <a href="_categ.php?categ=electronic" class="h3" style="text-decoration:none; display:block;">Electronic Item</a>
                </div>
                <!--Next Categ for small screens always visible-->
                <div class="text-center cat">
                    <img src="images/icons/pet.png">
                    <a href="_categ.php?categ=pet" class="h3" style="text-decoration:none; display:block;">Pets</a>
                </div>
                <div class="text-center cat">
                    <img src="images/icons/furn.png">
                    <a href="_categ.php?categ=furn" class="h3" style="text-decoration:none; display:block;">Furniture</a>
                </div>
                <div class="text-center cat">
                    <img src="images/icons/kids.png">
                    <a href="_categ.php?categ=kids" class="h3" style="text-decoration:none; display:block;">Kids</a>
                </div>
                <div class="text-center cat">
                    <img src="images/icons/prop.png">
                    <a href="_categ.php?categ=prop" class="h3" style="text-decoration:none; display:block;">Properties</a>
                </div>
            </div>
        </div>
        <!--Footer-->
        <footer class="container-fluid footer">
            <div class="raw" style="margin-top:20px;">
                <div class="col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 text-center" style="background-color:white; border-radius:2%;">
                            <img src="images/icons/logo.png" class="img-responsive" >
                            <h4>Pakistan</h4>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 text-center">
                            <h5 style="color:white;">Terms Of Use</h5>
                            <h4 style="color:white;"><span class="glyphicon glyphicon-chevron-down"></span></h4>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                            <h5 style="color:white;">Follow Us</h5>
                                <img src="images/icons/fb.png" alt="facebook">
                                <img src="images/icons/twit.png" alt="Tweter">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <form id="feedbackform" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <fieldset>
                            <legend style="color:white;">Your Feedback</legend>
                            <div class="form-group">
                                <label for="name" style="color:white;">Your Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="nameOfFeedbacker" name="nameOfUserFeed">
                                <span class="text-danger" id="feedN"></span>
                            </div>
                            <div class="form-group">
                                <label for="email" style="color:white;">Your Email</label>
                                <input type="email" placeholder="example@gmail.com" class="form-control" id="emailOfFeedbacker" name="emailOfUserFeed">
                                <span class="text-danger" id="feedE"></span>
                            </div>
                            <div class="form-group">
                                <label for="massage" style="color:white;">Massage</label>
                                <textarea class="form-control" rows="3" id="feedbackMsg" name="msgOfUserFeed"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </footer>
        <script src="js/app.js" type="text/javascript"></script>
        <script src="js/app1.js"></script>
    </body>
</html>