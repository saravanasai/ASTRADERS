<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["delete_Product_id"])) {

    $delete_Product_id = $_POST["delete_Product_id"];
    $customer_id = $_POST["customer_id"];
    if ($delete_Product_id != "" && $customer_id != "") {

        $sql = "DELETE FROM orderItemMaster WHERE OR_IT_ID=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('id', $delete_Product_id);
        try {
            if ($stmt->execute()) {

                $sql_To_Product_count = "SELECT * FROM `orderItemMaster` WHERE `OR_BILL_STATUS`=1 AND `OR_OF_CUS`=:id";
                $stmt = $conn->prepare($sql_To_Product_count);
                $stmt->bindParam('id', $customer_id);
                if ($stmt->execute()) {
                    $balance_count_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (count($balance_count_fetch) > 0) {
                        $sql = "SELECT * FROM orderItemMaster INNER JOIN products ON products.PRODUCT_ID=orderItemMaster.OR_OF_PR_ID WHERE orderItemMaster.OR_BILL_STATUS=1 AND orderItemMaster.OR_OF_CUS=:cusid";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam("cusid", $customer_id);
                        $stmt->execute();
                        $product_add_to_bill_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        var_dump(count($product_add_to_bill_details_fetch) > 0);
                        if (count($product_add_to_bill_details_fetch) > 0) {
                            $total_amount = 0;
                            $templete="";
                            foreach ($product_add_to_bill_details_fetch as $key => $product_list_add_to_bill) {
                                $total_amount += $product_list_add_to_bill["PRODUCT_PRICE"] * $product_list_add_to_bill["OR_OF_PR_QUANTITY"];
                                $templete.='<tr>
                                        <td>' . ++$key . '</td>
                                        <td>' . $product_list_add_to_bill["PRODUCT_NAME"] . '</td>
                                        <td>' . $product_list_add_to_bill["PRODUCT_MODEL_NO"] . '</td>
                                        <td>' . $product_list_add_to_bill["OR_OF_PR_QUANTITY"] . '</td>
                                        <td>' . $product_list_add_to_bill["PRODUCT_PRICE"] . '</td>
                                        <td>' . $product_list_add_to_bill["PRODUCT_PRICE"] * $product_list_add_to_bill["OR_OF_PR_QUANTITY"] . '</td>
                                        <td><button class="btn btn-danger btn-sm deleteProductFromBill"  id="' . $product_list_add_to_bill["OR_IT_ID"] . '"><i class="fas fa-trash-alt px-1"></i>Delete</button></td>
                                    </tr>';
                            }
                            $templete.='<input type="hidden" id="grand_total" value='.$total_amount.' >';
                            echo $templete;
                        } else {
                            echo '<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <input type="hidden" id="grand_total" value='.$total_amount.' >
                        </tr>';
                        }
                    } else {
                        echo '<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <input type="hidden" id="grand_total" value='.$total_amount.' >
                        </tr>';
                    }
                }
            }
        } catch (PDOException $e) {
            echo $e;
        }
    } else {
        echo 0;
    }
}
// end section to fetch product by keyword from search