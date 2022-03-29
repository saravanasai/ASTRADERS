<?php

include("../../config.php");

//sectionn to fetch brand for table updating
$sql_brand_list = "SELECT * FROM brand WHERE 1";

$stmt_brand = $conn->prepare($sql_brand_list);


$stmt_brand->execute();
$brand_list_fetch = $stmt_brand->fetchAll(PDO::FETCH_ASSOC);

$brand_list_append = "";

foreach ($brand_list_fetch as $brand_list) {
  $brand_list_append .= '
      <option value="' . $brand_list["BRAND_ID"] . '">' . $brand_list["BRAND_NAME"] . '</option>';
}

//section for end of brand table fetch




$brand_list = "";
//section for fetching and showing the agent data in model
if (isset($_POST["id"])) {

  $id = $_POST["id"];

  $sql = " SELECT * FROM brand, products WHERE products.PRODUCT_ID=:id AND brand.BRAND_ID=products.PRODUCT_BRAND";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam("id", $id);

  $stmt->execute();

  $singleProductDeatail = $stmt->fetchAll(PDO::FETCH_ASSOC);







  foreach ($singleProductDeatail as $singleProduct) {


    echo '<div >
    
     <form id="" method="post">
     <div class="card-body">
       <div class="form-group">
         <label for="ProductNameUpdate">PRODUCT NAME</label>
         <input type="text" class="form-control" id="ProductNameUpdate" name="productNameUpdate" placeholder="Product Name" value="' . $singleProduct["PRODUCT_NAME"] . '">
       </div>
       <div class="form-group" >
       <label>PRODUCT BRAND*</label>
       <select class="form-control " id="productBrandUpdate" name="productBrandUpdate" style="width: 100%;"  tabindex="-1" aria-hidden="true">
       <option selected="selected" value=' . $singleProduct["PRODUCT_BRAND"] . '>' . $singleProduct["BRAND_NAME"] . '</option>
         "' . $brand_list_append . '"
       </select>
       <div class="form-group">
         <label for="productmodelUpdate">PRODUCT MODEL</label>
         <input type="text" class="form-control" id="productmodelUpdate" name="productmodelUpdate" placeholder="PRODUCT MODEL" value="' . $singleProduct["PRODUCT_MODEL_NO"] . '">
       </div>
      </div>
      <div class="form-group">
      <label for="productPriceUpdate">PRODUCT PRICE</label>
      <input type="text" class="form-control" id="productPriceUpdate" name="productPriceUpdate" placeholder="PRODUCT PRICE" value="' . $singleProduct["PRODUCT_PRICE"] . '">
    </div>
    <div class="form-group">
      <label for="productQuantityUpdate">PRODUCT QUANTITY</label>
      <input type="text" class="form-control" id="productQuantityUpdate" name="productQuantityUpdate" placeholder="PRODUCT QUANTITY" value="' . $singleProduct["PRODUCT_QUANTITY"] . '">
    </div>
   </div>
     <!-- /.card-body -->
 
     <div class="card-footer">
       <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <button type="submit" class="btn btn-warning float-right" name="updateForm">UPDATE</button></div>
        <div class="col-md-4">
        <button type="button" id="updateProductStock" data-id=' . $singleProduct["PRODUCT_ID"] . ' class="btn btn-success float-right" >UPDATE STOCK</button>
        </div>
       </div>
       <input type="hidden"  name="ProductUpdateId" value="' . $singleProduct["PRODUCT_ID"] . '">
     </div>
   </form>      
 
         </div>';
  }
}

?>
<!-- <button type="button" class="btn btn-success float-right" x-on:click=" axios.post("pages/viewProducts/updateStock.php",{productId:'.$singleProduct["PRODUCT_ID"].'})">UPDATE STOCK</button> -->