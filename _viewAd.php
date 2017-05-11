<?php
 if(isset($_GET["_id"])){
     require("php/php_files/check_user_input.php");
     require("php/php_files/dbHelper.php");
     $id = checkInput($_GET["_id"]);
     $mydb = new DBaseHelper();
     $con = $mydb->getConnection();
     $query = "select * from ads where _id='$id'";
     if($result = $con->query($query)){
         $output = $result->fetch_all(MYSQLI_ASSOC);
         $_id = $output[0]["_id"];
         $_title = $output[0]["_title"];
         $_price = $output[0]["_price"];
         $_discrip = $output[0]["_discription"];
         $_mainPic = $output[0]["_mainpic"];
         $_img2 = $output[0]["_img2"];
         $_img3 = $output[0]["_img3"];
         $_img4 = $output[0]["_img4"];
         $_img5 = $output[0]["_img5"];
         $_img6 = $output[0]["_img6"];
         $_name = $output[0]["_name"];
         $_phone = $output[0]["_phone"];
         $province = $output[0]["_provence"];
         $city = $output[0]["_city"];
         $timeStamp = $output[0]["_date_and_time"];
     }
     $mydb->disconnect();
 }else{
     header("location:index.php");
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>ONline eXchange in pakistan</title>
	    <link type="x-icon" rel="icon" href="images/icons/x-icon.png">
	    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	    <link type="text/css" rel="stylesheet" href="css/_viewAd.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
            <a href="index.php" id="homeDir">HOME <span class="glyphicon glyphicon-home"></span></a>
        <div class="container" id="main-div">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8" style="box-shadow: 1px 1px 7px lightgrey; padding: 10px;">
                    <div id="picOfAdd">
                        <img src="<?=$_mainPic ?>" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div id="priceTag">
                        <h1>Rs: <?=$_price ?></h1>
                    </div>
                    <div class="text-center my-box">
                        <div class="glyphicon glyphicon-user" id="user"></div>
                        <h3>Name : <?=$_name ?></h3>
                        <h3>Provence : <?=$province ?></h3>
                        <h3>City : <?=$city ?></h3>
                    </div>
                    <div class="text-center" id="phoneNum">
                        <h2>Mobile Number</h2>
                        <h3><?=$_phone ?></h3>
                    </div>
                    <div class="text-center">
                        <h2>Posted On</h2>
                        <h4><span class="glyphicon glyphicon-bullhorn"></span> <?=$timeStamp ?></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="row" id="img-timeline">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <img src="<?=$_mainPic ?>" class="img-responsive" style="filter:opacity(100%);" data-imgsrc="<?=$_mainPic ?>">
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <?php if($_img2 != ""){ 
                                    $imgTag = "<img src=\"$_img2\" class=\"img-responsive\" data-imgsrc=\"$_img2\" >";
                                                      } else{$imgTag = "";} 
                                ?>
                                <?=$imgTag ?>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <?php if($_img3 != ""){ 
                                    $imgTag = "<img src=\"$_img3\" class=\"img-responsive\" data-imgsrc=\"$_img3\">";
                                                      }else{$imgTag = "";} 
                                ?>
                                <?=$imgTag ?>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <?php if($_img4 != ""){ 
                                    $imgTag = "<img src=\"$_img4\" class=\"img-responsive\" data-imgsrc=\"$_img4\">";
                                                      }else{$imgTag = "";} 
                                ?>
                                <?=$imgTag ?>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <?php if($_img5 != ""){ 
                                    $imgTag = "<img src=\"$_img5\" class=\"img-responsive\" data-imgsrc=\"$_img5\">";
                                                      }else{$imgTag = "";} 
                                ?>
                                <?=$imgTag ?>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="img-thumb">
                                <?php if($_img6 != ""){ 
                                    $imgTag = "<img src=\"$_img6\" class=\"img-responsive\" data-imgsrc=\"$_img6\">";
                                                      }else{$imgTag="";} 
                                ?>
                                <?=$imgTag ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h1><?=$_title ?></h1>
            <h2>Discription</h2>
            <p><?=$_discrip ?></p>
        </div>
        <div class="container text-center" id="footer">
            <h2>Do you have something for sell?</h2>
            <h4>Post your Ad FOR FREE on ONX</h4>
            <a href="_postad.php" class="btn btn-primary">Submit an Ad</a>
        </div>
        <script src="js/_view.js"></script>
    </body>
</html>