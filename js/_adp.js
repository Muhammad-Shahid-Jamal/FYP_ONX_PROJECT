jQuery(document).ready(function($){
//------------------------------------------------------------------------
    var pathForStoringImg = "";
    var imagesNames = "";
//------------------------------------------------------------------------
/*
--------------------------------------------------------------------------
-----------this is for open and send ajax request for upload photos-------
--------------------------------------------------------------------------
*/
    $(".impBox a").on("click",function(e){
        if(pathForStoringImg !== ""){
            e.preventDefault();
            var $data = new FormData();
            var $url = this.href;
            var itsParent =$(this).parent();
            console.log(itsParent.val());
            var $input = $("<input type='file'>");
            $input.trigger("click");
            $input.on("change", function(){
                console.log(this.value.split(".")[1]);
                var checkingExten = this.value.split(".")[1];
                if(checkingExten == "jpg" || checkingExten == "png"){
                    imagesNames += this.value.split('\\')[2];
                    imagesNames +=" ";
                    $("input[name='values-of-img']").attr("value",imagesNames);
                    console.log($("input[name='values-of-img']"));
                    $.each(this.files, function(i,file){
                        $data.append("file-"+i,file);
                        $data.append("path",pathForStoringImg);
                        $.ajax({
                            url:$url,
                            data:$data,
                            cache:false,
                            contentType:false,
                            processData:false,
                            type:'POST',
                            success:function(data){
                                itsParent.val("uploaded");
                                itsParent.empty();
                                itsParent.css({"background-color":"white"});
                                itsParent.html(data);
                            }
                        });
                    });   
                }else{
                    alert("PLease Select Valid Image File");
                }
            });
        }else{
            e.preventDefault();
            $("#catSelection").text("Please select category");
            alert("please Select Category");
        }
    });
//-------------------------------------------------------------------------
/*
------------------------selection work-------------------------------------
*/
    $("#catSelect").on("change",function(){
        var $sl = this.value;
        $("#catSelection").text("");
       switch($sl){
           case "mobiles":
               pathForStoringImg = "images/userupload/mobiles/temp/";
               break;
           case "cars":
               pathForStoringImg = "images/userupload/cars/temp/";
               break;
           case "bikes":
               pathForStoringImg = "images/userupload/bikes/temp/";
               break;
           case "electron":
               pathForStoringImg = "images/userupload/electron/temp/";
               break;
           case "pets":
               pathForStoringImg = "images/userupload/pets/temp/";
               break;
           case "furn":
               pathForStoringImg = "images/userupload/furn/temp/";
               break;
           case "kid":
               pathForStoringImg = "images/userupload/kid/temp/";
               break;
           case "prop":
               pathForStoringImg = "images/userupload/prop/temp/";
               break;
           default:console.log("error");
                      } 
    });
//------------------------------------------------------------------------
//------------submit btn--------------------------------------------------
//------------------------------------------------------------------------
    $("form").on("submit",function(e){
        var val = $(".impBox").val();
        if(val == ""){
            e.preventDefault();
            alert("please upload atleast one photo");
        }
    });
});