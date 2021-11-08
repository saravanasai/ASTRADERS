$(function () {});

//hidding things while loading the page
//resseting the  validation feilds
$("#report_of_agent_error").hide();
//section of fetching the area data by choosing the district
$("#report_to_agent").change(function () {
  let agent_id = $("select#report_to_agent").val();
  //ajax requesting to server
  $.ajax({
    type: "post",
    url: "pages/AgentReport/agentFetchRequestForReports.php",
    data: {
      agent_id: agent_id,
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
      let response = JSON.parse(data);
      //section for response of request
      $("#report_to_agent").prop("disabled", true);
      $("#agent_report_insert").html(response.report);
      $("#agent_report_total").val(response.total);
      // DataTables initialisation
      $("#viewAgentReportTable").DataTable({
        dom: "Bfrtip",
        buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
      });
    },
  });
});
// end section of fetching the area data by choosing the district

//section for fetching report by _from date
$("body").on("change", "#from_date", function () {
  $("#to_date").val(0);
  let agent_id = $("select#report_to_agent").val();
  //section for getting the district and area id
  let from_date = $("#from_date").val();
  //section for fetching the report on from_date
  if (true) {
    //ajax requesting to server
    $.ajax({
      type: "post",
      url: "pages/AgentReport/agentFromDateFetchRequestForReports.php",
      dataType: "json",
      data: {
        agent_id: agent_id,
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
        $("#agent_report_insert").empty();
        $("#viewAgentReportTable").DataTable().destroy();
        //data will be a html templete generated with data on server side
        //section for response of request
        $("#agent_report_insert").html(data.report);
        $("#agent_report_total").val(data.total);
        $("#viewAgentReportTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
        });
      },
    });
  }
});
//end section forfething teh data by from_date

//section for fetching report by _from to_date
$("body").on("change", "#to_date", function () {
  let agent_id = $("select#report_to_agent").val();
  //section for getting the district and area id
  let from_date = $("#from_date").val();
  let to_date = $("#to_date").val();
  //section for fetching the report on from_date
  if (true) {
    //ajax requesting to server
    $.ajax({
      type: "post",
      url: "pages/AgentReport/agentFromDateToToDateFetchRequestForReports.php",
      dataType: "json",
      data: {
        agent_id: agent_id,
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
        console.log(data);
        $("#agent_report_insert").empty();
        $("#viewAgentReportTable").DataTable().destroy();
        //data will be a html templete generated with data on server side
        //section for response of request
        $("#agent_report_insert").html(data.report);
        $("#agent_report_total").val(data.total);
        $("#viewAgentReportTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
        });
      },
    });
  }
});
//end section forfething teh data by to_date


//section for handling the refresh button 

$('body').on('click','#refreshbtn',function()
{
  $("#viewAgentReportTable").DataTable().destroy();
  $("#agent_report_insert").html(`<tr id="loading_spinner">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  
</tr>`);
  $("#agent_report_total").val('');
  $("#report_to_agent").prop("disabled", false);
  $("#from_date").val(0);
  $("#to_date").val(0);
  $("select#report_to_agent").val(0);
  
})