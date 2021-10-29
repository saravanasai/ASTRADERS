$(function () {
  console.log("today");
  //section to handle the day close function
  $("body").on("click", "#dayClose", function () {
    swal({
      title: "Are you sure?",
      text: "Once DayClosed, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //ajax request to update the tr_table_commit_status if conformation is ok
        $.ajax({
          type: "post",
          url: "pages/todayTransaction/todayTransactionRequestToCommit.php",
          data: { commit: "ok" },
          success: function (data) {
            swal("DAY CLOSED", "THANK YOU", "success").then(() => {
              window.location.href = "./index.php";
            });
          },
        });
      } else {
        swal("YOU CANCELLED THE PROCESS!");
      }
    });
  });

  //end section to handle the day close function

  //section  to validate the new amount entered

  $("body").on("keyup", "#updatedNewAmount", function () {
    $("#updatedNewAmount").removeClass("is-invalid");
    $("#newBalance").val("0");

    let new_amount_for_update = $("#updatedNewAmount").val();
    let old_amount_for_update = $("#lastAmountOld").val();

    var new_amount = Number(new_amount_for_update);
    var old_amount = Number(old_amount_for_update);
    var new_balance = old_amount - new_amount;

    if (
      new_amount > old_amount ||
      new_amount == "" ||
      !$.isNumeric(new_amount)
    ) {
      $("#updatedNewAmount").addClass("is-invalid");
      $("#newBalance").val("0");
      $("#buttonUpdateTransaction").hide();
    } else {
      $("#updatedNewAmount").addClass("is-valid");
      $("#newBalance").val(new_balance);
      $("#buttonUpdateTransaction").show();
    }
  });

  //end section  to validate the new amount entered
});

//section to fetch the transaction details from transaction table using transaction id
$(".transactionViewModel").click(function () {
  let ln_id = $(this).attr("id");
  let customer_id = $(this).attr("data-id");

  //section for ajax
  $.ajax({
    type: "post",
    url: "pages/todayTransaction/fetchSingleTransaction.php",
    data: { customer_id: customer_id, ln_id: ln_id },
    success: function (data) {
      $(".modal-body").html(data);
      $("#buttonUpdateTransaction").hide();
    },
  });

  // end  ajax
});

//end  section to fetch the transaction details from transaction table using transaction id
