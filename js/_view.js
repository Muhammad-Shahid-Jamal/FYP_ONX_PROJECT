jQuery(document).ready(function($){
    $(".img-thumb .img-responsive").on("click",function(){
        $("#picOfAdd img").attr("src",this.dataset.imgsrc);
        $(".img-thumb .img-responsive").css("filter","opacity(30%)");
        this.style.filter = "opacity(100%)";
    });
});