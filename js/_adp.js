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
//-----------------------------------------------------------------------
//-------------------provence and cities---------------------------------
//-----------------------------------------------------------------------
    $("select[name=prove]").on("change",function(){
        var province = this.value;
        $("#citySelection").css("display","block");
        var cities = $("select[name=city]");
        var sindhCity = [
            "Karachi",
            "Hydarabad",
            "MirpurKhas",
            "TandoAdam",
            "Jamshoro",
            "Badeen",
            "Sukkur",
            "NawabShah",
            "Larkana",
            "Thatta"
        ];
        var panjabCity = [
            "Lahore",
            "Islamabad",
            "Pindi",
            "RahimYarKhan",
            "Okara",
            "Sahiwal",
            "Sarghoda",
            "Sadiqabad",
            "BahawalPur",
            "MuzaffarGarh",
            "Sialkot",
            "Multan",
            "MianWali",
            "DeraGhaziKhan",
            "Attock",
            "Faisalabad",
            "GujraWala",
            "KhanPur",
            "Jehlum",
            "Gujrat"
        ];
        var northernAreas = [
            "Gilgit",
            "Skardu"
        ];
        var kyberPakh = [
            "Peshawar",
            "Mardan",
            "Buner",
            "Abottabad",
            "Swabi",
            "Charsadda",
            "Chitral",
            "Malakand",
            "Kohat",
            "Haripur",
            "Hangu"
        ];
        var balochCity = [
            "Gwadar",
            "Khuzdar",
            "Lasbela",
            "Ormara",
            "Pasni",
            "Queta",
            "Jalawani",
            "Kalat",
            "Bela"
        ];
        
        var azadKahsmir = [
            "Muzaffarabad",
            "Bagh",
            "Mirpur",
            "Bhimber"
        ];
        switch(province){
            case "Sindh":
                cities.empty();
                for(var i=0; i<sindhCity.length;i++){
                var opt1 = $("<option value="+sindhCity[i]+"></option");
                    opt1.text(sindhCity[i]);
                cities.append(opt1);    
                }
                break;
            case "Punjab":
                    cities.empty();
                    for(var i=0; i<panjabCity.length;i++){
                    var opt1 = $("<option value="+panjabCity[i]+"></option");
                    opt1.text(panjabCity[i]);
                    cities.append(opt1);    
                }
                break;
            case "Northern Areas":
                    cities.empty();
                    for(var i=0; i<northernAreas.length;i++){
                    var opt1 = $("<option value="+northernAreas[i]+"></option");
                    opt1.text(northernAreas[i]);
                    cities.append(opt1);    
                    }
                break;
            case "Kyber Pakhtunkhwa":
                    cities.empty();
                    for(var i=0; i<kyberPakh.length;i++){
                    var opt1 = $("<option value="+kyberPakh[i]+"></option");
                    opt1.text(kyberPakh[i]);
                    cities.append(opt1);    
                }
                break;
            case "Balochistan":
                    cities.empty();
                    for(var i=0; i<balochCity.length;i++){
                    var opt1 = $("<option value="+balochCity[i]+"></option");
                    opt1.text(balochCity[i]);
                    cities.append(opt1);    
                }
                break;
            case "Azad Kashmir":
                    cities.empty();
                    for(var i=0; i<azadKahsmir.length;i++){
                    var opt1 = $("<option value="+azadKahsmir[i]+"></option");
                    opt1.text(azadKahsmir[i]);
                    cities.append(opt1);    
                }
                break;
            default:alert("Error");
                       }
    });
});