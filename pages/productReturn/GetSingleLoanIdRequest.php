<?php

include "../../config.php";

if ($_POST['loanID']) {

    $loadID = $_POST['loanID'];

    $sql = "SELECT * FROM `orderItemMaster`,`products` WHERE `OR_TO_LN_ID`=:loanid 
    AND `PRODUCT_ID` = `OR_OF_PR_ID` AND `OR_BILL_STATUS`=0";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam("loanid", $loadID);

    if ($stmt->execute()) {

        $loanProductInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM `loanMaster` WHERE `LOAN_ID`=:id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam("id", $loanProductInfo[0]['OR_TO_LN_ID']);


        try {

            $stmt->execute();

            $loanInfo = $stmt->fetch(PDO::FETCH_ASSOC);


            echo json_encode(["data" => $loanProductInfo,"loanInfo"=>$loanInfo]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
