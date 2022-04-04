let total_amount; //gloabal declration

$(function () {
  $(".productTable").hide();
  // $(".paymentForm").hide();
  $(".submitLoan").hide();

  //section to add product to bill
  $("body").on("click", ".addProductToBill", function () {
    $(".productTable").hide();

    let product_id = $(this).attr("id");
    let customer_id = $("#customerSubmitId").val();
    let productQuantity = $("#productQuantity" + product_id).val();

    $.ajax({
      type: "post",
      url: "pages/takeLoan/takeLoanPageAddProductToBillRequest.php",
      data: {
        productId: product_id,
        customer_id: customer_id,
        productQuantity: productQuantity,
      },
      success: function (data) {
        $(".addToBill").empty();
        $(".addToBill").html(data);
        $("#searchBar").val("");
        let grand_total = $("#grand_total").val();
        console.log(grand_total);
        $(".grandTotalDetailView").html(grand_total);
        //request section to product tabel to less product Quantity on adding to bill
        $.ajax({
          type: "post",
          url: "pages/takeLoan/ProductQuantityLessRequest.php",
          data: {
            productId: product_id,
            productQuantity: productQuantity,
          },
          success: function (data) { },
        });
        //end request section to product tabel to less product Quantity on adding to bill
      },
    });
  });
  //end section to add product to bill

  //section to delete product on bill
  $("body").on("click", ".deleteProductFromBill", function () {
    let delete_Product_id = $(this).attr("id");
    let customer_id = $("#customerSubmitId").val();


    //request section to product tabel to add product Quantity on adding to bill
    $.ajax({
      type: "post",
      url: "pages/takeLoan/ProductQuantityAddRequest.php",
      data: {
        delete_Product_id: delete_Product_id,
        customer_id: customer_id,
      },
      success: function (data) {

        $.ajax({
          type: "post",
          url: "pages/takeLoan/takeLoanPageDeleteProductOnBillRequest.php",
          data: {
            delete_Product_id: delete_Product_id,
            customer_id: customer_id,
          },
          success: function (data) {
            $(".addToBill").empty();
            $(".addToBill").html(data);
            $("#searchBar").val("");
            let grand_total = $("#grand_total").val();
            $(".grandTotalDetailView").html(grand_total);

          }
        });

      },
    });

    //end request section to product tabel to add product Quantity on adding to bill



  });
  //end section to delete product on bill

  //section to handle discount from total amount

  $("body").on("change", "#productDiscount", function () {
    //to reset value
    $("#productDiscount").removeClass("is-invalid");

    let iniztial_payment = $("#iniztialPayment").val();
    let discount_amount = $("#productDiscount").val();
    let grand_total = $("#grand_total").val();
    $(".grandTotalDetailView").html(grand_total);

    if (!$.isNumeric(discount_amount)) {
      $("#productDiscount").addClass("is-invalid");
      $("#productTotalAmount").val("0");
    } else {
      let final_payable_amount =
        grand_total - discount_amount - iniztial_payment;
      $("#productTotalAmount").val(final_payable_amount);
      $(".grandTotalDetailView").html(final_payable_amount);
      $(".discountPaymentDetailView").html(discount_amount);
      $("#balanceAmount").val(final_payable_amount);
      $(".balanceDetailView").html(final_payable_amount);
    }
  });
  //end section to handle discount from total amount

  //section to calculate the balance amount to after inizial payment
  $("body").on("keyup", "#iniztialPayment", function () {
    //to make error zero for initizal payment
    $("#iniztialPayment").removeClass("is-invalid");
    $(".submitLoan").hide();

    let iniztial_payment = $("#iniztialPayment").val();
    let grand_total = $("#grand_total").val();
    let discount = $("#productDiscount").val();
    if (
      Number(iniztial_payment) <= Number(grand_total) - Number(discount) &&
      !iniztial_payment == ""
    ) {
      let balance_payment = grand_total - iniztial_payment - discount;
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
    let product_id = 1;
    let product_quantity = 1;
    let total_amount = $("#grand_total").val();
    let initizal_amount = $("#iniztialPayment").val();
    let discount = $("#productDiscount").val();
    let balance_amount = total_amount - initizal_amount - discount;
    let total_amount_after_discount = total_amount - discount;
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
        totalLoanAmount: total_amount_after_discount,
        discountamount: discount,
        initizalLoanAmount: initizal_amount,
        balanceAmount: balance_amount,
        loanStatus: loan_status,
      },
      success: function (data) {
        //section for response of request

        if (!data == 1) {
          //section for showing error
          swal("OOPS!", "SOMETHING WENT WRONG", "danger").then(() => {
            window.location.href = "index.php?";
          });
        } else {
          //section for showing success message
          swal("DONE!", "ADDED NEW LOAN", "success").then(() => {
            window.location.href = "index.php?status=addCustomer";
          });
        }
      },
    });
  });

  // end of section to handle the loan submission after all the details filled
});

$("#searchBar").keyup(function () {
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
