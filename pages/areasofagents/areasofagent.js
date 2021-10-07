

$(function ()
{
    
    //section for handling the  adding the areas to agents
    $('body').on('click','.addtoAgentarea',function()
    {
        let agent_id=$('#area_add_to_agent_id').val();
        let agents_to_area_table_id=$(this).attr('id');
          
        console.log(agents_to_area_table_id);
        console.log(agent_id);
         //ajax request to assign the area to agent
         $.ajax({
            type: "post",
            url: "pages/areasofagents/add_area_to_agentRequest.php",
            data: {
             agentid:agent_id,
             agents_to_area_table_id:agents_to_area_table_id
            },
            success: function (data) {
              console.log(data);
              //section for response of request
              if(data!=0)
              {
                swal("You have added area to agent", "done", "success").then(() => {
                    window.location.reload();
                  });
                 
               
              }else
              {
                swal("Warning Something Went Wrong", "opps!", "error").then(() => {
                  window.location.href = "index.php";
                });
              }
             
            },
          });
    })
    //end section for handling the  adding the areas to agents
    
  
     //section for removing the area of agent
     $('body').on('click','.removearea',function()
     {

         let agents_to_area_table_id=$(this).attr('id');
              
       
          //ajax request to assign the area to agent
          $.ajax({
             type: "post",
             url: "pages/areasofagents/remove_area_to_agentRequest.php",
             data: {
              agents_to_area_table_id:agents_to_area_table_id
             },
             success: function (data) {
              
               //section for response of request
               if(data!=0)
               {
                 swal("You have removed area to agent", "done", "success").then(() => {
                     window.location.reload();
                   });
                  
                
               }else
               {
                 swal("Warning Something Went Wrong", "opps!", "error").then(() => {
                   window.location.href = "index.php";
                 });
               }
              
             },
           });
     })
     //end section for removing the area of agent


});