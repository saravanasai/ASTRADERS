<?php 

include("../../config.php");


//section for performing deletion of agent
if(isset($_POST["commit"]))
{
   
   

     $sql="UPDATE `loanTransaction` SET `TR_COMMIT_STATUS`=0 WHERE 1" ;

     $stmt=$conn->prepare($sql);
    
     
     if($stmt->execute())
     {
         echo "day closed";
     } 
     
 
  

}






?>