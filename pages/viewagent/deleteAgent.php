<?php 

include("../../config.php");


//section for performing deletion of agent
if(isset($_POST["deleteid"]))
{
  
     $delete_id=$_POST["deleteid"];

     $sql="DELETE FROM agents WHERE AGENT_ID = :id" ;

     $stmt=$conn->prepare($sql);
     $stmt->bindParam("id",$delete_id);
     
     if($stmt->execute())
     {
      //   $sql_to_null_areas="UPDATE `agents_to_area` SET `AREA_TO_AGENT`=NULL WHERE  `AREA_TO_AGENT`=:id" ;

      //   $stmt_remove=$conn->prepare($sql_to_null_areas);
      //   $stmt_remove->bindParam("id",$delete_id);
      //   $stmt_remove->execute();
        echo "DELETED";
     } 
     
 
  

}






?>