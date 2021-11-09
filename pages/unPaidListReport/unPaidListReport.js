$(function () {
 
   
   
  
    // DataTables initialisation
    $("#unpaidListReportTable").DataTable({
      dom: "Bfrtip",
      buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
    });
    
  
  });
  