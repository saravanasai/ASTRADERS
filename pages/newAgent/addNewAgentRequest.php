<?php 
 
 include("../../config.php");
 
 //section for inserting the data to agents table
 $agent_name=$_POST["agentName"];
 $agent_phone_number=$_POST["agentPhoneNumber"];
 $agent_status="ACTIVE";
 $agent_adhar_number=$_POST["agentAdharNumber"];
 $agent_address=$_POST["agentAddress"];
 $agent_city=$_POST["agentCity"];
 
 $sql="INSERT INTO agents( AGENT_NAME,AGENT_ADDRESS,AGENT_ADHAR_NO,AGENT_PHONE_NUMBER,AGENT_FOR_CITY,AGENT_STATUS) 
     VALUES (:name,:address,:adharNumber,:phoneNumber,:city,:status)" ;

 $stmt=$conn->prepare($sql);
 $stmt->bindParam("name",$agent_name);
 $stmt->bindParam("phoneNumber",$agent_phone_number);
 $stmt->bindParam("status",$agent_status);
 $stmt->bindParam("adharNumber",$agent_adhar_number);
 $stmt->bindParam("address",$agent_address);
 $stmt->bindParam("city",$agent_city);
 
        if($stmt->execute())
        {
            $agent_areas=$_POST["agentArea"];
            //after insertion inserting the value  into the areas for agents table 
            $sql="SELECT * FROM `agents` WHERE `AGENT_PHONE_NUMBER`=:ph_number" ;

                $stmt=$conn->prepare($sql);
                $stmt->bindParam("ph_number",$agent_phone_number);
                $stmt->execute();
                $agent_detail=$stmt->fetch(PDO::FETCH_ASSOC);
                $agent_id=$agent_detail['AGENT_ID'];  

                for($i=0;$i<count($agent_areas);$i++)
                {
                    $sql="UPDATE `agents_to_area` SET `AREA_TO_AGENT`=$agent_id WHERE `AREA_ID_AG`=$agent_areas[$i]";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute();
                }
             
            echo 1;


        }
 else
 {
    echo 0;
 }





?>