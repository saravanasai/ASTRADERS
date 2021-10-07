<?php

include("../../config.php");
   
  //section to check if old password is correct
if (isset($_POST["oldPasword"])) {
    $old_password = md5($_POST["oldPasword"]);



    $sql = "SELECT * FROM `login` WHERE `USER_PASSWORD`=:oldPassword";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("oldPassword", $old_password);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (count($result) > 0) {
        echo "1";
    } else {
        echo "0";
    }
    //end section to check if old password is correct
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

}