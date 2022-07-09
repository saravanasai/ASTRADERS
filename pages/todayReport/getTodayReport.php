<?php
error_reporting(-1);
ini_set('display_errors', 1);
include("../../config.php");
//section for fetching Reports from databes by district adn area id
if (isset($_POST["area_id"]) && isset($_POST['district_id'])) {
    $district_id = $_POST['district_id'];
    $area_id = $_POST['area_id'];
    $report_date = $_POST['report_date'];



    $sql = "SELECT *
     FROM `collectionListView` WHERE `DISTRICT_ID`=:dis_id AND `AREA_ID` IN ( {$area_id} ) AND `COLLECTION_ON_DATE`=:ondate";

    //  var_dump($sql);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("dis_id", $district_id);
    $stmt->bindParam("ondate", $report_date);
    $stmt->execute();
    $reports_by_district_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_amount = 0;
    $total_balance = 0;
    $report="";

    foreach ($reports_by_district_fetch as $reports) {
        $total_amount = $total_amount + $reports['LN_TAB_TOTAL_AMOUNT'];
        $total_balance = $total_balance + $reports['LN_TAB_BALANCE_AMOUNT'];

        $report.='
            <tr role="row">
            <td>' . $reports["CUSTOMER_ID"] . '</td>
            <td>' . $reports["CUSTOMER_FIRST_NAME"] . '</td>   
            <td>' . $reports["DISTRICT_NAME"] . '</td>   
            <td>' . $reports["AREA_NAME"] . '</td>   
            <td>' . $reports["LN_TAB_TOTAL_AMOUNT"] . '</td>
            <td>' . $reports["LN_TAB_BALANCE_AMOUNT"] . '</td>
            <td>' . $reports["LN_ON_DATE"] . '</td>
            <td>' . $reports["COLLECTION_ON_DATE"] . '</td>
            <td><button class="btn btn-sm btn-success  invoiceDetails"  id="' . $reports["LOAN_ID"] . '"><i class="fas fa-binoculars px-1"></i>Invoice</button></td> 
            </tr>';
    }

    $data = ["report" => $report, "total" => $total_amount, "balance" => $total_balance];
    echo json_encode($data);
} else {
    echo "NOT A VALID DISTRICT OR AREA";
}
