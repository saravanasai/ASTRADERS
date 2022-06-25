




$(function () {
 
  //hiding the loader 
  $('#loading_spinner').hide();

  // DataTables initialisation
  $("#totalsalesReportTable").DataTable({
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
  });
  

});

//hidding things while loading the page


//section for fetching report by _from date
$("body").on("change", "#from_date_sale_report", function () {
  $("#to_date_sale_report").val(0);
  //section for getting the district and area id
  let from_date = $("#from_date_sale_report").val();
  //section for fetching the report on from_date
  if (true) {
    //ajax requesting to server
    $.ajax({
      type: "post",
      url: "pages/totalSalesReport/FromDateFetchRequestForReports.php",
      dataType: "json",
      data: { 
        from_date: from_date,
      },
      beforeSend: function () {
        // setting a loader tills teh request finish
        $("#loading_spinner").html(
          '<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>'
        );
      },
      complete: function () {
        //section to hide loader
        $("#loading_spinner").html("");
      },
      success: function (data) {
        // let response=JSON.parse(data);
        console.log(data);
        $("#sales_report_insert").empty();
        $("#totalsalesReportTable").DataTable().destroy();
        //data will be a html templete generated with data on server side
        //section for response of request
        $("#sales_report_insert").html(data.report);
        $("#sales_report_total").val(data.total);
        $("#sales_report_on_cash").val(data.onCash);
        $("#totalsalesReportTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
        });
      },
    });
  }
});
//end section forfething teh data by from_date

//section for fetching report by _from to_date
$("body").on("change", "#to_date_sale_report", function () {
  
  //section for getting the district and area id
  let from_date = $("#from_date_sale_report").val();
  let to_date = $("#to_date_sale_report").val();
  //section for fetching the report on from_date
  if (true) {
    //ajax requesting to server
    $.ajax({
      type: "post",
      url: "pages/totalSalesReport/FromDateToToDateFetchRequestForReports.php",
      dataType: "json",
      data: {
        from_date: from_date,
        to_date: to_date,
      },
      beforeSend: function () {
        // setting a loader tills teh request finish
        $("#loading_spinner").html(
          '<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>'
        );
      },
      complete: function () {
        //section to hide loader
        $("#loading_spinner").html("");
      },
      success: function (data) {
        // let response=JSON.parse(data);
        $("#sales_report_insert").empty();
        $("#totalsalesReportTable").DataTable().destroy();
        //data will be a html templete generated with data on server side
        //section for response of request
        $("#sales_report_insert").html(data.report);
        $("#sales_report_total").val(data.total);
        $("#sales_report_on_cash").val(data.onCash);
        $("#totalsalesReportTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
        });
      },
    });
  }
});
//end section forfething teh data by to_date