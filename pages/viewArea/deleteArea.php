<?php 

include("../../config.php");


//section for performing deletion of agent
if(isset($_POST["deleteid"]))
{
  
     $delete_id=$_POST["deleteid"];

     $sql="DELETE FROM areas WHERE AREA_ID = :id" ;

     $stmt=$conn->prepare($sql);
     $stmt->bindParam("id",$delete_id);
     
     if($stmt->execute())
     {
         echo "DELETED";
     } 
     
 
  

}






?>