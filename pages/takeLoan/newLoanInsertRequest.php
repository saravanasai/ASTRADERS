<?php

include "../../config.php";

  //section to handle the loan creation
    
    if(isset($_POST["loanSubmit"]))
    {
 
        $customer_id=$_POST["customerId"];
        $product_id=$_POST["productId"];
        $product_quantity=$_POST["productQuantity"];
        $total_loan_amount=$_POST["totalLoanAmount"];
        $loan_initial_amount=$_POST["initizalLoanAmount"];
        $loan_balance_amount=$_POST["balanceAmount"];
        $loan_status=$_POST["loanStatus"];
     
         


        $sql = "INSERT INTO loanMaster( 
            LN_TO_CUSTOMER,
            LN_TO_PRODUCT,
            LN_PRODUCT_QUANTITY,
            LN_TAB_TOTAL_AMOUNT,
            LN_TAB_INITIAL_AMOUNT,
            LN_TAB_BALANCE_AMOUNT,
            LN_STATUS) 
            VALUES (
              :cusid,
              :productid,
              :productquantity,
              :totalamount,
              :initialamount,
              :balanceamount,
              :loanstatus
               )";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("cusid",$customer_id);
        $stmt->bindParam("productid",$product_id);
        $stmt->bindParam("productquantity",$product_quantity);
        $stmt->bindParam("totalamount",$total_loan_amount);
        $stmt->bindParam("initialamount",$loan_initial_amount);
        $stmt->bindParam("balanceamount",$loan_balance_amount);
        $stmt->bindParam("loanstatus",$loan_status);
             

       try{
        $stmt->execute();
          echo 1;
       }
       catch(PDOException $e)
       {
        var_dump($e);
          
       }

       




    }





  //end section to handle loan creation





   

    
?>