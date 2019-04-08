$(document).ready(function(){
    // edit profile user
    $("#edit-profile").on("click",function(){
        $("#pop-up-edit-profile").css("display","block");
        $("main").css("filter","blur(1px)");
    });
    $("#close-pop-up").click(function(){
        $("#pop-up-edit-profile").css("display","none");
    });
    // Upload profile image
    $("#btn_upload_profile").click(function(){
        $("#btn_upload_profile_photo_hidden").trigger("click");
    }); 
    // Preview Image
    $("#btn_upload_profile_photo_hidden").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) 
            {
              var reader = new FileReader();
              reader.onload = function(e) {
                var imgsource = e.target.result;
                $("#img-profile-edit").css("background-image","url('"+imgsource+"')");
              }
              reader.readAsDataURL($(this)[0].files[i]);
            }
          } else {
            alert("This browser does not support FileReader.");
          }
        } 
      });

      // Upload profile image
    $("#btn_upload_cover_photo").click(function(){
        $("#btn_upload_cover_photo_hidden").trigger("click");
    }); 
    // Preview Image
    $("#btn_upload_cover_photo_hidden").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) 
            {
              var reader = new FileReader();
              reader.onload = function(e) {
                var imgsource = e.target.result;
                $("#cover-photo-edit").css("background-image","url('"+imgsource+"')");
              }
              reader.readAsDataURL($(this)[0].files[i]);
            }
          } else {
            alert("This browser does not support FileReader.");
          }
        } 
      });
});