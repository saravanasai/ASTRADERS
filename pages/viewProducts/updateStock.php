<?php 

include("../../config.php");


//section for performing deletion of agent
if(isset($_POST["productId"]))
{
  
    
     $productId=$_POST["productId"];
     $newStock=$_POST["newStock"];
   
     $sql="UPDATE products SET PRODUCT_QUANTITY=PRODUCT_QUANTITY + :quantity WHERE PRODUCT_ID = :id" ;
     $stmt=$conn->prepare($sql);
    
     $stmt->bindParam("id",$productId);
     $stmt->bindParam("quantity",$newStock);
      
     
     if($stmt->execute())
     {
       
        http_response_code(200);
        return json_encode(["status"=>"200","data"=>"Stock Updated successfully"]);
     } 
     
 
  

}






?>