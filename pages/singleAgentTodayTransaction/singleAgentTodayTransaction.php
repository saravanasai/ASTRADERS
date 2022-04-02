     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php

      include_once "./assets/css_links.php";
      //adding a database config file
      include_once "./config.php";

      if (isset($_GET["Agent_id"])) {
        $agent_id = $_GET["Agent_id"];
        //section for getting the detials of  customer transaction from todaytransactionview table
        $total_collection_amount = 0;
        try {
          $sql = "SELECT * FROM  todayTransactionView  WHERE TR_DONE_ON=:id AND TR_COMMIT_STATUS=1 ";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam('id', $agent_id);
          $stmt->execute();
          $agent_transaction_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
          // var_dump($agent_transaction_details_fetch);
        } catch (PDOException $e) {
          var_dump($e);
        }


        if (count($agent_transaction_details_fetch) > 0) {
          $total_collection_amount = 0;
          foreach ($agent_transaction_details_fetch as $sno => $transaction_details) {
            $total_collection_amount += $transaction_details["TR_AMOUNT_PAID"];
          }
        } else {

          echo '<script>  swal("NO TRANSACTION DONE", "NO TRANSACTION", "info").then(() => {
          window.location.href = "./index.php?status=singleAgentcollection";
        }); </script>';
        }

        // end section for getting the detials of  customer transaction from todaytransactionview table
        //section to handle update of the transaction

        if (isset($_POST["buttonUpdateTransaction"])) {

          $tr_amount_paid_now = $_POST["updatedNewAmount"];
          $tr_last_balance = $_POST["lastBalance"];
          $tr_of_cus_id = $_POST["transactionUpdateToCusId"];
          $tr_amount_balance_now = $tr_last_balance - $tr_amount_paid_now;

          $sql = " UPDATE `loanTransaction` SET `TR_AMOUNT_PAID`=:amountpaid,`TR_AMOUNT_BALANCE`=:amountBalance WHERE `TR_OF_CUSTOMER`=:id AND `TR_COMMIT_STATUS`=1";

          $stmt = $conn->prepare($sql);
          $stmt->bindParam("id", $tr_of_cus_id);
          $stmt->bindParam("amountpaid", $tr_amount_paid_now);
          $stmt->bindParam("amountBalance", $tr_amount_balance_now);

          try {

            $stmt->execute();

            echo '<script>
           swal("UPDATED", "THE COLLECTION DETAILS", "success").then(()=>{
             window.location.href = "./index.php?status=singleAgentcollection"; 
           });
        </script>';
          } catch (PDOException $e) {
            echo '<script>
           swal("SOMETHING WENT WRONG", "NO CHANGES MADE", "error").then(()=>{
             window.location.href = "./index.php"; 
           });
        </script>';
          }
        }



        //end section to handle update of the transaction

      }



      ?>
     <div class="content-wrapper" style="min-height: 1419.6px;">
       <!-- Content Header (Page header) -->
       <section class="content-header">
         <div class="container-fluid">

         </div><!-- /.container-fluid -->
       </section>

       <!-- Main content -->
       <div class="container p-0">
         <div class="">
           <div>Date : <?php echo  date("d-m-Y"); ?></div>
           <h6 align="right"> Collection of Total Amount <?php echo "Rs." . $total_collection_amount; ?>
           </h6>

           <div class="table-responsive p-0">
             <table class="table  table-head-fixed text-nowrap table-bordered" id="viewSingleAgentCollectionTable">
               <thead>
                 <tr>
                   <th>S.NO.</th>
                   <th>CUSTOMER ID</th>
                   <th>CUSTOMER NAME</th>
                   <th>DISTRICT</th>
                   <th>AREA</th>
                   <th>PRODUCT NAME</th>
                   <th>TOTAL AMOUNT PAID</th>
                   <!-- <th>ACTION</th> -->
                 </tr>

               </thead>
               <tbody>
                 <!-- section for single agent customer view transaction -->
                 <?php
                  foreach ($agent_transaction_details_fetch as $sno => $transaction_details) {
                    $total_collection_amount += $transaction_details["TR_AMOUNT_PAID"];

                    echo '<tr>
                                 <td>' . ++$sno . '</td>                                
                                 <td>' . $transaction_details["CUSTOMER_ID"] . '</td>
                                 <td>' . $transaction_details["CUSTOMER_FIRST_NAME"] . '</td>
                                 <td>' . $transaction_details["DISTRICT_NAME"] . '</td>
                                 <td>' . $transaction_details["AREA_NAME"] . '</td>
                                 <td>' . $transaction_details["PRODUCT_NAME"] . '</td>                        
                                 <td>' . $transaction_details["TR_AMOUNT_PAID"] . '</td>
                                 </tr>';

                    $dummyeditbutton = ' <td> <button type="button" class="btn btn-sm btn-success singleAgenttransactionViewModel" data-toggle="modal" id=' . $transaction_details["TR_LN_ID"] . ' data-target="#singleAgentTransactionEditModel" data-id="' . $transaction_details["CUSTOMER_ID"] . '">
                                 EDIT
                                 <input type="hidden" id="editAreaDistrictId" value="' . $transaction_details["CUSTOMER_ID"] . '">
                                 </button></td>';
                  }
                  ?>
                 <!-- end section for single agent customer view transaction -->
               </tbody>

             </table>

           </div>
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.content -->

     </div>

     <!-- MODEL -->
     <!-- Modal -->
     <div id="model">
       <div class="modal fade" id="singleAgentTransactionEditModel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">TRANSACTION EDIT</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">

             </div>
             <div class="modal-footer">

             </div>
           </div>
         </div>
       </div>
     </div>
     </section>




     <?php
      include_once "./assets/js_links.php";
      ?>