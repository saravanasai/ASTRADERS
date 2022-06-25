<?php 
  include("../../config.php");
    //section for fetching Reports from databes by district adn area id
   if(isset($_POST["agent_id"]))
    { 
     $agent_id=$_POST['agent_id'];
     $from_date=$_POST['from_date'];
     $to_date=$_POST['to_date'];
     
     $sql="SELECT * FROM `todayTransactionView` WHERE `TR_DONE_ON`=:ag_id AND `TR_DATE`>='".$from_date."' AND `TR_DATE`<='".$to_date."'  ORDER BY `todayTransactionView`.`TR_DATE` ASC ";
     $stmt=$conn->prepare($sql);
     $stmt->bindParam("ag_id",$agent_id);
     $stmt->execute();
     $reports_by_agent_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $total_amount=0;
        foreach($reports_by_agent_fetch as $reports)
        {     
            $total_amount=$total_amount+$reports['TR_AMOUNT_PAID'];
            
            $report.='
            <tr role="row">
            <td>'.$reports["TR_LN_ID"].'</td>
            <td>'.$reports["CUSTOMER_ID"].'</td>
            <td>'.$reports["CUSTOMER_FIRST_NAME"].'</td>
            <td>'.$reports["DISTRICT_NAME"].'</td>
            <td>'.$reports["AREA_NAME"].'</td>
            <td>'.$reports["TR_AMOUNT_PAID"].'</td>
            <td>'.$reports["TR_DATE"].'</td>
            </tr>';
           
        }
        $data=["report"=>$report,"total"=>$total_amount];
        echo json_encode($data);
    }
    else
    {
        echo "NOT A VALID AGENT ID";
    }
 ?>