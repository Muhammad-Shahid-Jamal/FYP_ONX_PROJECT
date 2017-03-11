<?php
    require("php/php_files/server_connect_db.php");
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
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <div class="page-loading-icon"></div>
        <!--Navbar in this navbar we have icon and name and navigation buttons-->
        <nav class="navbar navbar-default header navbar-fixed-top" role="navigation">
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
                        <li class="select"><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                        <li class="select"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Submit Add</a></li>
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
            <div class="hoverBox">
                <h2 class="text-center">Sign Up</h2>
            </div>
        </div>
        <!--heading of categories-->
        <div class="visible-sm visible-xs container text-center categ-sm">
            <h1>Categories</h1>
        </div>
        <div class="visible-lg visible-md container text-center categ">
            <h1>Categories</h1>
        </div>
        <!--arrows < > -->
        <div class="visible-lg visible-md container-fluid arrows">
            <div class="raw">
                <div class="col-md-2 col-lg-2 text-left">
                    <h1><span class="glyphicon glyphicon-chevron-left arrow-anim" id="prev"></span></h1>
                </div>
                <div class="col-lg-push-8 col-md-push-8 col-md-2 col-lg-2 text-right">
                    <h1><span class="glyphicon glyphicon-chevron-right arrow-anim" id="next"></span></h1>
                </div>
            </div>
        </div>
        <!--Categories all-->
        <div class="container">
        <!--landing page categorie-->
            <div class="row" id="categ1">
                <div class="col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/mob.png" alt="mobile pic">
                    <h3>Mobile</h3>
                </div>
                <div class="col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/car.png" alt="Car Icon">
                    <h3>Cars</h3>
                </div>
                <div class="col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/bikes.png" alt="Bikes">
                    <h3>Bike</h3>
                </div>
                <div class="col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/elec.png" alt="electronic item icon">
                    <h3>Electronic Item</h3>
                </div>
            </div>
            <!--next Categoerie for md and lg-->
            <div class="row" id="categ2">
                <div class="visible-md visible-lg col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/pet.png">
                    <h3>Mobile</h3>
                </div>
                <div class="visible-md visible-lg col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/furn.png">
                    <h3>Cars</h3>
                </div>
                <div class="visible-md visible-lg col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/kids.png">
                    <h3>Bike</h3>
                </div>
                <div class="visible-md visible-lg col-md-3 col-lg-3 cat text-center">
                    <img src="images/icons/prop.png">
                    <h3>Electronic Item</h3>
                </div>
            </div>
                <!--Next Categ for small screens always visible-->
            <div class="raw">
                <div class="visible-sm visible-xs text-center cat">
                    <img src="images/icons/pet.png">
                    <h3>Pets</h3>
                </div>
                <div class="visible-sm visible-xs text-center cat">
                    <img src="images/icons/furn.png">
                    <h3>Furneture</h3>
                </div>
                <div class="visible-sm visible-xs text-center cat">
                    <img src="images/icons/kids.png">
                    <h3>Kids</h3>
                </div>
                <div class="visible-sm visible-xs text-center cat">
                    <img src="images/icons/prop.png">
                    <h3>Properties</h3>
                </div>
            </div>
        </div>
        <!--Footer-->
        <footer class="container-fluid footer">
            <div class="raw">
                <div class="col-md-8 col-lg-8 test1">a</div>
                <div class="col-md-4 col-lg-4 test">
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="feedback">
                        <fieldset>
                            <legend>Your Feedback</legend>
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="nameOfFeedbacker">
                                <span class="text-danger" id="feedN"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" placeholder="example@gmail.com" class="form-control" id="emailOfFeedbacker">
                                <span class="text-danger" id="feedE"></span>
                            </div>
                            <div class="form-group">
                                <label for="massage">Massage</label>
                                <textarea class="form-control" rows="3" id="feedbackMsg"></textarea>
                                <span class="text-danger" id="feedMs">asds</span>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
<!--
           <div class="raw">
               <div class="col-lg-11 col-md-11 col-sm-11 col-lg-offset-1 col-md-offset-1">
                   <ul class="terms">
                       <li>Terms of Use</li>
                       <li>Help &amp; Contact Us</li>
                       <li>Who We Are</li>
                   </ul>
               </div>
            </div>
            <div class="raw">
                <div class="col-lg-3 col-md-3 col-lg-offset-7 col-md-offset-7 text-center">
                    <h4 class="social">Connect With Us</h4>
                </div>
            </div>
            <div class="raw">
                <div class="col-lg-3 col-md-3 col-lg-push-7 col-md-push-7 text-center">
                    <img src="images/icons/fb.png">
                    <img src="images/icons/twit.png">
                    <img src="images/icons/gogl.png">
                    <img src="images/icons/inst.png">
                </div>
            </div>
-->
        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>