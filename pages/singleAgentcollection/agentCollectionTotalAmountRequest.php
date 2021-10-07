<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["agentid"])) {

    $agent_id = $_POST["agentid"];

  
        $sql = "SELECT SUM(`TR_AMOUNT_PAID`)as totalamount FROM `todayTransactionView` WHERE `TR_COMMIT_STATUS`=1 AND `TR_DONE_ON`=:agentid";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('agentid',$agent_id);
        $stmt->execute();
        $total_amount = $stmt->fetch(PDO::FETCH_ASSOC);
          
      echo $total_amount["totalamount"];
     

   

    

}
// end section to fetch product by keyword from search
