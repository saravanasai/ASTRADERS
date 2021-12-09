<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["delete_Product_id"])) {

    $delete_Product_id = $_POST["delete_Product_id"];
    $customer_id = $_POST["customer_id"];
    if ($delete_Product_id != "" && $customer_id != "") {

        $sql = "SELECT * FROM orderItemMaster WHERE OR_IT_ID=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('id', $delete_Product_id);

        if($stmt->execute())
        {
            $deleteDetails=$stmt->fetch(PDO::FETCH_BOTH);
            $Quantity=$deleteDetails['OR_OF_PR_QUANTITY'];
            $product_id=$deleteDetails['OR_OF_PR_ID'];
            $sql = "UPDATE `products` SET `PRODUCT_QUANTITY`=PRODUCT_QUANTITY+".$Quantity." WHERE `PRODUCT_ID`=". $product_id."";
             var_dump($sql);
            $stmt = $conn->prepare($sql);
            $stmt->execute();  
        }   
       
    } else {
        echo 0;
    }
}
// end section to fetch product by keyword from search