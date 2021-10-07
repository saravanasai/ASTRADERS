$(function () {
  console.log("loan");
   
      //section for handling yes procced
        
      $('body').on('click', '#yes_proceed', function () {
        
      let customer_id=$("#customerProceedId").val();
        console.log(customer_id);
            
        window.location.href = "index.php?status=takeLoan&CUS_ID="+customer_id;

      });
      //end section to handling yes procced


       //section for handling yes_pay_loan
        
       $('body').on('click', '#yes_pay_loan', function () {
        
        let loan_id=$("#customerLoanId").val();
        let customer_id=$("#customerId").val();
          
              
          window.location.href = "index.php?status=payLoan&LOAN_ID="+loan_id+"&CUS_ID="+customer_id;
  
        });
        //end section to handling  yes_pay_loan


 
});
//section for fetching the for customerDetails using the PhoneNumber
$("#getCustomerDetail").click(function () {
  //setting the value of fields to null for validation
  $("#customerPhoneNumnber").removeClass("is-invalid");
  $("#errorCustomerPhoneNumber").html("");
  validation_status = true;

  let customer_phone_number = $("#customerPhoneNumnber").val();
  //validation for customer phone number to fecth
  if (
    customer_phone_number == "" ||
    !$.isNumeric(customer_phone_number)
  ) {
    $("#customerPhoneNumnber").addClass("is-invalid");
    $("#errorCustomerPhoneNumber").html("ENTER THE VALID CUSTOMER ID");
    validation_status = false;
  }
  //end of phone number validation

  if (validation_status) {
    $.ajax({
      type: "post",
      url: "pages/newLoan/newLoanCustomerDetailRequest.php",
      data: {
        customerPhoneNumber: customer_phone_number,
      },
      success: function (data) {
        //section for response of request

        if (data == 0) {
          //section for showing error
          swal("OPPS!", "NO CUSTOMER FOUND", "warning").then(() => {
            window.location.href = "index.php?status=newLoan";
          });
        } else {
          $(".customerdetailView").html(data);
        }
      },
    });
  }
});

