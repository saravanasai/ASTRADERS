<?php 

include("../../config.php");


//section for performing disable of agent
if(isset($_POST["disableid"]))
{
  
     $delete_id=$_POST["disableid"];
        
     if(isset($delete_id))
     {
        $sql="SELECT * FROM `agents`  WHERE AGENT_ID=:id" ;

            
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("id",$delete_id);
        if($stmt->execute())
        {
            $agent_details=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $current_status=$agent_details[0]["AGENT_STATUS"];
            $update_status="";
            if($current_status=="ACTIVE")
            {
                $update_status="DISABLE";
                $sql="UPDATE agents SET AGENT_STATUS=:statuses WHERE AGENT_ID=:id" ;
                $stmt=$conn->prepare($sql);
                $stmt->bindParam("id",$delete_id);
                $stmt->bindParam("statuses",$update_status);
                $stmt->execute();
            }
            else
            {
                $update_status="ACTIVE";
                $sql="UPDATE agents SET AGENT_STATUS=:statuses WHERE AGENT_ID=:id" ;
                $stmt=$conn->prepare($sql);
                $stmt->bindParam("id",$delete_id);
                $stmt->bindParam("statuses",$update_status);
                $stmt->execute();
            }
              

               



        }
        
     }



     
 
  

}






?>