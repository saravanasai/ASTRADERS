$(function () {
  $("#newpasswordform").hide();

    //section to handle new password matchs
    $("#newpasswordUpdateForm").submit(function(event)
    {
       
        console.log("submited");
        event.preventDefault();
        
        let password1 =$("#password1").val();
        let password2 =$("#password2").val();
          
      
       
      if(password1.localeCompare(password2)==0)
      {
        $.ajax({
            type: "post",
            url: "pages/changePassword/changePasswordUpdateRequest.php",
            data: { newpassword:password1},
            success: function (data) {
              if (data == 1) {
                 
                //section if the new password changed
                swal("PASSWORD CHANGED SUCCESFULL", "DONE", "success").then(() => {
                    window.location.href = "./logout.php";
                  });
              } else {
                //section if the new password changed
                swal("SOMETHING WENT WRONG", "CONNECTION ERROR", "error").then(() => {
                  window.location.href = "./index.php?status=changePassword";
                });
              }
            },
          });
      }



    })
    //end section to handle new password matchs
 

});

$("#changePassword").click(function (event) {
  event.preventDefault();

  let old_password = $("#oldpassword").val();
  //section for ajax request
  $.ajax({
    type: "post",
    url: "pages/changePassword/changePasswordRequest.php",
    data: { oldPasword: old_password },
    success: function (data) {
      if (data == 1) {
        //section if the old password matchs
        $("#newpasswordform").show();
        $("#oldpasswordform").hide();
      } else {
        //section if the old password not matchs
        swal("INCORRECT PASSWORD", "CHECK PASSWORD", "warning").then(() => {
          window.location.href = "./index.php?status=changePassword";
        });
      }
    },
  });
});
