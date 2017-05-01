<?php
require("check_user_input.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $path =checkInput($_POST["path"]);
    $img = $path."main/".basename($_FILES["file-0"]["name"]);
    $target ="../../".$path."main/".basename($_FILES["file-0"]["name"]);
    if($path != ""){
        $check = getimagesize($_FILES["file-0"]["tmp_name"]);
        if($check != false){
            if(move_uploaded_file($_FILES["file-0"]["tmp_name"],$target)){
                echo "<div class='photoUp'>".
                "<img src='$img' alt='$img' class='addPhoto'>".
                "</div>";   
            }    
        }
        
    }
}else{
    echo "<h1>Sorry you Have not Permission To access that page</h2>";
}
?>