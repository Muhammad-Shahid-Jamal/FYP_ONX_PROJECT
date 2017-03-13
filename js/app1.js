// this is for nav bar hide and show:-)
$(document).ready(function(){
    var $window = $(window);
    console.log($window);
    $(window).on("scroll",function(){
        console.log(window.scrollY);
        var y = window.scrollY;
        if(y > 200){
            $(".navbar-default").css({
                'background-color':'rgba(248,248,248,0.5)',
                'border-color':'rgba(231,231,231,0.5)',
                'transition':'1.5s'
            });
        }else{
            $(".navbar-default").css({
                'background-color':'#f8f8f8',
                'border-color':'#e7e7e7'
            });
        }

        if(y > 900){
            $("#onxNav").css({
                'opacity':'0'
            });
        }else{
            $("#onxNav").css({
                'opacity':'1'
            });
        }
    });
});