<?php 
  
 include("../../config.php");
   
  //SECTION FOR FETCHING THE ALL THE DISRTICTS TO UPDATE FORM
    
  
$sql_for_district = "SELECT * FROM districts";
$stmt_for_dsitrict = $conn->prepare($sql_for_district);
$stmt_for_dsitrict->execute();
$district_list_fecthed = $stmt_for_dsitrict->fetchAll(PDO::FETCH_ASSOC);
$district_list_view_on_modal="";

foreach($district_list_fecthed as $district_list)
{
  $district_list_view_on_modal.='
  <option  value="'.$district_list["DISTRICT_ID"].'">'.$district_list["DISTRICT_NAME"].'</option>';
}
  




  // END SECTION FOR FETCHING THE ALL THE DISRTICTS TO UPDATE FORM

   //section for fetching and showing the agent data in model
  if(isset($_POST["id"]))
   {
    
    $id=$_POST["id"];
    $district_id=$_POST["districtid"];

    $sql="SELECT * FROM areas,districts WHERE AREA_ID=:id AND DISTRICT_ID=:districtId;" ;

     $stmt=$conn->prepare($sql);
     $stmt->bindParam("id",$id);
     $stmt->bindParam("districtId",$district_id);
     $stmt->execute();

    $singleAreaDetail=$stmt->fetchAll(PDO::FETCH_ASSOC);

     
    foreach($singleAreaDetail as $singleArea_list)  
    {
    echo '<form id="" method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="areaNameUpdate">AREA NAME</label>
        <input type="text" class="form-control" id="areaNameUpdate" name="areaNameUpdate" placeholder="AREA NAME" value="'.$singleArea_list["AREA_NAME"].'">
      </div>
      <div class="form-group">
                  <label>AREA DISTRICT*</label>
                  <select class="form-control select2bs4 select2-hidden-accessible" id="areaDistrictUpdate" name="areaDistrictUpdate" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="agentCityUpdate">
                  <option selected="selected" value="'.$singleArea_list["DISTRICT_ID"].'">'.$singleArea_list["DISTRICT_NAME"].'</option>
                    "'.$district_list_view_on_modal.'"
                    </select>
                </div>
     </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-warning float-right" name="updateForm">UPDATE</button>
      <input type="hidden"  name="areaUpdateId" value="'.$singleArea_list["AREA_ID"].'">
    </div>
  </form>';
}
  
}



?>