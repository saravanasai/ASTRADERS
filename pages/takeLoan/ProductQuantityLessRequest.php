<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["productId"])) {

    $product_id = $_POST["productId"];
    $productQuantity = $_POST["productQuantity"];

    if (!$product_id == "" && !$productQuantity == "") {
        $sql = "SELECT * FROM `products` WHERE `PRODUCT_ID`=:prid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("prid", $product_id);
        if ($stmt->execute()) {

            $oldProductFetch=$stmt->fetch(PDO::FETCH_BOTH);
            $oldQuantity=$oldProductFetch['PRODUCT_QUANTITY'];
            $newQuantity=$oldQuantity-$productQuantity;
            $sql = "UPDATE `products` SET `PRODUCT_QUANTITY`=".$newQuantity." WHERE `PRODUCT_ID`=".$product_id."";
            $stmt = $conn->prepare($sql);
            $stmt->execute();  
        }
    } 
}
// end section to fetch product by keyword from search