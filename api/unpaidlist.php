<?php 
 include_once "./config.php";

 header('Content-Type: application/json');
 $error=array();
 
 
 if(isset($_POST['district']))
 {
    $agent_district=$_POST["district"];

        if($agent_district=="")
        {
        $error["No_response"]="ENTER THE DISTRICT";
        echo json_encode($error);
        }
        else
        {
        //section checking wheather the districts if presents
        $sql="SELECT * FROM `districts` WHERE `DISTRICT_ID`=:district";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("district",$agent_district);
        $stmt->execute();
        $result_district=$stmt->fetchAll(PDO::FETCH_ASSOC);
                
             if(count($result_district)>0)
             {
                 //section for fecthing the collection list 
                 $sql="SELECT * FROM `collectionListView` WHERE `COLLECTION_ON_DATE`< CURRENT_DATE  AND `DISTRICT_ID`=:district";
                 $stmt=$conn->prepare($sql);
                 $stmt->bindParam("district",$agent_district);
                 $stmt->execute();
                 $response_data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   
                 if(count($response_data)>0)
                 {
                    //  for($i=0;$i<count($response_data);$i++)
                    //  {
                    //     echo json_encode($response_data[$i]);
                    //  }
                     $response=array("collectionlist"=>$response_data);
                     echo json_encode($response);
                    }
                 
                 else
                 {
                    $error["empty_list"]="NO BALANCE UNPAID CUSTOMERS I THIS REGION";
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

