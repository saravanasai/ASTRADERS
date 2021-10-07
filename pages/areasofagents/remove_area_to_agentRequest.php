
<?php 
 
 include("../../config.php");
 

 $agents_to_area_table_id=$_POST["agents_to_area_table_id"];
  
 
 
 $sql="UPDATE `agents_to_area` SET `AREA_TO_AGENT`=NUll WHERE AG_TO_AREA_ID=:area_to_id";
 $stmt=$conn->prepare($sql);
 $stmt->bindParam("area_to_id",$agents_to_area_table_id);
 if($stmt->execute())
 {
     echo 1;
 }
            

 
 
 
 
 





?>