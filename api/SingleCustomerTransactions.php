<?php
include_once "./config.php";

header('Content-Type: application/json');
$error = array();


if (isset($_POST['customerID'])) {
    $cutsomerID = $_POST["customerID"];

    if ($cutsomerID == "") {
        http_response_code(422);
        $error["message"] = "Enter the Customer ID";
        echo json_encode($error);
    } else {
        //section for getting the detials of  customer transaction from transaction table
        $sql = "SELECT * FROM `customerTransactionView` WHERE `TR_OF_CUSTOMER`=:customerId AND TR_COMMIT_STATUS=0";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam("customerId", $cutsomerID);
        $stmt->execute();
        $single_customer_transaction_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (count($single_customer_transaction_details_fetch) > 0) {

            $resposeResource=[];

            for ($i = 0; $i < count($single_customer_transaction_details_fetch); $i++) {

                $resposeResource[$i]['CUSTOMER_ID'] = $single_customer_transaction_details_fetch[$i]['CUSTOMER_ID'];
                $resposeResource[$i]['CUSTOMER_FIRST_NAME'] = $single_customer_transaction_details_fetch[$i]['CUSTOMER_FIRST_NAME'];
                $resposeResource[$i]['CUSTOMER_LAST_NAME'] = $single_customer_transaction_details_fetch[$i]['CUSTOMER_LAST_NAME'];
                $resposeResource[$i]['CUSTOMER_PHONE_NUMBER'] = $single_customer_transaction_details_fetch[$i]['CUSTOMER_PHONE_NUMBER'];
                $resposeResource[$i]['LOAN_ID'] = $single_customer_transaction_details_fetch[$i]['LOAN_ID'];
                $resposeResource[$i]['TR_AMOUNT_PAID'] = $single_customer_transaction_details_fetch[$i]['TR_AMOUNT_PAID'];
                $resposeResource[$i]['TR_AMOUNT_BALANCE'] = $single_customer_transaction_details_fetch[$i]['TR_AMOUNT_BALANCE'];
                $resposeResource[$i]['TR_DATE'] = $single_customer_transaction_details_fetch[$i]['TR_DATE'];
            }

            http_response_code(200);
            $response = array("data" => $resposeResource);
            echo json_encode($response, JSON_INVALID_UTF8_IGNORE);
        } else {

            http_response_code(200);
            $response = array("data" => $single_customer_transaction_details_fetch);
            echo json_encode($response, JSON_INVALID_UTF8_IGNORE);
        }

        // end section for getting the detials of  customer transaction from transaction table
    }
} else {
    http_response_code(422);
    $error["message"] = "Check the Params name";
    echo json_encode($error);
}
