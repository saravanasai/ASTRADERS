<?php

include "../../config.php";







//section to handel the customer status
if (isset($_POST["deleteIds"])) {
   
     $deleteIds=$_POST["deleteIds"];
     
     //getting the multiple  ids that need to be deleted and looped through the for loop
       $loopsRunned=0;
      for ($i=0; $i < count($deleteIds); $i++) {   
         
        //   echo $deleteIds[$i];
         
        $sql="DELETE FROM  customermaster WHERE `CUSTOMER_ID`=". $deleteIds[$i]."";
        $stmt = $conn->prepare($sql);
       
         if($stmt->execute())
         {
            $loopsRunned++;
         }
       
      }
         if(count($deleteIds)==$loopsRunned)
         {
             echo 1;
         }
      //end getting the multiple  ids that need to be deleted and looped through the for loop
   
}
// end section to handel the customer status;