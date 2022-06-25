<?php

include "../../config.php";

//section to handel the customer remark
if (isset($_POST["id"])) {
   
     $customer_id=$_POST["id"];
     $remarks=$_POST["remarks"];
     $sql="UPDATE `customermaster` SET `CUSTOMER_REMARK`=:remark  WHERE `CUSTOMER_ID`=:id";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam("id", $customer_id);
     $stmt->bindParam("remark", $remarks);
    
       if($stmt->execute())
       {
         echo 1;
       }
   
}
// end section to handel the customer status;