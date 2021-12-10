<?php 
  include("../../config.php");
    //section for fetching Reports from databes by district adn area id
    if(isset($_POST["agent_id"]))
    { 
     $agent_id=$_POST['agent_id'];
     $from_date=$_POST['from_date'];
     $sql="SELECT *,SUM(`TR_AMOUNT_PAID`) AS TOTAL_ON_DAY FROM `todayTransactionView` WHERE `TR_DONE_ON`=:ag_id AND `TR_COMMIT_STATUS`=0 AND `TR_DATE`>=:fromdate GROUP BY `TR_DATE` ORDER BY `todayTransactionView`.`TR_DATE` ASC" ;
     $stmt=$conn->prepare($sql);
     $stmt->bindParam("ag_id",$agent_id);
     $stmt->bindParam("fromdate",$from_date);
     $stmt->execute();
     $reports_by_agent_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
      
     $total_amount=0;
     $sno=1;
        foreach($reports_by_agent_fetch as $reports)
        {     
            $total_amount=$total_amount+$reports['TOTAL_ON_DAY'];
           
            $report.='
            <tr role="row">
            <td>'.$sno.'</td>
            <td>'.$reports["TR_DATE"].'</td>
            <td>'.$reports["TOTAL_ON_DAY"].'</td> 
            </tr>';
            $sno++;
           
        }
        // var_dump($report);
        $data=["report"=>$report,"total"=>$total_amount];
        echo json_encode($data);
    }
    else
    {
        echo "NOT A VALID AGENT ID";
    }