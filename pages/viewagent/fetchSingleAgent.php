<?php 
  
 include("../../config.php");

     //SECTION FOR FETCHING THE DATA FROM districts TABLE

$sql_for_district = "SELECT * FROM districts";
$stmt_for_dsitrict = $conn->prepare($sql_for_district);
$stmt_for_dsitrict->execute();
$district_list_fecthed = $stmt_for_dsitrict->fetchAll(PDO::FETCH_ASSOC);
$district_list_view_on_modal="";

foreach($district_list_fecthed as $district_list)
{
  $district_list_view_on_modal.='
  <option data-select2-id="'.$district_list["DISTRICT_ID"].'" value="'.$district_list["DISTRICT_ID"].'">'.$district_list["DISTRICT_NAME"].'</option>';
}



//end of the districts list fetching



   //section for fetching and showing the agent data in model
  if(isset($_POST["id"]))
   {
    
     $id=$_POST["id"];

    $sql="SELECT * FROM `agents`,districts WHERE AGENT_ID=:id AND agents.AGENT_FOR_CITY=districts.DISTRICT_ID;" ;

   $stmt=$conn->prepare($sql);
   $stmt->bindParam("id",$id);
   $stmt->execute();

  
 $singleAgentDeatail=$stmt->fetchAll(PDO::FETCH_ASSOC);

   foreach($singleAgentDeatail as $singleAgent)
   {
      
    echo '<form id="agentViewUpdateForm" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="agentNameUpdate">AGENT NAME</label>
        <input type="text" class="form-control" id="agentNameUpdate" name="agentNameUpdate" placeholder="AGENT NAME" value="'.$singleAgent["AGENT_NAME"].'">
      </div>
      <div class="form-group">
        <label for="agentPhoneNumberUpdate">AGENT PHONE NUMBER</label>
        <input type="text" class="form-control" id="agentPhoneNumberUpdate" name="agentPhoneNumberUpdate" placeholder="Agent Phone Number" value="'.$singleAgent["AGENT_PHONE_NUMBER"].'">
      </div>
      
      <div class="form-group">
      <label for="agentAdharNumberUpdate">AGENT ADHAR NUMBER</label>
      <input type="text" class="form-control" id="agentAdharNumberUpdate" name="agentAdharNumberUpdate" placeholder="Agent Adhar Number" value="'.$singleAgent["AGENT_ADHAR_NO"].'">
     </div>
     <div class="form-group">
                  <label>DISTRICT TO AGENT*</label>
                  <select class="form-control" id="agentCity" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="agentCityUpdate">
                  <option selected="selected" value="'.$singleAgent["DISTRICT_ID"].'">'.$singleAgent["DISTRICT_NAME"].'</option>
                    "'.$district_list_view_on_modal.'"
                    </select>
                </div>
    
     <div class="form-group">
     <label for="agentAddressUpdate">AGENT ADDRESS</label>
     <textarea type="text" row="2" class="form-control" id="agentAddressUpdate" name="agentAddressUpdate" placeholder="Agent Address" >'.$singleAgent["AGENT_ADDRESS"].'</textarea>
     </div>
     
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-warning float-right" name="updateForm">UPDATE</button>
      <input type="hidden"  name="agentUpdateId" value="'.$singleAgent["AGENT_ID"].'">
    </div>
  </form>';

   }
}



?>