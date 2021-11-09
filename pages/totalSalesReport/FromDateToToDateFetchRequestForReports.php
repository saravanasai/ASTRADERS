<?php 
  include("../../config.php");
    //section for fetching Reports from databes by district adn area id
   if(isset($_POST["from_date"]))
    { 
    
     $from_date=$_POST['from_date'];
     $to_date=$_POST['to_date'];
     
     $sql="SELECT * FROM `salesReportView` WHERE  `SALE_ON_DATE`>='".$from_date."' AND `SALE_ON_DATE`<='".$to_date."'  ORDER BY `salesReportView`.`SALE_ON_DATE` ASC ";
     $stmt=$conn->prepare($sql);
    
     $stmt->execute();
     $reports_by_agent_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $total_amount=0;
     $cash_on=0;
        foreach($reports_by_agent_fetch as $reports)
        {     
            $total_amount=$total_amount+$reports['SALE_TOTAL_AMOUNT'];
            $cash_on=$cash_on+$reports['SALE_PRODUCT_INITIAL_PAYMENT'];
            $report.='
            <tr role="row">
            <td>'.++$sno.'</td>
            <td>'.$reports["CUSTOMER_ID"].'</td>
            <td>'.$reports["CUSTOMER_FIRST_NAME"].'</td>
            <td>'.$reports["CUSTOMER_LAST_NAME"].'</td>
            <td>'.$reports["SALE_TOTAL_AMOUNT"].'</td>
            <td>'.$reports["SALE_ON_DATE"].'</td>
            </tr>';
           
        }
        $data=["report"=>$report,"total"=>$total_amount,"onCash"=>$cash_on];
        echo json_encode($data);
    }
    else
    {
        echo "SOMETHING WENT WRONG";
    }
 ?>