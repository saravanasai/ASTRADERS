<?php 
 
 include("../../config.php");
 
 $area_name=$_POST["areaName"];
 $area_district=$_POST["areaDistrict"];
 
 
 $sql="INSERT INTO areas (AREA_NAME,AREA_DISTRICT) VALUES (:area,:district)";

 $stmt=$conn->prepare($sql);
 $stmt->bindParam("area",$area_name);
 $stmt->bindParam("district",$area_district);
 
 
 if($stmt->execute())
 {
     echo "inserted";
 }





?>