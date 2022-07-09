<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AGENTS TABLE

$sql = "SELECT * FROM `agents`,districts WHERE agents.AGENT_FOR_CITY=districts.DISTRICT_ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$agent_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the agent list fetching

//section for handling the agent update

if (isset($_POST["updateForm"])) {

  $error = array("error_name" => "", "error_phone_no" => "", "error_adhar_no" => "", "error_address" => "", "error_city" => "");
  $validation_status = true;
  $agent_update_to_id = $_POST["agentUpdateId"];
  $agent_name_update = $_POST["agentNameUpdate"];
  $agent_Phone_number_update = $_POST["agentPhoneNumberUpdate"];
  $agent_adhar_number_update = $_POST["agentAdharNumberUpdate"];
  $agent_address_update = $_POST["agentAddressUpdate"];
  $agent_city_update = $_POST["agentCityUpdate"];
  $agentPasswordUpdate = $_POST["agentPasswordUpdate"];


  //section for validating the updated agent information

  if ($agent_name_update == "") {
    $error["error_name"] = "ENTER THE AGENT NAME";
    $validation_status = false;
  }
  if ($agent_Phone_number_update == "" || strlen($agent_Phone_number_update) > 10 || strlen($agent_Phone_number_update) < 10 || !is_numeric($agent_Phone_number_update)) {
    $error["error_phone_no"] = "ENTER THE PROPER PHONE NUMBER";
    $validation_status = false;
  }
  if ($agent_adhar_number_update == "" || strlen($agent_adhar_number_update) > 12 || strlen($agent_adhar_number_update) < 12 || !is_numeric($agent_adhar_number_update)) {
    $error["error_adhar_on"] = "ENTER THE VALID ADHAR NUMBER";
    $validation_status = false;
  }
  if ($agent_address_update == "") {
    $error["error_address"] = "ENTER THE VALID ADHAR NUMBER";
    $validation_status = false;
  }
  if ($agent_city_update == "") {
    $error["error_city"] = "CHOOSE THE VALID CITY";
    $validation_status = false;
  }


  //section for updating the agent information to database


  if ($validation_status) {

    $sql = "UPDATE agents SET AGENT_NAME=:name,AGENT_ADDRESS=:address,AGENT_ADHAR_NO=:adharNumber,AGENT_PHONE_NUMBER=:phoneNumber,PASSWORD=:password,AGENT_FOR_CITY=:city WHERE AGENT_ID=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("id", $agent_update_to_id);
    $stmt->bindParam("name", $agent_name_update);
    $stmt->bindParam("phoneNumber", $agent_Phone_number_update);
    $stmt->bindParam("adharNumber", $agent_adhar_number_update);
    $stmt->bindParam("address", $agent_address_update);
    $stmt->bindParam("city", $agent_city_update);
    $stmt->bindParam("password", md5($agentPasswordUpdate));


    if ($stmt->execute()) {

      $sql_to_null_areas = "UPDATE `agents_to_area` SET `AREA_TO_AGENT`=NULL WHERE  `AREA_TO_AGENT`=:id";

      $stmt_remove = $conn->prepare($sql_to_null_areas);
      $stmt_remove->bindParam("id", $agent_update_to_id);
      $stmt_remove->execute();


      echo '<script>
              swal("UPDATED", "THE AGENT DETAILS", "success").then(()=>{
                window.location.href = "./index.php?status=viewAgents"; 
              });
           </script>';
    } else {
      echo '<script>
              swal("OPPS!", "SOMETHING WENT WRONG", "error").then(()=>{
                window.location.href = "./index.php?status=viewAgents"; 
              });
           </script>';
    }
  } else {
    echo '<script>
      swal("OPPS!", "CHECK ALL THE ARE VALID ", "error");
      </script>';
  }

  //END OF AGENTS UPDATION SECTION








}

?>
<div class="content-wrapper" style="min-height: 1419.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

  <div class="container p-0">
    <div class="" style="height:200px;">


      <table class="table table-striped table-head-fixed text-nowrap table-bordered" id="viewAgentTable">
        <thead>
          <tr>
            <th style="width: 10px">S.NO</th>
            <th>NAME</th>
            <th>PHONE NUMBER</th>
            <th>TO CITY</th>
            <th>STATUS</th>

            <th style="width: 40px">DELETE</th>
            <th style="width: 40px">CHANGE STATUS</th>

          </tr>
        </thead>
        <tbody>
          <div class="card table-responsive">
            <?php
            foreach ($agent_list_fecthed as $sno => $agents_list) {


              //section to change the color of daiable button
              $current_status = "ACTIVE";
              $color = "success";
              if ($agents_list['AGENT_STATUS'] == "ACTIVE") {
                $current_status = "DISABLE";
                $color = "info";
              }



              echo '<tr>
                     <td>' . ++$sno . '</td>
                     <td>' . $agents_list["AGENT_NAME"] . '</td>
                     <td>
                       ' . $agents_list["AGENT_PHONE_NUMBER"] . '
                     </td>
                     <td>
                     ' . $agents_list["DISTRICT_NAME"] . '
                   </td>
                   <td>
                   ' . $agents_list["AGENT_STATUS"] . '
                    </td>
                     <td>
                     <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-warning agentViewModel" data-toggle="modal" id=' . $agents_list["AGENT_ID"] . ' data-target="#modal-lg">
                         EDIT
                        </button>
                        <button type="button" class="btn btn-sm btn-success agentAreas"  id=' . $agents_list["AGENT_ID"] . '>
                         Areas
                       </button>
                     </div>
                     <td>
                        <div class="btn-group">
                           
                            <button type="button" class="btn btn-sm btn-' . $color . ' diableAgent"  id=' . $agents_list["AGENT_ID"] . '>' . $current_status . '
                            </button>
                        </div>
                    
                      <input type="hidden" value=' . $agents_list["AGENT_STATUS"] . ' id="currentStatus">   
                    </td>

                   </tr>';
              //button to delete enable if needed
              //  <button type="button" class="btn btn-sm btn-danger deleteAgent"  id=' . $agents_list["AGENT_ID"] . '>DELETE
              //  </button>

            }
            ?>
          </div>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.content -->
</div>

<!-- MODEL -->
<!-- Modal -->
<div id="model">
  <div class="modal fade" id="modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once "./assets/js_links.php";
?>