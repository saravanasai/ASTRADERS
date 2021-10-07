$(function () {
  //section for deleteing the brand
  $(".deletebrand").click(function () {
    let id = $(this).attr("id");

    console.log(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //ajax request to delete brand name if conformation is ok
        $.ajax({
          type: "post",
          url: "pages/viewBrand/deleteBrand.php",
          data: { deleteid: id },
          success: function (data) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
            swal(data, "BRAND DELETED", "success").then(() => {
              window.location.href = "./index.php?status=viewBrand";
            });
          },
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });
  });
});
//section for handleing the form submission
$("#new_brand_creation").submit(function (event) {
  event.preventDefault();
  //global varible to check all are valid
  let valid_form_details = true;

  //setting the value of fields to null for validation
  $("#brandName").removeClass("is-invalid");

  //section for indication

  let brand_name = $("#brandName").val();

  //changing to uppercase
  brand_name_to_upperCase = brand_name.toUpperCase();

  //validation for the brand name
  if (brand_name == "") {
    $("#brandName").addClass("is-invalid");
    valid_form_details = false;
  } else {
    $("#brandName").addClass("is-valid");
  }

  //section for insetion of a form new_BRAND_creation
  if (valid_form_details) {
    //ajax requesting to server

    $.ajax({
      type: "post",
      url: "pages/addBrand/addBrandRequest.php",
      data: {
        brandName: brand_name_to_upperCase,
      },
      success: function (data) {
        //section for response of request
        swal("Good job!", "You Created New Area", "success").then(() => {
          window.location.href = "index.php";
        });
      },
    });
  }
});

//section for updating the brand details

$(".brandViewModel").click(function () {
  let area_id = $(this).attr("id");
  console.log(area_id);

  $.ajax({
    type: "post",
    url: "pages/viewbrand/fetchSingleBrand.php",
    data: { id: area_id },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
});
