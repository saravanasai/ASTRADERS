<?php
include_once "./config.php";
header('Content-Type: application/json');
$error = array();
// force download  
// header("Content-Type: application/download");
// header('Content-Type: application/octet-stream');
// header("Content-Transfer-Encoding: Binary");
// header('Content-Type: text/csv; charset=utf-8');
// header('Content-Disposition: attachment; filename="' . __DIR__ . "/tmp.csv" . '";');
// readfile(__DIR__ . "/tmp.csv");

if (isset($_POST['district'])) {
    $agent_district = $_POST["district"];
    $agent_areas = $_POST["areas"];

    if ($agent_district == "") {
        $error["No_response"] = "ENTER THE DISTRICT";
        echo json_encode($error);
    } else {
        //section checking wheather the districts if presents
        $sql = "SELECT * FROM `collectionListView` WHERE `DISTRICT_ID`=:district";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("district", $agent_district);
        $stmt->execute();
        $result_district = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result_district) > 0) {
            //section for fecthing the collection list 
            $sql = "SELECT * FROM `todayTransactionView` WHERE `DISTRICT_ID`=:district AND `TR_DONE_ON`!='ON STORE' AND `TR_COMMIT_STATUS`=1  AND `AREA_ID`  IN (" . $agent_areas . ")";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("district", $agent_district);
            $stmt->execute();
            $response_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //looping to required headers 
            $csvData = [];
            foreach ($response_data as $key => $line) {

                $csvData[$key]['CUSTOMER_ID'] = $line['CUSTOMER_ID'];
                $csvData[$key]['CUSTOMER_FIRST_NAME'] = $line['CUSTOMER_FIRST_NAME'];
                $csvData[$key]['CUSTOMER_PHONE_NUMBER'] = $line['CUSTOMER_PHONE_NUMBER'];
                $csvData[$key]['DISTRICT_NAME'] = $line['DISTRICT_NAME'];
                $csvData[$key]['AREA_NAME'] = $line['AREA_NAME'];
                $csvData[$key]['TR_AMOUNT_PAID'] = $line['TR_AMOUNT_PAID'];
                $csvData[$key]['TR_DATE'] = $line['TR_DATE'];
            }


            if (count($csvData) > 0) {
                $f = fopen("tmp.csv", "w");

                $headers = ['CUSTOMER_ID', 'CUSTOMER_FIRST_NAME', 'CUSTOMER_PHONE_NUMBER', 'DISTRICT_NAME', 'AREA_NAME', 'TR_AMOUNT_PAID', 'TR_DATE'];

                fputcsv($f, $headers);

                foreach ($csvData as $line) {
                    fputcsv($f, $line);
                }

                fclose($f);
                http_response_code(200);

                echo  json_encode(["url"=>$baseUrl."../api/tmp.csv"]);
                
            } else {
                $error["empty_list"] = "NO BALANCE COLLECTION ON THIS AREA";
                echo json_encode($error);
            }
        } else {
            $error["no_district_available"] = "ENTER THE VALID DISTRICT";
            echo json_encode($error);
        }
    }
} else {
    $error["no_feild_exits"] = "NO FEILD NAME EXISTS";
    echo json_encode($error);
}
