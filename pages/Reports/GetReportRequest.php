<?php 
  include("../../config.php");
    //section for fetching Reports from databes by district adn area id
   if(isset($_POST["area_id"])&& isset($_POST['district_id']))
    { 
     $district_id=$_POST['district_id'];
     $area_id=$_POST['area_id'];
     $sql="SELECT `LOAN_ID`,
     `CUSTOMER_FIRST_NAME`,
     `PRODUCT_NAME`,
     `LN_PRODUCT_QUANTITY`,
     `LN_TAB_TOTAL_AMOUNT`,
     `LN_TAB_BALANCE_AMOUNT`,
     `LN_ON_DATE` 
     FROM `collectionListView` WHERE `DISTRICT_ID`=:dis_id AND `AREA_ID`=:ar_id" ;
     $stmt=$conn->prepare($sql);
     $stmt->bindParam("dis_id",$district_id);
     $stmt->bindParam("ar_id",$area_id);
     $stmt->execute();
     $reports_by_district_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $total_amount=0;
     $total_balance=0;
        foreach($reports_by_district_fetch as $reports)
        {     
            $total_amount=$total_amount+$reports['LN_TAB_TOTAL_AMOUNT'];
            $total_balance=$total_balance+$reports['LN_TAB_BALANCE_AMOUNT'];

            $report.='
            <tr role="row">
            <td>'.$reports["LOAN_ID"].'</td>
            <td>'.$reports["CUSTOMER_FIRST_NAME"].'</td>
            <td>'.$reports["PRODUCT_NAME"].'</td>
            <td>'.$reports["LN_PRODUCT_QUANTITY"].'</td>
            <td>'.$reports["LN_TAB_TOTAL_AMOUNT"].'</td>
            <td>'.$reports["LN_TAB_BALANCE_AMOUNT"].'</td>
            <td>'.$reports["LN_ON_DATE"].'</td>
            </tr>';
           
        }
        $data=["report"=>$report,"total"=>$total_amount,"balance"=>$total_balance];
        echo json_encode($data);
    }
    else
    {
        echo "NOT A VALID DISTRICT OR AREA";
    }
 ?>