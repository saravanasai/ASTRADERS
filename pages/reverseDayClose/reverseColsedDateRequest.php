<?php 
  include("../../config.php");
   if(isset($_POST["reverseDate"]))
    { 
        

        $reversalDate = $_POST["reverseDate"];
        
        $sql="UPDATE `todayTransactionView` SET `TR_COMMIT_STATUS`='1' WHERE `TR_DATE`=:day" ;
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("day",$reversalDate);
       
        if( $stmt->execute())
        {
            echo 1;
        }
    
        
       
    }
    else
    {
        echo 0;
    }
