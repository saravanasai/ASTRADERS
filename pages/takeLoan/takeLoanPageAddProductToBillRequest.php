<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["productId"])) {

    $product_id = $_POST["productId"];

    if(!$product_id=="")
    {
        $sql = "SELECT *
        FROM products
        WHERE PRODUCT_ID=:id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id",$product_id);
    
        $stmt->execute();
        $product_add_to_bill_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
                   
    
         if(count($product_add_to_bill_details_fetch)>0)
         {
            foreach ($product_add_to_bill_details_fetch as $key=> $product_list_add_to_bill) {
    
                echo '  <tr>
                        <td>'.++$key.'</td>
                        <td>'.$product_list_add_to_bill["PRODUCT_NAME"].'</td>
                        <td>'.$product_list_add_to_bill["PRODUCT_MODEL_NO"].'</td>
                        <td><input type="text" class="form-control form-control-border " id="productQuantity" placeholder="Quantity" required></td>
                        <td>'.$product_list_add_to_bill["PRODUCT_PRICE"].'</td>
                        <td><input type="text" class="form-control form-control-border " id="productDiscount" placeholder="Discount" value="0"></td>
                        <td><input type="text" class="form-control form-control-border" id="productTotalAmount" placeholder="Total Amount" value="0" disabled></td>
                        <input type="hidden" id="ProductIdOnBill" value="'.$product_list_add_to_bill["PRODUCT_ID"].'">
                        <input type="hidden" id="ProductPriceOnBill" value="'.$product_list_add_to_bill["PRODUCT_PRICE"].'">
                        <input type="hidden" id="ProductPrice" value="'.$product_list_add_to_bill["PRODUCT_PRICE"].'">
                        </tr>';
        
            }
    
         }
         else
         {
             
             echo'<tr class="text-danger">
             <td>SORRY!</td>
             <td>SOMETHING</td>
             <td>WENT</td>
             <td>WRONG ON </td>
             <td>DATABASE</td>
             </tr>';
         }

    }
    else
    {
        echo 0;
    }


   

    

}
// end section to fetch product by keyword from search
