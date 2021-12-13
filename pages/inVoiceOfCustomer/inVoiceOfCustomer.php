


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php

include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";

if (isset($_GET["invoice_id"])) {
  $invoice_id = $_GET["invoice_id"];
  //section for getting the detials of  customer transaction from orderItem_master table
  try{
    $sql = "SELECT *
    FROM  orderItemMaster
    INNER JOIN products ON products.PRODUCT_ID=orderItemMaster.OR_OF_PR_ID WHERE `OR_TO_LN_ID`=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam('id',$invoice_id);
  $stmt->execute();
  $invoice_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e)
  {
    var_dump($e);
  }
  

  if (count($invoice_details_fetch) > 0) {
    $total_collection_amount= 0;
  } else {

      echo '<script>  swal("NO INVOICE IS THERE", "SORRY FOR THE INTEREPTION", "info").then(() => {
          window.location.href = "./index.php?status=viewCustomer";
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
           </h6>
           <div class="table-responsive p-0">
             <table class="table  table-head-fixed text-nowrap table-bordered" id="viewSingleAgentCollectionTable">
               <thead>
                 <tr>
                   <th>S.NO.</th>
                   <th>PRODUCT NAME</th>
                   <th>MODEL</th>
                   <th>PRICE</th>
                   <th>QUANTITY</th>
                   <th>TOTAL AMOUNT</th>
                 </tr>

               </thead>
               <tbody>
                 <!-- section for single agent customer view transaction -->
                 <?php
                              foreach ($invoice_details_fetch as $sno => $transaction_details){  
                                echo '<tr>
                                 <td>' . ++$sno . '</td>                                
                                 <td>' . $transaction_details["PRODUCT_NAME"] . '</td>
                                 <td>' . $transaction_details["PRODUCT_MODEL_NO"] . '</td>
                                 <td>' . $transaction_details["PRODUCT_PRICE"] . '</td>                    
                                 <td>'.$transaction_details["OR_OF_PR_QUANTITY"].'</td>
                                 <td>'.$transaction_details["OR_OF_PR_QUANTITY"]*$transaction_details["PRODUCT_PRICE"].'</td>
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
     </section>




     <?php
include_once "./assets/js_links.php";
?>