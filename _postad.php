<?php
require("php/php_files/check_user_input.php");
//$title ="";
//$categ="";
//$disc = "";
//$price = "";
//$name = "";
//$number = "";
//$provence = "";
//$city = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["titleOfAd"]) && 
       !empty($_POST["category"]) && 
       !empty($_POST["price"]) && 
       !empty($_POST["disc"]) && 
       !empty($_POST["name"]) && 
       !empty($_POST["number"]) && 
       !empty($_POST["prove"]) && 
       !empty($_POST["city"]) &&
       !empty($_POST["values-of-img"])){
        //in condition--------------------------
        require("php/php_files/dbHelper.php");
//collecting data..
        $title= checkInput($_POST["titleOfAd"]);
        $categ = checkInput($_POST["category"]);
        $price = checkInput($_POST["price"]);
        $disc = checkInput($_POST["disc"]);
        $name = checkInput($_POST["name"]);
        $number = checkInput($_POST["number"]);
        $provence = checkInput($_POST["prove"]);
        $city = checkInput($_POST["city"]);
        $valuesOfImages = checkInput($_POST["values-of-img"]);
        
// this is for taking name of images and pass them through loop for joining and assigning to new array 
        $imagesValuesArrays = str_word_count($valuesOfImages,1);
        $lengthOfValuesArray = count($imagesValuesArrays);
        $lengthOfValuesArray = ($lengthOfValuesArray - 1);
        $imagesForStoring = array("","","","","","");
        $j = 0;
        for($i=0;$i<$lengthOfValuesArray;$i++){
            $imagesForStoring[$j] = $imagesValuesArrays[$i].".".$imagesValuesArrays[$i+1];
            $j++;
            $i++;
        }
        
//now this is for inserting in database
        $refOfImg = "images/userupload/mobiles/";
        $srcOfImages = array("","","","","","");
        for($i=0;$i<6;$i++){
            if($imagesForStoring[$i] != ""){
                $srcOfImages[$i] = $refOfImg.$imagesForStoring[$i];
            }
        }
        $mydb = new DBaseHelper();
        $con = $mydb->getConnection();
        $queyOfInst = "INSERT INTO ads VALUES".
                      "('','$categ','$title','$price',".
                      "'$disc','$srcOfImages[0]',".
                      "'$srcOfImages[1]','$srcOfImages[2]',".
                      "'$srcOfImages[3]','$srcOfImages[4]',".
                      "'$srcOfImages[5]','$name','$number','$provence','$city')";
//execute query of db
        if($con->query($queyOfInst)){
            echo "<!DOCTYPE html>".
                    "<html>".
                        "<head>".
                            "<title>Welcome to ONX</title>".
                            "<link type=\"x-icon\" rel=\"icon\" href=\"images/icons/x-icon.png\">".
                            "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/bootstrap.min.css\">".
                            "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/_postad.css\">".
                        "</head>".
                        "<body>".
                            "<div class=\"container text-center\">".
                                "<img src=\"images/icons/x-icon.png\" alt=\"Icon\" id=\"onx-icon\">".
                                "<h1>Your Add Successfully Added to ONX</h1>".
                                "<a href=\"_categ.php?categ=mobile\"><h2>Visit Add !</h2></a>".
                                "<img src=\"images/icons/logo.png\" alt=\"logo\">".
                                "<p class=\"text-primary\">Team</p>".
                            "</div>".
                        "</body>".
                    "</html>";
            die();
        }else{
            echo "Error not update";
            die();
        }
        
        die();
    
    }else{
        $title = "Error";
    }
