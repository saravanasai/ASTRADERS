$(function () {
  //section for deleteing the agent
  $(".deleteAgent").click(function () {
    let id = $(this).attr("id");

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to roll Back!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //ajax request to delete the agent
        $.ajax({
          type: "post",
          url: "pages/viewagent/deleteAgent.php",
          data: { deleteid: id },
          success: function (data) {
            swal(data, "AGENT DELETED", "success").then(() => {
              window.location.href = "./index.php?status=viewAgents";
            });
          },
        });
      } else {
        swal("NO CHANGES HAD MADE!");
      }
    });
  });
  //end section of deleteing the agent

  //section for disabling the agent
  $("body").on("click", ".diableAgent", function () {
    let id = $(this).attr("id");
    let status = $("#currentStatus").val();
    console.log(status);

    swal({
      title: "Are you sure?",
      text: "You Want To Disable Agent",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        //ajax request to delete brand name if conformation is ok
        $.ajax({
          type: "post",
          url: "pages/viewagent/disableAgent.php",
          data: { disableid: id, currentstatus: status },
          success: function (data) {
            swal("DONE", "PROCESS FINSHED", "success").then(() => {
              window.location.href = "./index.php?status=viewAgents";
            });
          },
        });
      } else {
        swal("NO CHANGES HAD MADE!");
      }
    });
  });
  //end section  for disabling the agent

  //section for viewing the areas fo agents
  $("body").on("click", ".agentAreas", function () {
    let agent_id_to_get_areas = $(this).attr("id");

    window.location.href = "index.php?status=areasofagents&id="+agent_id_to_get_areas;
  });

  //end section for viewing the areas fo agents
});

$(".agentViewModel").click(function () {
  let agent_id = $(this).attr("id");

  $.ajax({
    type: "post",
    url: "pages/viewagent/fetchSingleAgent.php",
    data: { id: agent_id },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
});
