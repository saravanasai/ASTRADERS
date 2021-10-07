<?php 
  
 include("../../config.php");
   
 $page_status=1;
  
   //section for fetching and the data of customer by phoneNumber
  if(isset($_POST["customerPhoneNumber"]))
   {
    
    $customer_phone_Number=$_POST["customerPhoneNumber"];
   

    $sql="SELECT * FROM customermaster WHERE CUSTOMER_ID=:phoneNumber AND CUSTOMER_STATUS =1" ;

     $stmt=$conn->prepare($sql);
     $stmt->bindParam("phoneNumber",$customer_phone_Number);
    
   try{
    
    $stmt->execute();
    $customer_detail_fetch_by_phone_number=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $customer_id=$customer_detail_fetch_by_phone_number[0]["CUSTOMER_ID"];

      
              //section to handle if the customer exist check for existing loan details
                
                $sql_to_check_existing_loan_of_customer="SELECT * FROM `loanMaster` WHERE LN_TO_CUSTOMER=:customerid AND LN_TAB_BALANCE_AMOUNT>0";
          
                 $stmt_to_check_loan=$conn->prepare($sql_to_check_existing_loan_of_customer);
                 $stmt_to_check_loan->bindParam("customerid",$customer_id);
                  
                   try{
                           
                       $stmt_to_check_loan->execute();
                       $customer_existing_loan_fetch_by_phone_number=$stmt_to_check_loan->fetchAll(PDO::FETCH_ASSOC);
                       $loan_status=count($customer_existing_loan_fetch_by_phone_number);
                         
                          if($loan_status>0)
                          {
                            //section to view if customer having  existing loan  
                            foreach($customer_detail_fetch_by_phone_number as $customerDetailView)  

                            {
                                   
                              echo '<div class="card card-danger card-outline">
                                    
                              <div class="container">
                              <div class="row">
                                  <div class="col-md-6">
                                  <div class="card-body box-profile">
                                  <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User profile picture">
                                  </div>
                  
                                  <h3 class="profile-username text-center">'.$customerDetailView["CUSTOMER_FIRST_NAME"].'</h3>
                  
                                  <p class="text-muted text-center">CUSTOMER ID :'.$customerDetailView["CUSTOMER_ID"].' </p>
                  
                                  <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                      <b><i class="fas fa-phone-square-alt fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_PHONE_NUMBER"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b><i class="fas fa-at fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_EMAIL"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b><i class="far fa-id-badge fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_ADHAR_NO"].'</a>
                                    </li>
                                  </ul>
                                    <input type="hidden" value="'.$customerDetailView["CUSTOMER_ID"].'" id="customerProceedId"">
                                  <button id="yes_proceed" class="btn btn-danger btn-block "><b>PROCCED ANY WAY</b></button>
                                </div>
                                 </div>
                                  <div class="col-md-6">
                                  <div class="card-body box-profile">
                                  <div class="text-center">
                                  <img class="profile-user-img img-fluid img-circle" src="https://mk0leanfrontierqpi7o.kinstacdn.com/wp-content/uploads/2018/12/logo-placeholder-png.png" alt="User profile picture">
                                  <h3 class="profile-username text-center">EXISTING LOAN DETAILS</h3>
                                  
                                  <p class="text-muted text-center">ON DATE  :'.$customer_existing_loan_fetch_by_phone_number[0]["LN_ON_DATE"].' </p>
                                    
                                  </div>
                                 
                  
                                  <h3 class="profile-username text-center"></h3>
                  
                                  <p class="text-muted text-center"></p>
                  
                                  <ul class="list-group list-group-unbordered mb-3 p-3">
                                    <li class="list-group-item">
                                      <b>TOTAL AMOUNT</b> <a class="float-right">'.$customer_existing_loan_fetch_by_phone_number[0]["LN_TAB_TOTAL_AMOUNT"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>BALANCE AMOUNT</b> <a class="float-right">'.$customer_existing_loan_fetch_by_phone_number[0]["LN_TAB_BALANCE_AMOUNT"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>LOAN STATUS</b> <a class="float-right">PENDING</a>
                                    </li>
                                   
                                  </ul>
                                    <input type="hidden" value="'.$customer_existing_loan_fetch_by_phone_number[0]["LOAN_ID"].'" id="customerLoanId">
                                    <input type="hidden" value="'.$customer_existing_loan_fetch_by_phone_number[0]["LN_TO_CUSTOMER"].'" id="customerId">
                                  <button id="yes_pay_loan" class="btn btn-warning btn-block "><b>PAY NOW</b></button>
                                </div>
                                  
                                  </div>
                              </div>
                             </div>     
                                         
                            
                              <!-- /.card-body -->
                            </div>';
                            }
                             // END section to view if customer having  existing loan  
                          }
                          else
                          { 
                              //section to view if customer having no existing loan  
                            foreach($customer_detail_fetch_by_phone_number as $customerDetailView)  

                            {
                                   
                              echo '<div class="card card-success card-outline">
                                    
                              <div class="container">
                              <div class="row">
                                  <div class="col-md-6">
                                  <div class="card-body box-profile">
                                  <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User profile picture">
                                  </div>
                  
                                  <h3 class="profile-username text-center">'.$customerDetailView["CUSTOMER_FIRST_NAME"].'</h3>
                  
                                  <p class="text-muted text-center">CUSTOMER ID :'.$customerDetailView["CUSTOMER_ID"].' </p>
                  
                                  <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                      <b><i class="fas fa-phone-square-alt fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_PHONE_NUMBER"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b><i class="fas fa-at fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_EMAIL"].'</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b><i class="far fa-id-badge fa-2x"></i></b> <a class="float-right">'.$customerDetailView["CUSTOMER_ADHAR_NO"].'</a>
                                    </li>
                                  </ul>
                                    <input type="hidden" value="'.$customerDetailView["CUSTOMER_ID"].'" id="customerProceedId"">
                                  <button id="yes_proceed" class="btn btn-success btn-block "><b>YES PROCCED</b></button>
                                </div>
                                 </div>
                                  <div class="col-md-6">
                                 
                              </div>
                             </div>     
                                         
                            
                              <!-- /.card-body -->
                            </div>';
                            }
                           // end section to view if customer having no existing loan       


                          }
                          
                        
                      




                   }catch(PDOException $e)
                   {

                   }




              //section to handle if the customer exist check for existing loan details

            
     

    

   }catch(PDOException $e)
   {
          
     $page_status=0;
     echo  $page_status;


   }

    

  
   }
