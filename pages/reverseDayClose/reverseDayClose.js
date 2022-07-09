const showLoading = function () {
  swal({
    title: "Now loading",
    allowEscapeKey: false,
    allowOutsideClick: false,
    timer: 2000,
    onOpen: () => {
      swal.showLoading();
    },
  }).then(
    () => {},
    (dismiss) => {
      if (dismiss === "timer") {
        console.log("closed by timer!!!!");
        swal({
          title: "Finished!",
          type: "success",
          timer: 2000,
          showConfirmButton: false,
        });
      }
    }
  );
};

//section for reversing the colsed day for editing transaction
$("body").on("click", "#reverse_day_btn", function () {
  let valid_form_details = true;

  //section for getting the date

  let reverseDate = $(this).attr("data-id");

  if (valid_form_details) {
    //ajax requesting to server

    $.ajax({
      type: "post",
      url: "pages/reverseDayClose/reverseColsedDateRequest.php",
      dataType: "json",
      data: {
        reverseDate: reverseDate,
      },
      beforeSend: function () {
        // setting a loader tills teh request finish
        window.swal({
          title: "Reversing...",
          text: "Please wait......",
          imageUrl: "images/ajaxloader.gif",
          showConfirmButton: false,
          allowOutsideClick: false,
        });
      },
      complete: function () {
       
      },
      success: function (data) {
        // let response=JSON.parse(data);${reverseDate} - Date Reversed!
        if (data) {

            window.swal({
                type: "info",
                title: `${reverseDate} - Date Reversed!`,
                showConfirmButton: false,
                timer: 2000,
              }).then(e=>{
                window.location.href='index.php?status=todayTransaction';
              });
         
        } else {
          window.swal({
            type: "error",
            title: `Something went wrong`,
            showConfirmButton: false,
            timer: 1000,
          });
        }

        //data will be a html templete generated with data on server side
      },
    });
  }
});
//end section for reversing the colsed day for editing transaction
