<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["productId"])) {

    $product_id = $_POST["productId"];
    $customer_id = $_POST["customer_id"];
    $productQuantity = $_POST["productQuantity"];

    if (!$product_id == "" && !$customer_id == "" && !$productQuantity == "") {
        $sql = "INSERT INTO orderItemMaster(OR_OF_CUS,OR_OF_PR_ID,OR_OF_PR_QUANTITY) VALUES (:cusid,:prid,:prquantity)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam("prid", $product_id);
        $stmt->bindParam("cusid", $customer_id);
        $stmt->bindParam("prquantity", $productQuantity);
        if ($stmt->execute()) {
            $sql = "SELECT * FROM products,orderItemMaster WHERE orderItemMaster.OR_OF_PR_ID=products.PRODUCT_ID AND OR_BILL_STATUS=1 AND OR_OF_CUS=:cusid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("cusid",$customer_id);
            if ($stmt->execute()) {
                $product_add_to_bill_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($product_add_to_bill_details_fetch) > 0) {
                     $total_amount=0;
                     $templete="";
                    foreach ($product_add_to_bill_details_fetch as $key => $product_list_add_to_bill) {
                        $total_amount+=$product_list_add_to_bill["PRODUCT_PRICE"] * $product_list_add_to_bill["OR_OF_PR_QUANTITY"];
                        $templete.='<tr>
                            <td>' . ++$key . '</td>
                            <td>' . $product_list_add_to_bill["PRODUCT_NAME"] . '</td>
                            <td>' . $product_list_add_to_bill["PRODUCT_MODEL_NO"] . '</td>
                            <td>' . $product_list_add_to_bill["OR_OF_PR_QUANTITY"] . '</td>
                            <td>' . $product_list_add_to_bill["PRODUCT_PRICE"]. '</td>
                            <td>' . $product_list_add_to_bill["PRODUCT_PRICE"] * $product_list_add_to_bill["OR_OF_PR_QUANTITY"] . '</td>
                            <td><button class="btn btn-danger btn-sm deleteProductFromBill"  id="'.$product_list_add_to_bill["OR_IT_ID"].'"><i class="fas fa-trash-alt px-1"></i>Delete</button></td>
                        </tr>';
                    }
                    $templete.='<input type="hidden" id="grand_total" value='.$total_amount.' >';
                    echo $templete;
                } else {

                    echo "SOMETHING WENT WRONG";
                }
            }
        }
    } else {
        echo 0;
    }
}
// end section to fetch product by keyword from search