//    $name = $_POST["values-of-img"];
//    echo $name."<br>";
//    $check1 = str_word_count($name,1);
//    $lent = count($check1);
//    foreach($check1 as $ans){
//        print("<br>".$ans);
//    }
//    $imgCheck = $check1[0].".".$check1[1];
//    echo "<br>".$imgCheck;
////    $mainDir = exec("move images\\userupload\\mobiles\\temp\\main\\$imgCheck images\\userupload\\mobiles\\ ",$output,$return);
//    die();
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
	<link type="text/css" rel="stylesheet" href="css/_postad.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
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
                        <li class="select"><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2 id="heading">Submit AD</h2>
        </div>
        <div class="container">
        	<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        		<div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Ad Title<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-6 col-sm-6 col-lg-6">
                		<input type="text" class="form-control" name="titleOfAd" placeholder="Ad Title">
                	</div>
                </div>
                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Category<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-6 col-sm-6 col-lg-6" id="slCat">
                        	<select class="form-control" name="category" id="catSelect">
         						<option label="" style="display:none;">Choose</option>
                                <option value="mobiles">Mobiles</option>
                                <option value="cars">Cars</option>
                                <option value="bikes">Bikes</option>
                                <option value="electron">Electronic Items</option>
                                <option value="pets">Pets</option>
                                <option value="furn">Furnitures</option>
                                <option value="kid">Kids</option>
                                <option value="prop">Property</option>
                            </select>
                        <span class="text-danger" id="catSelection"></span>
                	</div>
                </div>
                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Price<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-2 col-sm-2 col-lg-2">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Rs
                            </span>
                            <input type="text" class="form-control" name="price" placeholder="00000">
                        </div>
                		
                    </div>
                </div>

                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Ad Description<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-6 col-sm-6 col-lg-6">
                		<textarea class="form-control" id="AD-description" name="disc" placeholder="Include the brand,model,age and any included accessories."></textarea>
                	</div>
                </div>
                 <div class="row">
                 	<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Upload Photos</h4>
                        <img src="images/icons/arrowr.png" />
               		</div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="row">
                        	<div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup_main.php">
                                	<span>+</span>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup.php">
                                	<span>+</span>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup.php">
                                	<span>+</span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup.php" >
                                	<span>+</span>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup.php">
                                	<span>+</span>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 impBox">
                            	<a href="php/php_files/tempup.php">
                                	<span>+</span>
                                </a>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Name<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-3 col-sm-3 col-lg-3">
                		<input type="text" class="form-control" placeholder="Name" name="name" />
                	</div>
                </div>
                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4><span class=" glyphicon glyphicon-earphone" ></span> &nbsp;Phone Number<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-3 col-sm-3 col-lg-3">
                    	<div class="input-group">
                            <span class="input-group-addon">
                                +92
                            </span>
                            <input type="text" class="form-control" placeholder="123456" name="number" />
                        </div>
                	</div>
                </div>
                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>Province<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-4 col-sm-4 col-lg-4">
                		
                        	<select class="form-control" name="prove">
         						<option label="" style="display:none;">Choose</option>
                                <option value="1">Azad Kashmir</option>
                                <option value="2">Balochistan</option>
                                <option value="3">Federally Administered Tribal Areas</option>
                                <option value="4">Islamabad Capital Territory</option>
                                <option value="5">Khyber Pakhtunkhwa</option>
                                <option value="6">Northern Areas</option>
                                <option value="7">Punjab</option>
                                <option value="8">Sindh</option>
                            </select>
                	</div>
                </div>
                <div class="row">
            		<div class="col-lg-3 col-sm-3 col-md-3 text-right" >
                		<h4>City<span class="text-danger">*</span></h4>
               		</div>
                	<div class="col-md-4 col-sm-4 col-lg-4">
                		
                        	<select class="form-control" name="city">
         						<option label="" style="display:none;">Choose</option>
                                <option value="1">Bagh</option>
                                <option value="2">Bhimber</option>
                                <option value="3">Mirpur</option>
                                <option value="4">Muzaffarabad</option>
                            </select>
                	</div>
                </div>
				<div class="row">
            		<div class="col-lg-8 col-sm-8 col-md-8 text-right" >
                        <input type="text" style="display:none;" name="values-of-img">
                		<input type="submit" name="submit" class="Form_Submit" />
               		</div>
                </div>
            </form>
        </div>
    <script src="js/_adp.js"></script>
</body>
</html>
