
$(function()
{
    $('#viewSingleAgentCollectionTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
            ]
        });


    //section to fetch the transaction details from transaction table using transaction id
$(".singleAgenttransactionViewModel").click(function () {
    let ln_id = $(this).attr("id");
    let customer_id = $(this).attr("data-id");
   
    //section for ajax
    $.ajax({
      type: "post",
      url: "pages/singleAgentTodayTransaction/singleAgentfetchSingleTransaction.php",
      data: { customer_id: customer_id, ln_id: ln_id },
      success: function (data) {
        $(".modal-body").html(data);
        $("#buttonUpdateTransaction").hide();
      },
    });
  
    // end  ajax
  });
  
  //end  section to fetch the transaction details from transaction table using transaction id
});