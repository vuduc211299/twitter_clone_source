$(document).ready(function(){
    // location to home page
    $("#home-page").click(function(){
        location.replace("../php/index.php");
    });
    $(".fullname").hover(function(){
        $(this).css("text-decoration","underline");
        $(this).css("color","#1da1f2");    
      },function(){
        $(this).css("text-decoration","none");
        $(this).css("color","#000");  
      });

    // Like post 
    $(".btn_like").click(function(){
     
      var id = $(this).find("img").data('id');
      var likeCount = parseInt($(this).find("#likecount").html()); 
      id = id.toString();
      var array_id = id.split('.');
      var id_post = array_id[0];
      var id_user = array_id[1];
        if($(this).find("img").attr("src") == "/twitter_clone_source/icon/like-icon.png"){
            $(this).find("img").attr("src","/twitter_clone_source/icon/liked-icon.png");
            var status = "like";
            //Ajax like tweet
            $.ajax({
            url    : "../controller/excuteLike.php",
            method: "post",
            data   : {
            id_user : id_user,
            id_post : id_post,
            status  : status
            },
            
            success: function(){
              
            }
         });
          $(this).children("#likecount").html(likeCount+1);
        }
        else{
           $(this).find("img").attr("src","/twitter_clone_source/icon/like-icon.png");
            var status = "unlike";
            //Ajax like tweet
        $.ajax({
              url    : "../controller/excuteLike.php",
              data   : {
              id_user : id_user,
              id_post : id_post,
              status  : status
            },
            method: "post",
            success: function(){

            }
          });
        $(this).children("#likecount").html(likeCount-1);
        }
    });
   
        // Preview Image
        $("#btn_upload").click(function(){
          $("#fileUpload").trigger("click");
        });
        // Preview Image
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "style": "width:100%; height: 300px; border-radius:6%; margin-bottom: 10px;"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } 
        });
    

      // pop-up tweet
      $(".open-pop-up").click(function(){
          $("#pop-up").css("display",'grid');
          
      });
      $("#close-pop-up").click(function(){
          $("#pop-up").css("display",'none');
          location.reload();
      });
      $("#pop-up-tweet").click(function(){
        $("#pop-up").css("display",'none');
        location.reload();
      });

      //pop-up comment
      $(".post-newsfeed-side").find(".pop-up-comment").hide();
      $(".post-newsfeed-side").find(".comment-tweet").click(function(){
       
        $(".post-newsfeed-side").find(".pop-up-comment").toggle();
      });
      $(".close-pop-up-comment").click(function(){
        $(".post-newsfeed-side").find(".pop-up-comment").fadeOut();
        location.reload();
    });


    // Live Search on index.php

    $("#input-search").on("keyup",function(){
        var keyword = $("#input-search").val().trim();
        if(keyword.length > 0){
          $.ajax({
            url: "../controller/liveSearchController.php",
            data: {
              keyword : keyword
            },
            method: "get",
            dataType : "html",
            success: function(response){
                $("#live-search").css("display","block");
                $("#live-search").html(response);
            }
          });
        }else{
          $("#live-search").css("display","none");
        }
    });
});
