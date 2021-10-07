
$(function()
{
  
    //section to get the collection details of sepcific agent
     $('body').on('click','.agentcollection',function()
     {
         let agent_id=$(this).attr('id');
         
         //ajax request
         $.ajax({
            type: "post",
            url: "pages/singleAgentcollection/agentCollectionTotalAmountRequest.php",
            data: {
               
                agentid:agent_id
            },
            success: function (data) {
            
                  swal(data, "TOTAL AMOUNT", "info").then(() => {
                    // window.location.href = "./index.php?status=singleAgentcollection";
                  });
               

            },
          });
         //end of ajax request

     });
    //end section to get the collection details of sepcific agent
});