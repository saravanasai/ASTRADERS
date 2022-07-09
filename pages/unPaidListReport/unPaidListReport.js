$(function () {

  $(function () {

    $(document).ready(function () {
      $(".select2").select2();
    });
  
  });

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
      url: "pages/todayReport/getAreasByDistrictRequest.php",
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

  //section for open model for update remarks to user
$("body").on('click','#remark_add_btn',function () {
   
  let customer_id=$('#remarkToCustomer').val();
  let remarks=$('#remarks_to_unpaid_user_text').val();
    alert("ok");
  $.ajax({
   type: "post",
   url: "pages/unPaidListReport/unpaidListRemarkRequest.php",
   data: { id: customer_id ,remarks:remarks},
   success: function (data) {
     if(data==1)
     {
      swal("STATUS UPDATED", "THANK YOU", "success").then(() => {
        window.location.href = "./index.php?status=unPaidListReport";
      });
     }
   },
 });
});
// end section for open model for update remarks to user
   

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
       area_id:area_id.toString()
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

//section for open model for psuh id of user to that model
$(".addRemarksToUnpaid").click(function () {
  let customer_id = $(this).attr("id");
   $('#remarkToCustomer').val(customer_id);
});
// end section for open model for psuh id of user to that model


