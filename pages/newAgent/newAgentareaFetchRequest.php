<?php 
  
  include("../../config.php");
   
 
    //section for fetching and showing the agent data in model
   if(isset($_POST["districtId"]))
    {
    
        $id=$_POST["districtId"];
        $sql="SELECT * FROM `agents_to_area`,`areas` WHERE AREA_TO_DISTRICT  =:id AND  AREA_TO_AGENT IS NULL AND agents_to_area.AREA_ID_AG=areas.AREA_ID" ;
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        $areas_by_district_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($areas_by_district_fetch)>0)
        {
          foreach($areas_by_district_fetch as $area_by_district)
          {
          
          echo '<option value="'.$area_by_district["AREA_ID"].'">'.$area_by_district["AREA_NAME"].'</option>';
      
          }
        }
       else
       {
        echo 2;
       }
 }