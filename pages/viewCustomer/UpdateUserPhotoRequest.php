<?php

include("../../config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$path = '../../uploads/'; // 

$customerPhoto = $_FILES["customerPhoto"]['name'];
$customerID = $_POST['customerID'];
$tmp = $_FILES['customerPhoto']['tmp_name'];
$final_image = rand(1000, 1000000) . $customerPhoto;
$path = $path . strtolower($final_image);




if (move_uploaded_file($tmp, $path)) {


    $sql = "UPDATE `customermaster` SET `CUSTOMER_IMAGE` = :image WHERE `customermaster`.`CUSTOMER_ID` = :id ";




    $stmt = $conn->prepare($sql);
    $stmt->bindParam("image", $final_image);
    $stmt->bindParam("id", $customerID);


    try {

        if ($stmt->execute()) {
            echo "1";
        }
    } catch (PDOException $e) {

        echo $e;
    }
}
