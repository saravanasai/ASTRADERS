<?php

include "../../config.php";







//section to handel the customer status
if (isset($_POST["customerId"])) {
   
     $customer_id=$_POST["customerId"];

     $sql="SELECT * FROM `customermaster` WHERE `CUSTOMER_ID`=:id";

     $stmt = $conn->prepare($sql);

    $stmt->bindParam("id", $customer_id);
    
       if($stmt->execute())
       {
           $customer_update_status=1;
           $customer_details_list_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
           $customer_current_Status=$customer_details_list_fetch[0]["CUSTOMER_STATUS"];
            
           if($customer_current_Status==$customer_update_status)
           {
               $customer_update_status=0;
           }
           
           $sql="UPDATE `customermaster` SET `CUSTOMER_STATUS` = :status WHERE `customermaster`.`CUSTOMER_ID` = :customerId; ";

           $stmt = $conn->prepare($sql);
      
          $stmt->bindParam("customerId", $customer_id);
          $stmt->bindParam("status", $customer_update_status);
             
                    if($stmt->execute())
                    {
                        echo 1;
                    }else
                    {
                        echo 0;
                    }
            

       }
   
}
// end section to handel the customer status;

