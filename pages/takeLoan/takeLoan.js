let total_amount; //gloabal declration

$(function () {
  console.log("take loan");
  $(".productTable").hide();
  $(".paymentForm").hide();
  $(".submitLoan").hide();

  //section to add product to bill
  $("body").on("click", "#addProductToBill", function () {
    $(".productTable").hide();

    let add_to_bill_product_id = $("#loanToProductId").val();

    $.ajax({
      type: "post",
      url: "pages/takeLoan/takeLoanPageAddProductToBillRequest.php",
      data: {
        productId: add_to_bill_product_id,
      },
      success: function (data) {
        $(".addToBill").html(data);
        $("#searchBar").val("");
      },
    });
  });
  //end section to add product to bill

  //section to calulate the total price of the by quatity
  $("body").on("keyup", "#productQuantity", function () {
    //to reset the value
    $("#productQuantity").removeClass("is-invalid");
    $("#productDiscount").removeClass("is-invalid");

    //variable deeleration
    let quantity = $("#productQuantity").val();
    let product_price = $("#ProductPriceOnBill").val();

    //checking for quantity
    if (!$.isNumeric(quantity) || quantity == "") {
      $("#productQuantity").addClass("is-invalid");
      $("#productTotalAmount").val(0);

      total_amount = 0;
      $(".grandTotalDetailView").html(total_amount);
    } else {
      $("#productQuantity").addClass("is-valid");

      total_amount = quantity * product_price;
      $("#productTotalAmount").val(total_amount);
      $("#productDiscount").val("0");
      $(".grandTotalDetailView").html(total_amount);
    }

    //section to validate the total amount is not zero
    if (total_amount > 0) {
      $(".paymentForm").show();
    }
    // end section to validate the total amount is not zero
  });

  //section to handle discount from total amount

  $("body").on("change", "#productDiscount", function () {
    //to reset value
    $("#productDiscount").removeClass("is-invalid");
   
    let quantity = $("#productQuantity").val();
    let product_price = $("#ProductPrice").val();
    let product_total_amount =quantity*product_price;
    let discount_amount = $("#productDiscount").val();

    if (!$.isNumeric(discount_amount)) {
      $("#productDiscount").addClass("is-invalid");
      $("#productTotalAmount").val("0");
    } else {
      $("#productDiscount").addClass("is-valid");
      let final_payable_amount = product_total_amount - discount_amount;
      $("#productTotalAmount").val(final_payable_amount);
      $(".grandTotalDetailView").html(final_payable_amount);
      $(".discountPaymentDetailView").html(discount_amount);
    }
  });
  //end section to handle discount from total amount

  // END OF section to calulate the total price of the by quatity
  //section to calculate the balance amount to after inizial payment
  $("body").on("keyup", "#iniztialPayment", function () {
    //to make error zero for initizal payment
    $("#iniztialPayment").removeClass("is-invalid");
    $(".submitLoan").hide();

    let iniztial_payment = $("#iniztialPayment").val();
    let discount = $("#productDiscount").val();
    if (iniztial_payment <= total_amount && !iniztial_payment == "") {
      let balance_payment = total_amount - iniztial_payment - discount;
      $("#balanceAmount").val(balance_payment);
      $(".balanceDetailView").html(balance_payment);
      $(".iniztialPaymentDetailView").html(iniztial_payment);
      $(".submitLoan").show();
    } else {
      $("#iniztialPayment").addClass("is-invalid");
      $("#balanceAmount").val(0);
      $(".submitLoan").hide();
    }
  });

  // end section to calculate the balance amount to after inizial payment

  //section to handle the loan submission after all the details filled

  $("body").on("click", ".submitLoan", function () {
    let customer_id = $("#customerSubmitId").val();
    let product_id = $("#ProductIdOnBill").val();
    let product_quantity = $("#productQuantity").val();
    let total_amount = $("#productTotalAmount").val();
    let initizal_amount = $("#iniztialPayment").val();
    let balance_amount = total_amount - initizal_amount;
    let loan_status = 1;

    if (balance_amount == 0) {
      loan_status = 0;
    }

    //SECTION TO AJAX REQUEST TO LOAN TABLE AND SALES TABLE
    $.ajax({
      type: "post",
      url: "pages/takeLoan/newLoanInsertRequest.php",
      data: {
        loanSubmit: "",
        customerId: customer_id,
        productId: product_id,
        productQuantity: product_quantity,
        totalLoanAmount: total_amount,
        initizalLoanAmount: initizal_amount,
        balanceAmount: balance_amount,
        loanStatus: loan_status,
      },
      success: function (data) {
        //section for response of request

        if (!data == 1) {
          //section for showing error
          swal("OPPS!", "SOMETHING WENT WRONG", "danger").then(() => {
            window.location.href = "index.php?";
          });
        } else {
          //section for showing success message
          swal("DONE!", "ADDED NEW LOAN", "success").then(() => {
            window.location.href = "index.php?";
          });
        }
      },
    });
  });

  // end of section to handle the loan submission after all the details filled
});

$("#searchBar").keyup(function () {
  $(".paymentForm").hide();
  let search_key = $("#searchBar").val();
  $(".productTable").show();

  $.ajax({
    type: "post",
    url: "pages/takeLoan/takeLoanPageSearchProductRequest.php",
    data: {
      keyword: search_key,
    },
    success: function (data) {
      if (data != 0) $("#searchResultTable").html(data);
      else $(".productTable").hide();
    },
  });
});
