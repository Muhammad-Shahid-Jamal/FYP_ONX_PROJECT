jQuery(document).ready(function($){
    $("#showfeed").on("click",function(e){
        e.preventDefault();
        $(this).parent().toggleClass("active");
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1/FYP_Project/php/php_files/feedback.php",
            success: function(data){
                var myResponseData = JSON.parse(data);
                console.log(myResponseData);
                for(var i=0;i<myResponseData.length;i++){
                    var $mainDiv =$("<div></div>");
                    var $myRow = $("<div></div>");
                    $mainDiv.addClass("row user-feed");
                    $myRow.addClass("col-md-12 col-lg-12 text-left");
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
                    $("#main-contain").append($mainDiv);
                }
            }
        });
    });
});