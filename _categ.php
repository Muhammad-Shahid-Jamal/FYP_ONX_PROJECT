<?php
$categ="";
if(isset($_GET["categ"])){
    switch($_GET["categ"]){
        case "mobile":
            $categ="Mobile";
            $querym="select * from mobiles";
            break;
        case "cars":$categ="Cars";
            break;
        case "pet": $categ="Pets";
            break;
        default: $categ="no Match";
    }
}else{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Categorie</title>
        <link type="x-icon" rel="icon" href="images/icons/x-icon.png">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/categ.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="page-loading-icon"></div>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
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
                        <li class="select"><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                        <li class="select"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Submit Ad</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <img src="images/icons/mob.png" class="img-responsive img-responsive-sm">
            <h1><?=$categ?></h1>
            <h2><?=$querym?></h2>
        </div>
<!--
        <div class="container">
            <form role="form" class="form-inline" method="get">
                <div class="form-group">
                    <label for="brand">Please Select Country</label>
                    <div class="input-group">
                        <input type="text" placeholder="   All Pakistan" default-value="All Pakistan" class="form-control">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-bottom"></i></span>
                    </div>
                    
                    <span class="glyphicon glyphicon-triangle-bottom form-cd"></span>
                </div>
                
                <div class="form-group">
                    <label for="city">Please Select Country</label>
                    <input type="text" placeholder="   All Pakistan" default-value="All Pakistan" class="form-control">
                    <span class="glyphicon glyphicon-triangle-bottom form-cd"></span>
                </div>
            </form>
        </div>
-->
        <div class="container adblock">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <img src="images/userupload/mobiles/nokia-220.jpg" class="img-thumbnail">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <a class="h1 ad" href="#">Out Class Mobile in Cheap Price</a>
                    <h3 class="text-success">Brand</h3>
                    <h4>Details</h4>
                    <p>
                        lorem ipsem ksjfdsjfk sdfjld fk <a href="#">See More</a>
                    </p>
                </div>
                
                <div class="col-sm-4 col-md-4 col-lg-4 text-center">
                    <h2 class="text-primary">Rs: 2,000</h2>
                </div>

            </div>
        </div>
        <div class="container adblock">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <img src="images/automobile-176989_1920.jpg" class="img-thumbnail">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <a class="h1 ad" href="#">Out Class Mobile in Cheap Price</a>
                    <h3 class="text-success">Brand</h3>
                    <h4>Details</h4>
                    <p>
                        lorem ipsem ksjfdsjfk sdfjld fk <a href="#">See More</a>
                    </p>
                </div>
                
                <div class="col-sm-4 col-md-4 col-lg-4 text-center">
                    <h2 class="text-primary">Rs: 2,000</h2>
                </div>

            </div>
        </div>
        <?php
        $mystr = "godsa sd             asd sd asf dfdg dgsdg";
        echo $mystr."<br>";
        echo substr($mystr,0,4);
        ?>
        <script src="js/categ.js"></script>
    </body>
</html>