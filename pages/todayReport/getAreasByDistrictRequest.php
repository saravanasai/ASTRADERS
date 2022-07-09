<?php 
  include("../../config.php");
    //section for fetching and showing the agent data in model
   if(isset($_POST["districtId"]))
    { 
     $id=$_POST["districtId"];
     $sql="SELECT * FROM areas WHERE AREA_DISTRICT =:id;" ;
     $stmt=$conn->prepare($sql);
     $stmt->bindParam("id",$id);
     $stmt->execute();
     $areas_by_district_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);    
    foreach($areas_by_district_fetch as $area_by_district)
    {     
     echo '<option value="'.$area_by_district["AREA_ID"].'">'.$area_by_district["AREA_NAME"].'</option>';
    }
 }
 ?>