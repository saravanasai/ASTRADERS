
<?php 
 
 include("../../config.php");
 
 $agent_id=$_POST["agentid"];
 $agents_to_area_table_id=$_POST["agents_to_area_table_id"];
 
  
 
 
//  $sql="UPDATE `agents_to_area` SET `AREA_TO_AGENT`=:agentid  WHERE  AG_TO_AREA_ID=:area_to_id" ;
 $sql="UPDATE `agents_to_area` SET `AREA_TO_AGENT`=".$agent_id."  WHERE  AG_TO_AREA_ID=".$agents_to_area_table_id."" ;

  var_dump($sql);
 
 try{

 $stmt=$conn->prepare($sql);
//  $stmt->bindParam("agentid",$agent_id);
//  $stmt->bindParam("area_to_id",$agents_to_area_table_id);
 if($stmt->execute())
 {
     echo 1;
 }
            

 }
 catch(PDOException $e)
 {

    echo $e;
 }

 
 
 
 
 





?>