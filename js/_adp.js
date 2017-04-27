jQuery(document).ready(function($){
//------------------------------------------------------------------------
/*
--------------------------------------------------------------------------
-----------this is for open and send ajax request for upload photos-------
--------------------------------------------------------------------------
*/
    $(".impBox a").on("click",function(e){
        e.preventDefault();
        var $data = new FormData();
        var $url = this.href;
        var itsParent =$(this).parent();
        var $input = $("<input type='file'>");
        $input.trigger("click");
        $input.on("change", function(){
            $.each(this.files, function(i,file){
               $data.append("file-"+i,file);
                $.ajax({
                    url:$url,
                    data:$data,
                    cache:false,
                    contentType:false,
                    processData:false,
                    type:'POST',
                    success:function(data){
                        itsParent.empty();
                        itsParent.css({"background-color":"white"});
                        itsParent.html(data);
                    }
                });
            });
        });
        
    });
});