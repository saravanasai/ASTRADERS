
$(function () {

    //section of fetching the area data by choosing the district
    $("#report_to_agent_monthly").change(function () {
        $('#monthlyAgentReportTable').DataTable().destroy();
        let agent_id = $("select#report_to_agent_monthly").val();
        //ajax requesting to server
        $.ajax({
            type: "post",
            url: "pages/monthlyAgentReport/monthlyAgentReportbyAgentRequest.php",
            data: {
                agent_id: agent_id,
            },
            beforeSend: function () {
                // setting a loader tills teh request finish
                $("#loading_spinner_monthly_report").html(
                    '<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>'
                );
            },
            complete: function () {
                //section to hide loader
                $("#loading_spinner_monthly_report").html("");
            },
            success: function (data) {
                let response = JSON.parse(data);
                //section for response of request
                $("#report_to_agent").prop("disabled", true);
                $("#agent_report_insert_monthly").html(response.report);
                $("#agent_report_total").val(response.total);
                // DataTables initialisation
                $("#monthlyAgentReportTable").DataTable({
                    dom: "Bp",
                    buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
                });
            },
        });
    });
    // end section of fetching the area data by choosing the district

    //section for fetching report by _from date
    $("body").on("change", "#from_date_monthly_report", function () {
        $("#to_date_agent_monthly_report").val(0);
        let agent_id = $("select#report_to_agent_monthly").val();
        //section for getting the district and area id
        let from_date = $("#from_date_monthly_report").val();
        //section for fetching the report on from_date
        if (true) {
            //ajax requesting to server
            $.ajax({
                type: "post",
                url: "pages/monthlyAgentReport/agentMonthlyFromDateFetchRequestForReports.php",
                dataType: "json",
                data: {
                    agent_id: agent_id,
                    from_date: from_date,
                },
                beforeSend: function () {
                    // setting a loader tills teh request finish
                    $("#loading_spinner_monthly_report").html(
                        '<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>'
                    );
                },
                complete: function () {
                    //section to hide loader
                    $("#loading_spinner_monthly_report").html("");
                },
                success: function (data) {
                    
                    $("#agent_report_insert_monthly").empty();
                    $("#monthlyAgentReportTable").DataTable().destroy();
                    //data will be a html templete generated with data on server side

                    // console.log(data.report);
                    $("#agent_report_insert_monthly").html(data.report);
                    $("#agent_report_total").val(data.total);
                    // DataTables initialisation
                    $("#monthlyAgentReportTable").DataTable({
                        dom: "Bp",
                        buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
                    });
                },
            });
        }
    });
    //end section forfething teh data by from_date

    //section for fetching report by _from to_date
    $("body").on("change", "#to_date_agent_monthly_report", function () {
        let agent_id = $("select#report_to_agent_monthly").val();
        //section for getting the district and area id
        let from_date = $("#from_date_monthly_report").val();
        let to_date = $("#to_date_agent_monthly_report").val();
        //section for fetching the report on from_date
        if (true) {
            //ajax requesting to server
            $.ajax({
                type: "post",
                url: "pages/monthlyAgentReport/agentMonthlyToDateFromDateFetchRequest.php",
                dataType: "json",
                data: {
                    agent_id: agent_id,
                    from_date: from_date,
                    to_date: to_date,
                },
                beforeSend: function () {
                    // setting a loader tills teh request finish
                    $("#loading_spinner_monthly_report").html(
                        '<td colspan="7" style="text-align: center;"><div class="lds-hourglass"></div></td>'
                    );
                },
                complete: function () {
                    //section to hide loader
                    $("#loading_spinner_monthly_report").html("");
                },
                success: function (data) {
                    $("#agent_report_insert_monthly").empty();
                    $("#monthlyAgentReportTable").DataTable().destroy();
                    //data will be a html templete generated with data on server side

                    // console.log(data.report);
                    $("#agent_report_insert_monthly").html(data.report);
                    $("#agent_report_total").val(data.total);
                    // DataTables initialisation
                    $("#monthlyAgentReportTable").DataTable({
                        dom: "Bp",
                        buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
                    });
                },
            });
        }
    });
    //end section forfething teh data by to_date

});