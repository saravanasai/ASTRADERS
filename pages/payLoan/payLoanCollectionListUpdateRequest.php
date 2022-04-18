<?php

include "../../config.php";

//fuvtion to update collection list

function updateCollectionList()
{
    include "../../config.php";


    $customer_id = $_POST["customerId"];
    $amountPaid = $_POST["amountPaid"];
    $blanaceAmount = $_POST["balanceamount"];
    $loanId = $_POST["loanId"];
    $loan_status=$_POST["loanstatus"];
    $due_paid_to=$_POST["due_paid_to"];
    $amount_Paid_On_Date=$_POST["amountPaidOnDate"];
     

     

    if($due_paid_to=="0")
    {
        $due_paid_to="ON STORE";
    }
          
    $amount_Paid_On_Date=$amount_Paid_On_Date!=''
                         ?$amount_Paid_On_Date
                         :(new DateTime())->format('Y-m-d');
                           
        
    

    $sql = "UPDATE `collectionList` SET `COLLECTION_LAST_AMOUNT_PAID`=:amountPaid,`COLLECTION_BALANCE_AMOUNT`=:balance,`COLLECTION_ON_DATE`= DATE_ADD(`COLLECTION_ON_DATE`, INTERVAL 7 DAY),`COLLECTED_ON_DATE`=:onDate,`COLLECTION_STATUS`=:clStatus,`PAID_ON`=:paidTO WHERE COLLECTION_TO_CUSTOMER =:customerid AND  COLLECTION_LN_ID =:loanId";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("customerid",$customer_id);
    $stmt->bindParam("amountPaid",$amountPaid);
    $stmt->bindParam("balance",$blanaceAmount);
    $stmt->bindParam("onDate",$amount_Paid_On_Date);
    $stmt->bindParam("loanId",$loanId);
    $stmt->bindParam("clStatus",$loan_status);
    $stmt->bindParam("paidTO",$due_paid_to);

    try {
       
        $stmt->execute();
        $product_add_to_bill_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo 1;
    } catch (PDOException $e) {
        echo $e;
    }

}







//section to update the collection list after a paymment
if (isset($_POST["customerId"])) {

       updateCollectionList();
   
}
//section to update the collection list after a paymment;

