     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php

include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";

if (isset($_GET["Agent_id"])) {
  $agent_id = $_GET["Agent_id"];
  //section for getting the detials of  customer transaction from todaytransactionview table
  $total_collection_amount= 0;
  try{
    $sql = "SELECT * FROM  todayTransactionView  WHERE TR_DONE_ON=:id AND TR_COMMIT_STATUS=1 ";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam('id',$agent_id);
  $stmt->execute();
  $agent_transaction_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e)
  {
    var_dump($e);
  }
  

  if (count($agent_transaction_details_fetch) > 0) {
    $total_collection_amount= 0;
    foreach ($agent_transaction_details_fetch as $sno => $transaction_details){
      $total_collection_amount+=$transaction_details["TR_AMOUNT_PAID"]; 
    }
  
  } else {

      echo '<script>  swal("NO TRANSACTION DONE", "NO TRANSACTION", "info").then(() => {
          window.location.href = "./index.php?status=singleAgentcollection";
        }); </script>';
  }

  // end section for getting the detials of  customer transaction from todaytransactionview table


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
           <h6 align="right"> Collection of Total Amount <?php echo "Rs." .$total_collection_amount; ?>
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
                   <th>ACTION</th>
                 </tr>

               </thead>
               <tbody>
                 <!-- section for single agent customer view transaction -->
                 <?php
                              foreach ($agent_transaction_details_fetch as $sno => $transaction_details){
                                $total_collection_amount+=$transaction_details["TR_AMOUNT_PAID"]; 
                              
                                echo '<tr>
                                 <td>' . ++$sno . '</td>                                
                                 <td>' . $transaction_details["CUSTOMER_ID"] . '</td>
                                 <td>' . $transaction_details["CUSTOMER_FIRST_NAME"] . '</td>
                                 <td>' . $transaction_details["DISTRICT_NAME"] . '</td>
                                 <td>' . $transaction_details["AREA_NAME"] . '</td>
                                 <td>' . $transaction_details["PRODUCT_NAME"] . '</td>                        
                                 <td>'.$transaction_details["TR_AMOUNT_PAID"].'</td>
                                 <td> <button type="button" class="btn btn-sm btn-success transactionViewModel" data-toggle="modal" id=' . $transaction_details["CUSTOMER_ID"] . ' data-target="#modal-lg">
                                 EDIT
                                 <input type="hidden" id="editAreaDistrictId" value="'.$transaction_details["CUSTOMER_ID"].'">
                                 </button></td>
                                 </tr>';
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
       <div class="modal fade" id="modal-lg" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
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