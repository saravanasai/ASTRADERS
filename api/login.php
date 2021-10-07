<?php
include_once "./config.php";


   

  if(isset($_POST['phoneNumber']))
  {

       
    $error=array();
    $request_validation=true;
    $agent_phone_number=$_POST['phoneNumber'];       
    
       //VALIDATION FOR REQUEST 
    if(empty($agent_phone_number))
    {
        $error["no_ph_number"]="ENTER THE PHONE NUMBER";
        $request_validation=false;
         
       

    }
    if(strlen($agent_phone_number)>10||strlen($agent_phone_number)<10)
    {
        $error["no_ph_number"]="CHECK NO OF DIGITS";
        $request_validation=false;
    }
   
     
           if($request_validation)
           {
            $sql="SELECT * FROM `agents` WHERE `AGENT_PHONE_NUMBER`=:phoneNumber";
     
            $stmt=$conn->prepare($sql);
            $stmt->bindParam("phoneNumber",$agent_phone_number);
            
                  
                $stmt->execute();
                $agent_details_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                    

                    if(count($agent_details_fetch)>0)
                    {
                         if($agent_details_fetch[0]["AGENT_STATUS"]=="ACTIVE")
                         {
                             //fecthing the agents  detail from agents table
                            $sql="SELECT `AGENT_ID`,`AGENT_NAME`,`AGENT_ADDRESS`,`AGENT_ADHAR_NO`,`AGENT_PHONE_NUMBER`,`AGENT_FOR_CITY` FROM `agents` WHERE `AGENT_PHONE_NUMBER`=:phoneNumber";
     
                            $stmt=$conn->prepare($sql);
                            $stmt->bindParam("phoneNumber",$agent_phone_number);
                            $stmt->execute();
                            $agent_details_fetch=$stmt->fetch(PDO::FETCH_ASSOC);
                                if(count($agent_details_fetch)>0)
                                { 
                                    //district of a agent
                                    $agent_disrict=$agent_details_fetch['AGENT_FOR_CITY'];
                                    $agent_id=$agent_details_fetch['AGENT_ID'];
                                    $sql="SELECT * FROM `agents_to_area`,areas,districts WHERE `AREA_TO_DISTRICT`=:districtid 
                                    AND agents_to_area.AREA_ID_AG=areas.AREA_ID
                                    AND districts.DISTRICT_ID=agents_to_area.AREA_TO_DISTRICT
                                    AND agents_to_area.AREA_TO_AGENT=:agentid";
     
                                    $stmt=$conn->prepare($sql);
                                    $stmt->bindParam("districtid",$agent_disrict);
                                    $stmt->bindParam("agentid",$agent_id);
                                    $stmt->execute();
                                     
                                    $agent_areas_list=$stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $agent_areas="";
                                    foreach($agent_areas_list as $key=> $areas_list)
                                    {    
                                        if($key<count($agent_areas_list)-1)
                                        {
                                            $agent_areas.=$areas_list["AREA_ID_AG"].',';
                                        }
                                        else
                                        {
                                            $agent_areas.=$areas_list["AREA_ID_AG"];
                                        }
                                       
                                    }

                                    echo json_encode(["status"=>200,"agents_info"=>$agent_details_fetch,"agent_areas"=>$agent_areas]);

                                }
                          

                              
                              

                         } 
                         else
                         {
                             $error["AGENT_STATUS"]="AGENT HAS BEEN DIABLED";
                             echo json_encode($error);
                         }    
        
                    }
                    else
                    {
                        $error["no_user"]="USER NOT EXISTS";
                        echo json_encode($error);
                    }
           }
            else
            {
                echo json_encode($error);
            }
        }
        else
        {
            $error["no_field_set"]="FEILD NAME DOES NOT EXISTS";
            echo json_encode($error);
        }

?>