$(function() {
  $("#viewProductTable").DataTable({
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"]
  })

  //section for Updating Product stock
  $("body").on("click", "#updateProductStock", function() {
    let id = $(this).attr("data-id")
    let newStock = $("#productQuantityUpdate").val()

    let data = new FormData()

    data.append("productId", id)
    data.append("newStock", newStock)
    swal({
      title: "Are you sure?",
      text: "Once Accepted, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then(willDelete => {
      if (willDelete) {
        //ajax request to Update product stock if conformation is ok
        axios
          .post("pages/viewProducts/updateStock.php", data)
          .then(e => {
            if (e.status == 200) {
              swal("Done", "PRODUCT STOCK UPDATED ", "success").then(() => {
                window.location.href = "./index.php?status=viewProduct"
              })
            }
          })
          .catch(e => {
            console.log(e)
          })
      } else {
        swal("NO CHANGES HAD MADE!")
      }
    })
  })
})
//section for handleing the form submission
$("#new_product_creation").submit(function(event) {
  event.preventDefault()
  //global varible to check all are valid
  let valid_form_details = true

  //setting the value of fields to null for validation
  $("#productName").removeClass("is-invalid")
  $("select#productBrand").removeClass("is-invalid")
  $("#productModel").removeClass("is-invalid")
  $("#productPrice").removeClass("is-invalid")
  $("#productQunatity").removeClass("is-invalid")

  //section for indication

  let product_name = $("#productName").val()
  let product_brand = $(".productBrand").val()
  let product_model = $("#productModel").val()
  let product_price = $("#productPrice").val()
  let product_qunatity = $("#productQunatity").val()
  let product_brand_id = $(productBrand)
    .find("option:selected")
    .val()

  //validation for the area name
  if (product_name == "") {
    $("#productName").addClass("is-invalid")
    valid_form_details = false
  } else {
    $("#productName").addClass("is-valid")
  }
  //validation for the product brand
  if (product_brand == 0) {
    $("select#productBrand").addClass("is-invalid")
    valid_form_details = false
  } else {
    $("select#productBrand").addClass("is-valid")
  }
  //validation for the product model
  if (product_model == "") {
    $("#productModel").addClass("is-invalid")
    valid_form_details = false
  } else {
    $("#productModel").addClass("is-valid")
  }
  //validation for the product price
  if (product_price == "" || !$.isNumeric(product_price)) {
    $("#productPrice").addClass("is-invalid")
    valid_form_details = false
  } else {
    $("#productPrice").addClass("is-valid")
  }
  //validation for the product Qunatity
  if (product_qunatity == "" || !$.isNumeric(product_qunatity)) {
    $("#productQunatity").addClass("is-invalid")
    valid_form_details = false
  } else {
    $("#productQunatity").addClass("is-valid")
  }

  //section for insetion of a form new_agent_creation
  if (valid_form_details) {
    //ajax requesting to server

    $.ajax({
      type: "post",
      url: "pages/addProduct/addProductRequest.php",
      data: {
        productName: product_name,
        productModel: product_model,
        productBrand: product_brand_id,
        productPrice: product_price,
        productQunatity: product_qunatity
      },
      success: function(data) {
        console.log(data)
        //section for response of request
        if (data != 0) {
          swal("Good job!", "You Created New Area", "success").then(() => {
            window.location.href = "index.php"
          })
        } else {
          swal("Warning Something Went Wrong", "opps!", "error").then(() => {
            window.location.href = "index.php"
          })
        }
      }
    })
  }
})

//section for updating the area details

$(".productViewModel").click(function() {
  let area_id = $(this).attr("id")
  console.log(area_id)

  $.ajax({
    type: "post",
    url: "pages/viewProducts/fetchSingleProduct.php",
    data: { id: area_id },
    success: function(data) {
      $(".modal-body").html(data)
    }
  })
})

//section for deleteing the agent
$(".deleteProduct").click(function() {
  let id = $(this).attr("id")

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to roll Back!",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      //ajax request to delete brand name if conformation is ok
      $.ajax({
        type: "post",
        url: "pages/viewProducts/deleteProduct.php",
        data: { deleteid: id },
        success: function(data) {
          swal(data, "PRODUCT DELETED", "success").then(() => {
            window.location.href = "./index.php?status=viewProduct"
          })
        }
      })
    } else {
      swal("NO CHANGES HAD MADE!")
    }
  })
})
