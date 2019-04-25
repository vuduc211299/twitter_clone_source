$(document).ready(function(){
    $('.btn_follow').click(function(){
        var id = $(this).data('id');
        id = id.toString();
        var array_id = id.split('.');
        var id_follow_user = array_id[0];
        var id_user = array_id[1]; // session user 
        var obj = $(this);
        $.ajax({
            method : 'get',
            url: '../controller/followController.php',
            dataType: 'html',
            data : {
                id_follow_user : id_follow_user,
                id_user : id_user
            },
            success : function(response){
                if(response == "follow"){
                    obj.html('Follow');
                    obj.removeClass('following');
                    obj.addClass('follow');
                }else{
                    obj.html('Following');
                    obj.removeClass('follow');
                    obj.addClass('following');

                }
            }
            ,failed: function(){

            }
                
        });
        
    });
    
});