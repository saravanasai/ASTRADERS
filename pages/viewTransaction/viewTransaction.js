
$(function()
{

    
    $('#singleCustomerTransactionTable').DataTable({
        dom: 'Bip',
        buttons: [
        'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
            ]
        });

    //getting the invoice details from orderItemmaster table
    $('body').on('click','.invoiceDetails',function()
    {
        let order_id=$(this).attr('id');
            
         window.location.href="?status=inVoiceOfCustomer&invoice_id="+order_id;


    });
    //end getting the invoice details from orderItemmaster table
})