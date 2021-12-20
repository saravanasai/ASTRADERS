$(function () {
  $("#payButton").hide();

  

  
});



//section for gettingb the amount paying by user
$("#amountPaidNow").keyup(function () {
  $("#amountPaidNow").removeClass("is-invalid");

  let amount_paid = $("#amountPaidNow").val();
  let amount_balance_before_convert = $("#amountBalanceBefore").val();
  let balance = amount_balance_before_convert - amount_paid;

  var amount_paid_now = Number(amount_paid);
  var amount_balance_before = Number(amount_balance_before_convert);

  if (amount_paid != "") {
    if (
      amount_paid_now < amount_balance_before ||
      amount_paid_now == amount_balance_before
    ) {
      $("#amountPaidNow").addClass("is-valid");
      $("#amountBalanceNow").val(balance);
      $("#payButton").show();
    } else {
      $("#amountPaidNow").addClass("is-invalid");
      $("#amountBalanceNow").val("0");
      $("#payButton").hide();
    }
  } else {
    $("#amountPaidNow").addClass("is-invalid");
    $("#amountBalanceNow").val("0");
    $("#payButton").hide();
  }
});
// end section for getting the amount paying by user


//section to update the loanMaster after the payment

$("#loanPayUpdateButton").click(function(){

    let amount_paid = $("#amountPaidNow").val();
    let amount_balance_before_convert = $("#amountBalanceBefore").val();
    let balance = amount_balance_before_convert - amount_paid;
       
        

   let loan_update_to_id=$("#updateToLoanId").val();
   let loan_update_to_cus_id=$("#updateToCustomerId").val();
   let loan_update_to_amountPaid=$("#amountPaidNow").val();
   let balance_amount_to_pay=balance; 
            Number(balance);
               
                if(balance!=0)
                { 
                    $.ajax({
                        type: "post",
                        url: "pages/payLoan/payLoanCollectionListUpdateRequest.php",
                        data: {
                           loanId:loan_update_to_id,
                           customerId:loan_update_to_cus_id,
                           amountPaid:loan_update_to_amountPaid,
                           balanceamount:balance_amount_to_pay,
                           loanstatus:"1"
                        },
                        success: function (data) {
                          if(data==1)
                             {
                              swal("DUE PAYED", "THANK YOU", "success").then(() => {
                                window.location.href = "./index.php?status=payLoan";
                              });
                             }

                        },
                      });

                }
                else{
                         //section to close the loan if balance become zero
                    $.ajax({
                        type: "post",
                        url: "pages/payLoan/payLoanCollectionListUpdateRequest.php",
                        data: {
                           
                           loanClose:"ok",
                           loanId:loan_update_to_id,
                           customerId:loan_update_to_cus_id,
                           amountPaid:loan_update_to_amountPaid,
                           balanceamount:balance_amount_to_pay,
                           loanstatus:"0"
                        },
                        success: function (data) {
                          
                             if(data==1)
                             {
                              swal("LOAN CLOSED", "THANK YOU", "success").then(() => {
                                window.location.href = "./index.php?status=payLoan";
                              });
                             }


                        },
                      });
                    




                }





})






// end section to update the loanMaster after the payment