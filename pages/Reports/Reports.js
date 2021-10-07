
$(function () {});
 $('#viewReportTable').DataTable({
  dom: 'Bfrtip',
  buttons: [
  'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
      ]
  });
//hidding things while loading the page 
//resseting the  validation feilds 
$('#report_to_district_error').hide();
$('#report_to_area_error').hide();


//section of fetching the area data by choosing the district
$("#report_to_district").change(function () {
  let district_id = $("select#report_to_district").val();
  //ajax requesting to server
  $.ajax({
    type: "post",
    url: "pages/Reports/areaFetchRequestForReports.php",
    data: {
      districtId: district_id,
    },
    success: function (data) {
      //section for response of request
      $(".inputDisabled").prop("disabled", false); // Element(s) are now enabled.
      $("#report_to_area").html(data);
    },
  });
});
// end section of fetching the area data by choosing the district

//section for creating the new customer for loan
$('body').on('click','#get_report',function () {

           //resseting the  validation feilds 
           $('#report_to_district_error').hide();
           $('#report_to_area_error').hide();
           $('#report_to_district').removeClass('is-invalid');
           $('#report_to_area').removeClass('is-invalid');
           let valid_form_details = true;

          //section for getting the district and area id
         
          let district_id = $("select#report_to_district").val();
          let area_id = $("select#report_to_area").val();
         

          //validation for the District _id
          if (district_id == "0") {
            $("#report_to_district").addClass("is-invalid");
            $('#report_to_district_error').show();
            valid_form_details = false;
          } 
          //validation for area_id
          if (area_id == "0") {
            $("#report_to_area").addClass("is-invalid");
            $('#report_to_area_error').show();
            valid_form_details = false;
          } 
          //section for insetion of a form new_customer_creation
          if (valid_form_details) {
            //ajax requesting to server

            $.ajax({
              type: "post",
              url: "pages/Reports/GetReportRequest.php",
              dataType: 'json',
              data: {
                district_id:district_id,
                area_id:area_id
              },
              beforeSend: function() {
                // setting a loader tills teh request finish
                $('#loading_spinner').html('<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>');
            },
            complete: function() {
              
              //section to hide loader
              $('#loading_spinner').html('');
            },
              success: function (data) {
                
                // let response=JSON.parse(data);
               
                //data will be a html templete generated with data on server side
                $('#report_insert').html(data.report);
                $('#report_total').val(data.total);
                $('#report_balance').val(data.balance);
                //section for response of request

                // if (data == 1) {
                //   swal("Good job!", "You Created Customer Id", "success").then(() => {
                //     window.location.href = "index.php?status=takeLoan&CUS_ID=0";
                //   });
                // } else {
                //   swal("ALERT!", "CUSTOMER ALREADY EXITS", "warning").then(() => {
                //     window.location.href = "index.php?status=addCustomer";
                //   });
                // }
              },
            });
  }
});
//section for adding customer