jQuery(document).ready(function($){
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
                var myResponseData = JSON.parse(data);
               // console.log(myResponseData);
                for(var i=0;i<myResponseData.length;i++){
                    var $mainDiv =$("<div></div>");
                    var $myRow = $("<div></div>");
                    var $myRow2 = $("<div></div>");
                    $mainDiv.addClass("row user-feed");
                    $myRow.addClass("col-md-6 col-lg-6 col-sm-6 text-left");
                    $myRow2.addClass("col-md-6 col-lg-6 col-sm-6 text-right");
                    var $h1 = $("<h1></h1>");
                    $h1.attr("id",myResponseData[i]._id);
                    var $span = $("<span></span>");
                    $span.addClass("glyphicon glyphicon-trash");
                    $h1.append($span);
                    $myRow2.append($h1);
                    var $h5 = [$("<h5></h5>"),$("<h5></h5>"),$("<h5></h5>")];
                    var $strong = [$("<strong></strong>"),$("<strong></strong>"),$("<strong></strong>")];
                    $strong[0].text("Name :");
                    $strong[1].text("Email :");
                    $strong[2].text("Massage :");
                    $h5[0].append($strong[0]);
                    $h5[0].append(myResponseData[i]._name);
                    $h5[1].append($strong[1]);
                    $h5[1].append(myResponseData[i]._email);
                    $h5[2].append($strong[2]);
                    $h5[2].append(myResponseData[i]._msg);
                    $myRow.append($h5[0]);
                    $myRow.append($h5[1]);
                    $myRow.append($h5[2]);
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