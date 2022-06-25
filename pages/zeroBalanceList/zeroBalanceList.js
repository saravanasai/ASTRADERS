
$(function(){

   //global scope variables
   var is_all_selected=true;


  //this initialization is done for ZeroBalanceList Table 
 
  $('#ZeroBalanceListTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
        ]

    });
  //End initialization is done for ZeroBalanceList Table 

   //section to handle the detele button
   $("body").on("click", ".deleteCustomerFromZeroList", function () {
    var customer_id = $(this).attr("id");
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      showCancelButton: true,
      dangerMode: true,
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((isConfirm)=>{ if (isConfirm) {     
      $.ajax({
        type: "post",
        url: "pages/viewCustomer/disableCustomerRequest.php",
        data: {
          customerId: customer_id,
        },
        success: function (data) {
          if (data == 1) {
            swal("CUSTOMER DELETED SUCCESSFULLY", "THANK YOU", "success").then(() => {
              window.location.href = "./index.php?status=zeroBalanceList";
            });
          }
        },
      });
    }else
    {
      swal("Cancelled", "Your Process Cancel :)", "error");
    }
    });
  
  });
  //end section to handle the delete button 
 
  //section to handle the mutiple delete button 
  $("body").on("click", "#zero_balance_list_multiple_del", function () {
    
     let deleteIds=[];
    $("input:checkbox[name=zeroBalanceCustomerID]:checked").each(function(){
      deleteIds.push($(this).val());
    });  
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      showCancelButton: true,
      dangerMode: true,
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((isConfirm)=>{ if (isConfirm) {
      $.ajax({
        type: "post",
        url: "pages/zeroBalanceList/zeroBalanceListDeleteRequest.php",
        data: {
          deleteIds: deleteIds,
        },
        success: function (data) {
          if (data == 1) {
            swal("CUSTOMER DELETED SUCCESSFULLY", "THANK YOU", "success").then(() => {
              window.location.href = "./index.php?status=zeroBalanceList";
            });
          }
        },
      });
    }else
    {
      swal("Cancelled", "Your Process Cancel :)", "error");
    }
    });
  
  });
  //end section to handle the mutiple delete button 
    

  //section for select all inlist

  $("body").on("click", "#zero_balance_list_select_all",function(){
     

    console.log(is_all_selected);

    if(is_all_selected)
    {
      $("input:checkbox[name=zeroBalanceCustomerID]").each(function(){

        $(this).prop('checked', true);
        
      });  
         
      $('#zero_balance_list_select_all').html('')
      $('#zero_balance_list_select_all').html('<i class="fa fa-minus-square px-1" aria-hidden="true"></i>UN-SELECT ALL')
      is_all_selected=false
    }
    else{
      $("input:checkbox[name=zeroBalanceCustomerID]").each(function(){

       $(this).prop('checked',false);
        
      });  
      $('#zero_balance_list_select_all').html('')
      $('#zero_balance_list_select_all').html('<i class="fa fa-minus-square px-1" aria-hidden="true"></i>SELECT ALL')
     
      
      is_all_selected=true
    }
    


  });
  //end section for select all inlist 


});