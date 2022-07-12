<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "./config.php";

header('Content-Type: application/json');
$error = array();


if (isset($_POST['transactionID']) && isset($_POST['customerID']) && isset($_POST['loanID'])) {


    $cus_id = $_POST["customerID"];
    $ln_id = $_POST["loanID"];
    $transaction_id = $_POST["transactionID"];

    //query to fetch the current transaction from loan transaction to re-add amount to payable amount
    $sql = "SELECT * FROM `loanTransaction` WHERE TR_ID=:id AND TR_COMMIT_STATUS=1";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("id", $transaction_id);
    $stmt->execute();


    $single_Transaction_Detail_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //single row info the requested transaction id
    $single_tranasction = json_decode(json_encode($single_Transaction_Detail_fetch[0]));

    $amount_paid_on_transaction = $single_tranasction->TR_AMOUNT_PAID; //last amount paid on this transaction

    //section to updating the last amount paid to payable amount in loanmaster table

    if ($amount_paid_on_transaction) {
        //query to update loanmaster table for adding payable amount on transaction deletion
        $sql = "UPDATE `loanMaster` SET `LN_TAB_BALANCE_AMOUNT`= LN_TAB_BALANCE_AMOUNT + :amount WHERE `LOAN_ID`=:ln_id AND `LN_TO_CUSTOMER`=:cus_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam("amount", $amount_paid_on_transaction);
        $stmt->bindParam("cus_id", $cus_id);
        $stmt->bindParam("ln_id", $ln_id);

        if ($stmt->execute()) {

            //if the amount updated to loan master delete the request transaction on loantransaction table
            //query to delete the transaction
            $sql = "DELETE  FROM `loanTransaction` WHERE `TR_ID`=:tr_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("tr_id", $transaction_id);

            if ($stmt->execute()) {
                http_response_code(200);
                $data = ["status" => "200", "message" => "Transaction Deleted"];
                echo json_encode($data);
            }
        }
    }
} else {
    http_response_code(422);
    $error["message"] = "Check the Params name & all fields are Filled";
    echo json_encode($error);
}
