<?php

include "../../config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_POST['orderId']) {

    $orderItemId = $_POST['orderId'];

    $sql = "SELECT * FROM `orderItemMaster`,`products` WHERE `OR_IT_ID`=:id 
    AND `PRODUCT_ID` = `OR_OF_PR_ID`";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam("id", $orderItemId);

    if ($stmt->execute()) {

        $orderItemInfo = $stmt->fetch();

        $loanId = $orderItemInfo['OR_TO_LN_ID'];
        $productID = $orderItemInfo['OR_OF_PR_ID'];
        $qunatity = $orderItemInfo['OR_OF_PR_QUANTITY'];

        $amountNeedToReturn = $orderItemInfo['PRODUCT_PRICE'] * $qunatity;

        $sql = "SELECT * FROM `loanMaster` WHERE `LOAN_ID` =:loanid";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam("loanid", $loanId);

        if ($stmt->execute()) {

            $LoanInfo = $stmt->fetch();
            $loanStatus = 1;
            $newTotalAmount = $LoanInfo['LN_TAB_TOTAL_AMOUNT'] - $amountNeedToReturn;
            if ($newTotalAmount == 0) {
                $loanStatus = 0;
            }



            if ($LoanInfo['LN_TAB_BALANCE_AMOUNT'] > $newTotalAmount) {

                $sql = "UPDATE `loanMaster` SET `LN_TAB_TOTAL_AMOUNT`=:balance , `LN_TAB_BALANCE_AMOUNT`=:newtotal,`LN_STATUS`= :status WHERE `LOAN_ID`=:id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam("newtotal", $newTotalAmount);
                $stmt->bindParam("balance", $newTotalAmount);
                $stmt->bindParam("status", $loanStatus);
                $stmt->bindParam("id", $loanId);
            } else {
                $sql = "UPDATE `loanMaster` SET `LN_TAB_TOTAL_AMOUNT`=:balance ,`LN_STATUS`= :status WHERE `LOAN_ID`=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam("balance", $newTotalAmount);
                $stmt->bindParam("status", $loanStatus);
                $stmt->bindParam("id", $loanId);
            }






            if ($stmt->execute()) {


                $sql = "UPDATE `products` SET `PRODUCT_QUANTITY`= `PRODUCT_QUANTITY` + :quantity  WHERE `PRODUCT_ID`=:prid";

                $stmt = $conn->prepare($sql);

                $stmt->bindParam("quantity", $qunatity);
                $stmt->bindParam("prid", $productID);

                if ($stmt->execute()) {


                    $sql = "UPDATE `orderItemMaster` SET `OR_BILL_STATUS`=:status  WHERE `OR_IT_ID`=:orderid";

                    $stmt = $conn->prepare($sql);
                    $status = 2;
                    $stmt->bindParam("orderid", $orderItemId);
                    $stmt->bindParam("status", $status);

                    if ($stmt->execute()) {
                        try {
                            echo json_encode(["data" => 1]);
                        } catch (PDOException $e) {
                            echo $e;
                        }
                    }
                }
            }
        }
    }
}
