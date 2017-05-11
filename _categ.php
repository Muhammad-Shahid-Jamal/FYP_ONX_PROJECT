<?php
$categ="";
$querym="";
if(isset($_GET["categ"])){
    require("php/php_files/check_user_input.php");
    require("php/php_files/dbHelper.php");
    $dataOfGet = checkInput($_GET["categ"]);
    switch($dataOfGet){
        case "mobile":
            $categ="Mobile";
            $icon = "images/icons/mob.png";
            $querym="select _id,_title,_price,_discription,_mainpic from ads where _categ='mobiles' order by _id DESC";
            break;
        case "cars":
            $categ="Cars";
            $icon = "images/icons/car.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='cars' order by _id DESC";
            break;
        case "bikes": 
            $categ="Bikes";
            $icon = "images/icons/bikes.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='bikes' order by _id DESC";
            break;
        case "electronic": 
            $categ = "Electronic Items";
            $icon = "images/icons/elec.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='electron' order by _id DESC";
            break;
        case "pet": 
            $categ = "Pets";
            $icon = "images/icons/pet.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='pets' order by _id DESC";
            break;
        case "furn": 
            $categ = "Furneture";
            $icon = "images/icons/furn.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='furn' order by _id DESC";
            break;
        case "kids": 
            $categ = "Kids";
            $icon = "images/icons/kids.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='kid' order by _id DESC";
            break;
        case "prop": 
            $categ = "Property";
            $icon = "images/icons/prop.png";
            $querym = "select _id,_title,_price,_discription,_mainpic from ads where _categ='prop' order by _id DESC";
            break;
        default: $categ="no Match";
    }
    $myDb = new DBaseHelper();
    $con = $myDb->getConnection();
    if($result = $con->query($querym)){
        $myDb->disconnect();
        $output = $result->fetch_all(MYSQLI_ASSOC);
        $len = count($output);
    }else{
        echo("<h1>Error Not Found Any Result</h1>");
        die();
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
                    
                    <a href="index.php" class="navbar-brand">
                        <img src="images/icons/logo.png" class="logo">| ONline eXchange
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="select"><a href="_login.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                        <li class="select"><a href="_postad.php"><span class="glyphicon glyphicon-log-in"></span> Submit Ad</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <a href="index.php" id="homeDir">HOME <span class="glyphicon glyphicon-home"></span></a>
        <div class="container">
            <img src="<?=$icon?>" class="img-responsive img-responsive-sm">
            <h1><?=$categ?></h1>
            <h4>Results <?=$len?></h4>
        </div>
<?php
    for($i = 0; $i < $len; $i++){
        $idOfAd = $output[$i]["_id"];
        $mainImg = $output[$i]["_mainpic"];
        $title = $output[$i]["_title"];
        $discr = $output[$i]["_discription"];
        $price = $output[$i]["_price"];
?>
        <div class="container adblock">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <img src="<?=$mainImg?>" class="img-thumbnail">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <a class="h1 ad" href="_viewAd.php?_id=<?=$idOfAd?>"><?=$title?></a>
                    <h4>Details</h4>
                    <p>
                        <?=$discr?>
                    </p>
                </div>
                
                <div class="col-sm-4 col-md-4 col-lg-4 text-center">
                    <h2 class="text-primary">Rs: <?=$price?></h2>
                </div>

            </div>
        </div>
        <?php } ?>
        <script src="js/categ.js"></script>
    </body>
</html>