<?php
include_once "./config.php";

header('Content-Type: application/json');

$error = array();


if (isset($_POST['district']) && isset($_POST['areas'])) {

    $agent_district = $_POST["district"];
    $agent_areas = $_POST["areas"];

    if ($agent_district == "" || $agent_areas == "") {
        $error["No_response"] = "ENTER THE DISTRICT AND AREAS";
        echo json_encode($error);
    } else {
        //section checking wheather the districts if presents
        $sql = "SELECT * FROM `districts` WHERE `DISTRICT_ID`=:district";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("district", $agent_district);
        $stmt->execute();
        $result_district = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result_district) > 0) {
            //section for fecthing the collection list 
            //  $sql="SELECT * FROM `collectionListView` WHERE `LN_TAB_BALANCE_AMOUNT`>0  AND `DISTRICT_ID`=:district AND  `COLLECTION_ON_DATE`=CURRENT_DATE  AND  `AREA_ID`  IN (".$agent_areas.")";
            $sql = "SELECT * FROM `collectionListView` WHERE `LN_TAB_BALANCE_AMOUNT`>0 AND `LN_TAB_TOTAL_AMOUNT`>0 AND `LN_STATUS`=1  AND `DISTRICT_ID`=:district  AND  `AREA_ID`  IN (" . $agent_areas . ")";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam("district", $agent_district);
            $stmt->execute();
            $response_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($response_data) > 0) {
                for ($i = 0; $i < count($response_data); $i++) {
                    $response_data[$i]['CUSTOMER_IMAGE'] = $baseUrl . $response_data[$i]['CUSTOMER_IMAGE'];
                }
                $response = array("collectionlist" => $response_data);
                echo json_encode($response, JSON_INVALID_UTF8_IGNORE);
                die();
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
    $error["no_feild_exits"] = "CHECK THE FEILDS VALUE";
    echo json_encode($error);
}
