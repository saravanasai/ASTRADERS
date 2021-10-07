<?php

include("../../config.php");
   
  
     //section to update the the new password
if (isset($_POST["newpassword"])) {
    
    $newPassword = md5($_POST["newpassword"]);



    $sql = "UPDATE `login` SET`USER_PASSWORD`=:newpassword";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("newpassword",$newPassword);
  
   


    if ( $stmt->execute()) {
        echo "1";
    } else {
        echo "0";
    }
    //end section to update the the new password
}

?>