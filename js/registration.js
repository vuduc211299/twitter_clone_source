$(document).ready(function(){
    var signUp = false;  
    $("#password").on("keyup",function(){
        if($("#password").val().length < 6){
            $("#text-warning").css("display","block");
            signUp = false;
        }else{
            $("#text-warning").css("display","none");
            signUp = true;
        }
    });
    $("#confirm-password").on("keyup",function(){
        if($("#password").val() != $("#confirm-password").val()){
            $("#form-confirm-password").css("border","1px solid red");
            signUp = false;
        }else{
            $("#form-confirm-password").css("border","none");
            signUp = true;
        }
    });
    $("#username").on("keyup",function(){
        var username = $("#username").val(); 
        $.ajax({
            url : "../controller/registrationController.php",
            method : "GET",
            data : { username: username },
            dataType : "html",
            success: function(response){
                $("#text-warning-username").css("display","block");
                $("#text-warning-username").html(response);
            },
        }); 
        
        
    });
    
});