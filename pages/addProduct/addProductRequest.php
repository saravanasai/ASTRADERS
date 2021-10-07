<?php 
 
 include("../../config.php");
 
 $product_name=$_POST["productName"];
 $product_brand=$_POST["productBrand"];
 $product_model=$_POST["productModel"];
 $product_price=$_POST["productPrice"];
 $product_Quantity=$_POST["productQunatity"];
  
 
 
 $sql="INSERT INTO products( PRODUCT_NAME, PRODUCT_BRAND, PRODUCT_MODEL_NO,PRODUCT_PRICE,PRODUCT_QUANTITY) VALUES (:name,:brand,:model,:price,:quantity)" ;


 
 try{

 $stmt=$conn->prepare($sql);
 $stmt->bindParam("brand",$product_brand);
 $stmt->bindParam("name",$product_name);
 $stmt->bindParam("model",$product_model);
 $stmt->bindParam("price",$product_price);
 $stmt->bindParam("quantity",$product_Quantity);
  
 if($stmt->execute())
 {
     echo "inserted";
 }
            

 }
 catch(PDOException $e)
 {

    echo $e;
 }

 
 
 
 
 





?>