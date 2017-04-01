//for loading icon
$(window).on("load",function(){
    $(".page-loading-icon").fadeOut("slow");
});
//for rest of the page
$(document).ready(function(){
//slider functions
    var count = 0;
    setInterval(function(){
        if(count < 8){
            var fst = count;
            count++;
            sliderMove(fst,count);
            if(count === 8){
                count = 0;
                sliderMove(8,count);
            }
        }
    },6000);
//end of slider function
    $("#next").on("click",function(){
        catAnim.slida();
        $("#prev").fadeIn(2000);
        $(this).fadeOut("slow");
    });
    
    $("#prev").on("click",function(){
        catAnim.slidB();
        $("#next").fadeIn(2000);
        $(this).fadeOut("slow");
    });
//checking the feedback form
    formInputCheck();
});

//end of ready function..

function sliderMove(prev,next){
    $(".slider:eq("+prev+")").toggleClass("show img-responsive");
    $(".slider:eq("+next+")").toggleClass("show img-responsive");
}

//feedback formchecking client side ..
function formInputCheck(){
    $("#nameOfFeedbacker").on("blur",function(e){
        if($(this).val() === ""){
            $("#feedN").text("Name Require");
        }else{
            $("#feedN").text("");
        }
    });
    
     $("#emailOfFeedbacker").on("blur",function(e){
         if($(this).val() === ""){
             $("#feedE").text("Email Address Require");
         }else{
             $("#feedE").text("");
         }
     });
    
}

function checkCIField(){
    
    if($("#nameOfFeedbacker").val() !== "" && $("#emailOfFeedbacker").val() !== "" && $("#feedbackMsg").val() !== ""){
        return 0;
    }else{
        return -1;
    }
}
//categorie animation and icons and text changing object
var catAnim = {
    imageSrc_main:[
        "images/icons/mob.png",
        "images/icons/car.png",
        "images/icons/bikes.png",
        "images/icons/elec.png",
        "images/icons/pet.png",
        "images/icons/furn.png",
        "images/icons/kids.png",
        "images/icons/prop.png"],
    slida:function(){
        $(".md-cat").animate({
            opacity:"0",
            left:"-110%"
        },1500,function(){
            $(".md-cat").css({"left":"110%"});
            catAnim.changeIconsAndText(0,catAnim.imageSrc_main[4],"Pet Icon",1,"Pets");
            catAnim.changeIconsAndText(2,catAnim.imageSrc_main[5],"Furneture Icon",3,"Furneture");
            catAnim.changeIconsAndText(4,catAnim.imageSrc_main[6],"Kids Icon",5,"Kids");
            catAnim.changeIconsAndText(6,catAnim.imageSrc_main[7],"Prop Icon",7,"Properties");
            $(".md-cat").animate({
                opacity:"1",
                left:"0%"
            },1200);
        });
    },
    slidB:function(){
        $(".md-cat").animate({
            opacity:"0",
            left:"110%"
        },1500,function(){
            $(".md-cat").css({"left":"-110%"});
            catAnim.changeIconsAndText(0,catAnim.imageSrc_main[0],"Mobile Icon",1,"Mobiles");
            catAnim.changeIconsAndText(2,catAnim.imageSrc_main[1],"Car Icon",3,"Cars");
            catAnim.changeIconsAndText(4,catAnim.imageSrc_main[2],"Bike Icon",5,"Bike");
            catAnim.changeIconsAndText(6,catAnim.imageSrc_main[3],"Elec Icon",7,"Electronic Item");
            $(".md-cat").animate({
                opacity:"1",
                left:"0%"
            },1200);
        });
    },
    changeIconsAndText:function(imageRef,imageSrc,imageAlt,hyperRef,hyperText){
        var mainChilds = $(".md-cat").children();
        var inMainChilds = mainChilds.children();
        inMainChilds[imageRef].src = imageSrc;
        inMainChilds[imageRef].alt = imageAlt;
        inMainChilds[hyperRef].text = hyperText;
    }
};