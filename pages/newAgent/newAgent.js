$(function () {
  $("#viewAgentTable").DataTable({});

  $(document).ready(function () {
    $(".select2").select2();
  });
});
//section for handleing the form submission
$("#new_agent_creation_form").submit(function (event) {
  event.preventDefault();
  //global varible to check all are valid
  let valid_form_details = true;

  //setting the value of fields to null for validation
  $("#agentName").removeClass("is-invalid");
  $("#agentPhoneNumber").removeClass("is-invalid");
  $("#agentPassword").removeClass("is-invalid");
  $("#agentAdharNumber").removeClass("is-invalid");
  $("#agentAddress").removeClass("is-invalid");
  $("select#agentCity").removeClass("is-invalid");
  $("#error_area").html("");
  //section for indication

  agent_name = $("#agentName").val();
  agent_phone_number = $("#agentPhoneNumber").val();
  agent_password = $("#agentPassword").val();
  agent_adhar_number = $("#agentAdharNumber").val();
  agent_address = $("#agentAddress").val();
  agent_city = $("select#agentCity").val();
  agent_areas = $("select#agent_to_area").val();

  

  //validation for the agent name
  if (agent_name == "") {
    $("#agentName").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for the agent phone number
  if (
    agent_phone_number == "" ||
    agent_phone_number.length > 10 ||
    agent_phone_number.length < 10 ||
    !$.isNumeric(agent_phone_number)
  ) {
    $("#agentPhoneNumber").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for the agent adhar number
  //validation for the agent password
  if (agent_password == "") {
    $("#agentPassword").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for the agent adhar number
  if (
    agent_adhar_number == "" ||
    agent_adhar_number.length > 12 ||
    agent_adhar_number.length < 12 ||
    !$.isNumeric(agent_adhar_number)
  ) {
    $("#agentAdharNumber").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for the agent adhar number
  if (agent_address == "" || agent_address == null) {
    $("#agentAddress").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for the agent city
  if (agent_city == 0) {
    $("select#agentCity").addClass("is-invalid");
    valid_form_details = false;
  } 
  //validation for agents areas
  if (agent_areas == "") {
    $("#error_area").html("Choose the Areas");
    valid_form_details = false;
  } 
    
  console.log(valid_form_details);
  //section for insetion of a form new_agent_creation
  if (valid_form_details) {
    //ajax requesting to server

    $.ajax({
      type: "post",
      url: "pages/newAgent/addNewAgentRequest.php",
      data: {
        agentName: agent_name,
        agentPhoneNumber: agent_phone_number,
        agentPassword: agent_password,
        agentAdharNumber: agent_adhar_number,
        agentAddress: agent_address,
        agentCity: agent_city,
        agentArea: agent_areas,
      },
      success: function (data) {
        //section for response of request
        if(data==1)
        {
          swal("Good job!", "You Created New Agent", "success").then(() => {
            window.location.href = "index.php";
          });
        }
       
        else
        {
          swal("Agent Already Exists!", "Check The Agent Phone Number", "warning").then(() => {
            window.location.href = "index.php";
          });
        }
       
      },
    });
  }
});

//section to load the  area by city seletcion

$("#agentCity").change(function () {

      // reseting the validation 
      $("#error_area").html("");

  let agent_district_id = $("select#agentCity").val();

  //ajax requesting to server

  $.ajax({
    type: "post",
    url: "pages/newAgent/newAgentareaFetchRequest.php",
    data: {
      districtId:agent_district_id,
    },
    success: function (data) {
      //section for response of request
      if(data==2)
      {
       
          $("#error_area").html("No Area Exits for This District");
      }
      $(".inputDisabled").prop("disabled", false); // Element(s) are now enabled.
      $("#agent_to_area").html(data);
    },
  });
});

//end section to load the  area by city seletcion
