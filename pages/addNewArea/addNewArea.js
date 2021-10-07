$(function () {
  $("#viewAreaTable").DataTable({ dom: 'Bfrtip',
  buttons: [
  'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
      ]});

  //section for deleteing the area
  $(".deleteArea").click(function () {
    let id = $(this).attr("id");

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
          url: "pages/viewArea/deleteArea.php",
          data: { deleteid: id },
          success: function (data) {
            swal(data, "AREA DELETED", "success").then(() => {
              window.location.href = "./index.php?status=viewArea";
            });
          },
        });

      } else {
        swal("NO CHANGES HAD MADE!");
      }
    });

    
  });
});
//section for handleing the form submission
$("#new_area_creation").submit(function (event) {
  event.preventDefault();
  //global varible to check all are valid
  let valid_form_details = true;

  //setting the value of fields to null for validation
  $("#areaName").removeClass("is-invalid");
  $("#areaDistrict").removeClass("is-invalid");

  //section for indication

  let area_name = $("#areaName").val();
  let area_district = $("#areaDistrict").val();

  //validation for the area name
  if (area_name == "" || $.isNumeric(area_name)) {
    $("#areaName").addClass("is-invalid");
    valid_form_details = false;
  } else {
    $("#areaName").addClass("is-valid");
  }
  //validation for the area district
  if (area_district == 0) {
    $("#areaDistrict").addClass("is-invalid");
    valid_form_details = false;
  } else {
    $("#areaDistrict").addClass("is-valid");
  }

  //section for insetion of a form new_agent_creation
  if (valid_form_details) {
    //ajax requesting to server

    $.ajax({
      type: "post",
      url: "pages/addNewArea/addNewAreaRequest.php",
      data: {
        areaName: area_name,
        areaDistrict: area_district,
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

//section for updating the area details

$(".areaViewModel").click(function () {
  let area_id = $(this).attr("id");
  let district_id = $("#editAreaDistrictId").val();

  console.log(district_id);

  $.ajax({
    type: "post",
    url: "pages/viewArea/fetchSingleArea.php",
    data: { id: area_id, districtid: district_id },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
});
