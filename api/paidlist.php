<?php 
 include_once "./config.php";

 header('Content-Type: application/json');
 $error=array();
 
 
 if(isset($_POST['district']))
 {
    $agent_district=$_POST["district"];
    $agent_areas=$_POST["areas"];

        if($agent_district=="")
        {
        $error["No_response"]="ENTER THE DISTRICT";
        echo json_encode($error);
        }
        else
        {
        //section checking wheather the districts if presents
        $sql="SELECT * FROM `collectionListView` WHERE `DISTRICT_ID`=:district";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("district",$agent_district);
        $stmt->execute();
        $result_district=$stmt->fetchAll(PDO::FETCH_ASSOC);
              
             if(count($result_district)>0)
             {
                 //section for fecthing the collection list 
                 $sql="SELECT * FROM `todayTransactionView` WHERE `DISTRICT_ID`=:district AND `TR_DONE_ON`!='ON STORE' AND `TR_COMMIT_STATUS`=1  AND `AREA_ID`  IN (".$agent_areas.")";
                 $stmt=$conn->prepare($sql);
                 $stmt->bindParam("district",$agent_district);
                 $stmt->execute();
                 $response_data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   
                 if(count($response_data)>0)
                 {
                   
                     $response=array("paid_list"=>$response_data);
                     echo json_encode($response);
                    }
                 
                 else
                 {
                    $error["empty_list"]="NO BALANCE COLLECTION ON THIS AREA";
                    echo json_encode($error);
                 }


             }
             else
             {
                 $error["no_district_available"]="ENTER THE VALID DISTRICT";
                 echo json_encode($error);
             }


        } 

 }
 else
 {
     $error["no_feild_exits"]="NO FEILD NAME EXISTS";
     echo json_encode($error);
 }
   
 



 
             
      
        
           
  
  

?>

