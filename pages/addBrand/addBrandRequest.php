<?php 
 
 include("../../config.php");
 
 $brand_name=$_POST["brandName"];
 
 
 $sql="INSERT INTO brand(BRAND_NAME) VALUES (:brand)" ;

 $stmt=$conn->prepare($sql);
 $stmt->bindParam("brand",$brand_name);
 
 
 
 if($stmt->execute())
 {
     echo "inserted";
 }





?>