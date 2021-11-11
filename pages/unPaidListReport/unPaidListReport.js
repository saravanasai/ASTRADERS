$(function () {
  // DataTables initialisation
  $("#unpaidListReportTable").DataTable({
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
  });
  
  //section of fetching the area data by choosing the district
  $("#unpaid_report_to_district").change(function () {
    let district_id = $("select#unpaid_report_to_district").val();
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
        $("#unpaid_report_to_area").html(data);
      },
    });
  });
  // end section of fetching the area data by choosing the district
});
//section for creating the new customer for loan
$('body').on('click','#unpaid_get_report',function () {

  //resseting the  validation feilds 
  $('#unpaid_report_to_district_error').hide();
  $('#unpaid_report_to_area_error').hide();
  $('#unpaid_report_to_district').removeClass('is-invalid');
  $('#unpaid_report_to_area').removeClass('is-invalid');
  let valid_form_details = true;

 //section for getting the district and area id

 let district_id = $("select#unpaid_report_to_district").val();
 let area_id = $("select#unpaid_report_to_area").val();


 //validation for the District _id
 if (district_id == "0") {
   $("#unpaid_report_to_district").addClass("is-invalid");
   $('#unpaid_report_to_district_error').show();
   valid_form_details = false;
 } 
 //validation for area_id
 if (area_id == "0") {
   $("#unpaid_report_to_area").addClass("is-invalid");
   $('#unpaid_report_to_area_error').show();
   valid_form_details = false;
 } 
 //section for insetion of a form new_customer_creation
 if (valid_form_details) {
   //ajax requesting to server

   $.ajax({
     type: "post",
     url: "pages/unPaidListReport/GetUnpaidListReportRequest.php",
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
       $('#unpaid_list_report_insert').empty();
       //data will be a html templete generated with data on server side
       
       $('#report_total').val(data.total);
       $('#report_balance').val(data.balance);
       $("#unpaidListReportTable").DataTable().destroy();
       $('#unpaid_list_report_insert').html(data.report);
       $('#unpaidListReportTable').DataTable({
         dom: 'Bfrtip',
         buttons: [
         'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
             ]
         });
     },
   });
}
});
//section for adding customer