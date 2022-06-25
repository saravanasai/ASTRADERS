$(function () {
  //section of fetching the area data by choosing the district
  $("body").on("change", "select#customerDistrictUpdate", function () {
    let district_id = $("select#customerDistrictUpdate").val();
    console.log(district_id);

    //ajax requesting to server
    $.ajax({
      type: "post",
      url: "pages/addCustomer/areaFetchRequest.php",
      data: {
        districtId: district_id,
      },
      success: function (data) {
        //section for response of request
        $(".areaDiabled").prop("disabled", false); // Element(s) are now enabled.
        $("#customerAreaUpdate").html(data);
      },
    });
  });
  // end section of fetching the area data by choosing the district

  //section to handle the transaction view on button click

  $("body").on("click", ".loanTransaction", function () {
    var customer_id = $(this).attr("id");

    if ($.isNumeric(customer_id)) {
      window.location.href =
        "./index.php?status=viewTransaction&cus_id_transaction=" + customer_id;
    }
  });

  //section to handle the transaction view on button click
  //section to handle the take loan button redirects to takeloan_page

  $("body").on("click", ".takeLoanRedirect", function () {
    var customer_id = $(this).attr("id");

    if ($.isNumeric(customer_id)) {
      window.location.href = "./index.php?status=newLoan&CUS_ID=" + customer_id;
    }
  });

  //section to handle the take loan button redirects to takeloan_page
  //section to handle the detele button
  $("body").on("click", ".deleteCustomer", function () {
    var customer_id = $(this).attr("id");

    if ($.isNumeric(customer_id)) {
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to roll Back!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "post",
            url: "pages/viewCustomer/disableCustomerRequest.php",
            data: {
              customerId: customer_id,
            },
            success: function (data) {
              if (data == 1) {
                swal(
                  "CUSTOMER DELETED SUCCESSFULLY",
                  "THANK YOU",
                  "success"
                ).then(() => {
                  window.location.href = "./index.php?status=viewCustomer";
                });
              }
            },
          });
        } else {
          swal("NO CHANGES HAD MADE!");
        }
      });
    }
  });

  //section to handle the take loan button redirects to takeloan_page
});


//section for fetching the customer details

$(".customerViewModel").click(function () {
  let customer_id = $(this).attr("id");

  $.ajax({
    type: "post",
    url: "pages/viewCustomer/fetchSingleCustomer.php",
    data: { id: customer_id },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
});
// end section for fetching the customer details
