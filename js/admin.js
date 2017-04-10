jQuery(document).ready(function($){
//    $("#my-box").slideDown(800);
    var userFeed = false;
    var users = false;
    $("#showfeed").on("click",function(e){
        if(userFeed === false){
        e.preventDefault();
        $("#main-contain").empty();
        var url = this.href;
        $(this).parent().toggleClass("active");
        $("#showUsers").parent().removeClass("active");
        var $h3 = $("<h3></h3>");
        $h3.text("User Feedback");
        $("#main-contain").append($h3);
        $.ajax({
            type: "GET",
            url: url,
            success: function(data){
                userFeed = true;
                users = false;
                //popup box
                var idNo=0;
                var pbh4 = $("<h4></h4>");
                pbh4.text("Are You Sure You Want to Delete This Record ?");
                var pbtn = [$("<button></button>"),$("<button></button>")];
                pbtn[0].addClass("btn btn-danger");
                pbtn[0].text("Yes");
//---------------------------------------------------------------------------------
                pbtn[1].addClass("btn btn-default");
                pbtn[1].text("No");
                pbtn[1].css({"marginLeft":"10px"});
//-----------------------------------------------------------------------------------
                var tcenter = $("<div></div>");
                tcenter.addClass("text-center");
                tcenter.append(pbh4);
                tcenter.append(pbtn[0]);
                tcenter.append(pbtn[1]);
                var promptDiv = $("<div></div>");
                promptDiv.attr("id","prompt-box");
                var myBox = $("<div></div>");
                myBox.attr("id","my-box");
                myBox.append(tcenter);
                promptDiv.append(myBox);
                //end of popup work
//------------------------------------------------------------
                var myResponseData = JSON.parse(data);
//                console.log(myResponseData);
                for(var i=0;i<myResponseData.length;i++){
                    var $mainDiv =$("<div></div>");
                    var $myRow = $("<div></div>");
                    var $myRow2 = $("<div></div>");
                    $mainDiv.addClass("row user-feed");
                    $myRow.addClass("col-md-6 col-lg-6 col-sm-6 text-left");
                    $myRow2.addClass("col-md-6 col-lg-6 col-sm-6 text-right");
                    var $h1 = $("<h1></h1>");
                    var $span = $("<span></span>");
                    $span.addClass("glyphicon glyphicon-trash");
                    $span.attr("id",myResponseData[i]._id);
                    //span trash icon click function
                    $span.on("click",function(){
                        var parent=$(this).parent().parent().parent();
//                        parent.remove();
                        $("#main-contain").after(promptDiv);
                        myBox.slideDown("slow"); 
                        idNo = this.id;
                        pbtn[0].on("click",function(){
                            if(idNo !== 0){
                                var url = "http://127.0.0.1/FYP_Project/php/php_files/deletFR.php";
                                $.post(url,{
                                    _id:idNo
                                },function(data,status){
                                    var myd = JSON.parse(data);
                                    if(myd._delete){
                                        console.log(myd._delete);
                                        console.log(idNo);
                                        $("#my-box").slideUp("slow");
                                        parent.remove();
                                        $("#prompt-box").animate({visibility:"0"},700,function(){
                                        $("#prompt-box").remove();
                                        });
                                    }
                                    
                                });
                            }
                        });
                        pbtn[1].on("click",function(){
                            $("#my-box").slideUp("slow");
                            $("#prompt-box").animate({visibility:"0"},700,function(){
                                $("#prompt-box").remove();
                            });
                        });
//                        console.log(parent);
                    });
                    $h1.append($span);
                    $myRow2.append($h1);
                    var $h5 = [$("<h5></h5>"),$("<h5></h5>"),$("<h5></h5>"),$("<h5></h5>")];
                    var $strong = [$("<strong></strong>"),$("<strong></strong>"),$("<strong></strong>"),$("<strong></strong>")];
                    $strong[0].text("Name :");
                    $strong[1].text("Email :");
                    $strong[2].text("Massage :");
                    $strong[3].text("Date & Time : ");
                    $h5[0].append($strong[0]);
                    $h5[0].append(myResponseData[i]._name);
                    $h5[1].append($strong[1]);
                    $h5[1].append(myResponseData[i]._email);
                    $h5[2].append($strong[2]);
                    $h5[2].append(myResponseData[i]._msg);
                    $h5[3].append($strong[3]);
                    $h5[3].append(myResponseData[i].dateNtime);
                    $myRow.append($h5[0]);
                    $myRow.append($h5[1]);
                    $myRow.append($h5[2]);
                    $myRow.append($h5[3]);
                    $mainDiv.append($myRow);
                    $mainDiv.append($myRow2);
                    $mainDiv.hide().fadeIn(500 * i);
                    $("#main-contain").append($mainDiv);
                }
            }
        });
    }else{
        e.preventDefault();
        $("#main-contain").empty();
        $(this).parent().toggleClass("active");
        $("#showUsers").parent().removeClass("active");
        userFeed = false;
    }
    });
    $("#showUsers").on("click",function(e){
        if(users === false){
         e.preventDefault();
         $("#main-contain").empty();
         $(this).parent().toggleClass("active");
         $("#showfeed").parent().removeClass("active");
        users = true;
        userFeed = false;
            var url = this.href;
            $.ajax({
                type:"GET",
                url: url,
                success: function(data){
                    $("#main-contain").hide();
                    $("#main-contain").html(data);
                    $("#main-contain").fadeIn("slow");
                }
            });
        }else{
            e.preventDefault();
            $("#main-contain").empty();
            $(this).parent().toggleClass("active");
            $("#showfeed").parent().removeClass("active");
            users = false;
        }
    });
});

function testing(x){
    var id = x;
    $("#"+id).remove();
}