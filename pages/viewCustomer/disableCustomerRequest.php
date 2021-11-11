<?php

include "../../config.php";







//section to handel the customer status
if (isset($_POST["customerId"])) {
   
     $customer_id=$_POST["customerId"];

     $sql="DELETE FROM `customermaster` WHERE `CUSTOMER_ID`=:id";

     $stmt = $conn->prepare($sql);

    $stmt->bindParam("id", $customer_id);
    
       if($stmt->execute())
       {
          
             
                    
                        echo 1;
                   
        
                    
            

       }
   
}
// end section to handel the customer status;

