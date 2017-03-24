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
    
//for categories up and down show start 
$("#next").on("click",function(){
    $("#categ2").show();
    $("#cattab").animate({
        opacity:"0",
        right:"95%",
        // visibility:"hidden"
    },2000);
    $("#categ2").animate({
        opacity:"1",
        left:"90px"
    },3000);

    $(this).fadeOut(2000);
    $("#prev").fadeIn(3000);
});       

$("#prev").on("click",function(){
    $("#categ2").animate({
        opacity:"0",
        left:"95%"
    },2000,function(){
        $("#categ2").hide();
    });
    $("#cattab").animate({
        opacity:"1",
        right:"0%"
    },3000);

    $(this).fadeOut(3000);
    $("#next").fadeIn(2000);

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
