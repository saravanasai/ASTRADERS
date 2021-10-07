<?php 
 
 include("../../config.php");
 
 $customer_first_name=$_POST["customerFirstName"];
 $customer_last_name=$_POST["customerLastName"];
 $customer_phone_number=$_POST["customerphoneNumber"];
 $customer_mail=$_POST["customerMail"];
 $customer_adhar_no=$_POST["customerAdharNo"];
 $customer_district=$_POST["customerDistrict"];
 $customer_area=$_POST["customerArea"];
 $customer_address=$_POST["customerAddress"];
 
  

    
 
 
 $sql="INSERT INTO customermaster(CUSTOMER_FIRST_NAME,CUSTOMER_LAST_NAME,CUSTOMER_PHONE_NUMBER,CUSTOMER_EMAIL,CUSTOMER_ADHAR_NO,CUSTOMER_DISTRICT,CUSTOMER_CITY,CUSTOMER_ADDRESS) 
 VALUES (:customerFirstName,:customerLasttName,:customerPhoneNumber,:customerMail,:customerAdharno,:customerDistrict,:customerArea,:customerAddress)" ;


 $stmt=$conn->prepare($sql);
 $stmt->bindParam("customerFirstName",$customer_first_name);
 $stmt->bindParam("customerLasttName",$customer_last_name);
 $stmt->bindParam("customerPhoneNumber",$customer_phone_number);
 $stmt->bindParam("customerMail",$customer_mail);
 $stmt->bindParam("customerAdharno",$customer_adhar_no);
 $stmt->bindParam("customerDistrict",$customer_district);
 $stmt->bindParam("customerArea",$customer_area);
 $stmt->bindParam("customerAddress",$customer_address);
 
 
   try{

    if($stmt->execute())
    {
        echo "1";
    }
  
       
   }catch(PDOException $e)
   {

     echo $e;

   }
 
 





?>