<?php 
 include_once "./config.php";

 header('Content-Type: application/json');

 
 if(isset($_POST['paid_to']))
 {
     //section to check agent exits or not 
   $paid_to=$_POST['paid_to'];

   $sql="SELECT * FROM `agents` WHERE `AGENT_ID`=:id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam('id',$paid_to);
   $stmt->execute();
   $response=$stmt->fetchAll(PDO::FETCH_ASSOC);
            //  echo $response[0]['AGENT_STATUS'];
          if(count($response)>0)
          {
             
               if($response[0]['AGENT_STATUS']=="ACTIVE")
               {
                   //section for validating all other feild for payment
                   $customer_id = $_POST["customerId"];
                   $amountPaid = $_POST["amountPaid"];
                   $blanaceAmount = $_POST["balanceamount"];
                   $loanId = $_POST["loanId"];
                   if(!empty($customer_id)&&is_numeric($customer_id))
                   {
                        if(!empty($amountPaid)&&is_numeric($amountPaid))
                        {
                            if(!empty($blanaceAmount)&&is_numeric($blanaceAmount)||true)
                            {
                                if(!empty($loanId)&&is_numeric($loanId))
                                {
                                    $loan_status=1;
                                    if($_POST["balanceamount"]<=0)
                                    {
                                        $loan_status=0;
                                    }
                                    //section to validation the loan exits or not 
                                    $sql="SELECT * FROM `collectionList` WHERE `COLLECTION_LN_ID`=:loanid AND `COLLECTION_TO_CUSTOMER`=:cusid";
                                    $stmt=$conn->prepare($sql);
                                    $stmt->bindParam('loanid',$loanId);
                                    $stmt->bindParam('cusid',$customer_id);
                                    $stmt->execute();
                                    $response=$stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if(count($response))
                                    { 
                                        date_default_timezone_set('Asia/Kolkata');
                                        $amount_Paid_On_Date=(new DateTime())->format('Y-m-d');
                                        //section on which the all are perfect to update 
                                        $sql = "UPDATE `collectionList` SET `COLLECTION_LAST_AMOUNT_PAID`=:amountPaid,`COLLECTION_BALANCE_AMOUNT`=:balance,`COLLECTION_ON_DATE`= DATE_ADD(`COLLECTION_ON_DATE`, INTERVAL 7 DAY),`COLLECTED_ON_DATE`=:onDate,`COLLECTION_STATUS`=:clStatus,`PAID_ON`=:paid_to WHERE COLLECTION_TO_CUSTOMER =:customerid AND COLLECTION_LN_ID =:loanId";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindParam("customerid", $customer_id);
                                        $stmt->bindParam("amountPaid", $amountPaid);
                                        $stmt->bindParam("balance", $blanaceAmount);
                                        $stmt->bindParam("onDate",$amount_Paid_On_Date);
                                        $stmt->bindParam("loanId", $loanId);
                                        $stmt->bindParam("clStatus", $loan_status);
                                        $stmt->bindParam("paid_to", $paid_to);
                                        try {

                                            if($stmt->execute())
                                            {
                                                if($blanaceAmount==0)
                                                {
                                                    echo json_encode(["status"=>"200","message"=>"LOAN CLOSED"]);
                                                }
                                                else
                                                {
                                                    echo json_encode(["status"=>"200","message"=>"DUE PAID"]);  
                                                }
                                                
                                            }
                                       
                                           
                                        } catch (PDOException $e) {

                                            echo json_encode(["status"=>"200","message"=>"Something went Wrong","error"=>$e]);
                                        }
                                       
                                    }
                                    else
                                    {
                                    echo json_encode(["status"=>"200","message"=>"NO LOAN OR CUS ID MATCH TO RECORD"]);
                                    }
                                                            
                                }
                                else
                                {
                                echo json_encode(["status"=>"200","message"=>"CHECK LOAN ID FEILD"]);
                                }
                            }
                            else
                            {
                            echo json_encode(["status"=>"200","message"=>"CHECK BALANCE AMOUNT PAID FEILD"]);
                            }
                        }
                        else
                        {
                        echo json_encode(["status"=>"200","message"=>"CHECK AMOUNT PAID FEILD"]);
                        }
                        
                   }
                   else
                   {
                    echo json_encode(["status"=>"200","message"=>"CHECK CUSTOMER ID"]);
                   }
                    
               }
               else
               {
                echo json_encode(["status"=>"200","message"=>"AGENT IS DISABLED"]);
               }
          }
          else
          {
             
              echo json_encode(["status"=>"200","message"=>"NOT A VALID AGENT"]);
          }       
     



 }