<?php

include "../../config.php";

//section to fetch product by keyword from search
if (isset($_POST["keyword"])) {

    $key_word = $_POST["keyword"];

    if(!$key_word=="")
    {
        $sql = "SELECT *
        FROM products
        WHERE PRODUCT_NAME LIKE '" . $key_word . "%'";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->execute();
        $product_search_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
                   
    
         if(count($product_search_details_fetch)>0)
         {
            foreach ($product_search_details_fetch as $key=> $product_list) {
    
                echo '  <tr>
                        <td>'.++$key.'</td>
                        <td>'.$product_list["PRODUCT_NAME"].'</td>
                        <td>'.$product_list["PRODUCT_MODEL_NO"].'</td>
                        <td><input type="text" class="form-control form-control-border " id="productQuantity'.$product_list["PRODUCT_ID"].'" placeholder="Quantity" required></td>
                        <td>'.$product_list["PRODUCT_PRICE"].'</td>
                        <td><button class="btn btn-success btn-sm addProductToBill"  id="'.$product_list["PRODUCT_ID"].'"><i class="fas fa-cart-plus px-1"></i>ADD</button></td>
                        <input type="hidden" id="loanToProductId" value="'.$product_list["PRODUCT_ID"].'">
                        </tr>';
        
            }
    
         }
         else
         {
             
             echo'<tr class="text-danger">
             <td>SORRY!</td>
             <td>NO</td>
             <td>PRODUCT</td>
             <td>FOUND ON</td>
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
