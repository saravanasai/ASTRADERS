<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";









//SECTION FOR FETCHING THE today collection list 
$sql = "SELECT * FROM `todayTransactionView` WHERE `TR_COMMIT_STATUS`=1 AND `TR_DONE_ON`!='ON STORE'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$today_collection_list_view_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
//end of the today collection list fetching

//section to handle update of the transaction

   if(isset($_POST["buttonUpdateTransaction"]))
   {
       
       $tr_amount_paid_now=$_POST["updatedNewAmount"];
       $tr_last_balance=$_POST["lastBalance"];
       $tr_of_cus_id=$_POST["transactionUpdateToCusId"];
       $tr_amount_balance_now=$tr_last_balance-$tr_amount_paid_now;

       $sql=" UPDATE `loanTransaction` SET `TR_AMOUNT_PAID`=:amountpaid,`TR_AMOUNT_BALANCE`=:amountBalance WHERE `TR_OF_CUSTOMER`=:id AND `TR_COMMIT_STATUS`=1";
    
       $stmt = $conn->prepare($sql);
       $stmt->bindParam("id",$tr_of_cus_id);
       $stmt->bindParam("amountpaid",$tr_amount_paid_now);
       $stmt->bindParam("amountBalance",$tr_amount_balance_now);
           
           try{
                
            $stmt->execute();
              
            echo '<script>
            swal("UPDATED", "THE COLLECTION DETAILS", "success").then(()=>{
              window.location.href = "./index.php"; 
            });
         </script>';

           }catch(PDOException $e)
           {
            echo '<script>
            swal("SOMETHING WENT WRONG", "NO CHANGES MADE", "error").then(()=>{
              window.location.href = "./index.php"; 
            });
         </script>';
           }
             
      
        


   }



//end section to handle update of the transaction



?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="container p-0">
         <button type="button" class="btn btn-primary float-right" id="dayClose">DAY CLOSE</button>
        <div class="" style="height:200px;">
            <table class="table table-striped table-head-fixed text-nowrap table-bordered " id="viewProductTable">


                <thead>
                    <tr>
                        <th style="width: 10px">S.NO</th>
                        <th>NAME</th>
                        <th>CUSTOMER ID</th>
                        <th>AREA</th>
                        <th>DISRICT</th>
                        <th>AMOUNT PAID</th>
                        <th>BALANCE AMOUNT</th>
                        <th>DATE</th>
                        <th style="width: 40px">TIME</th>
                        <th style="width: 40px">ACTION</th>



                    </tr>
                </thead>
                <tbody>
                    <div class="card table-responsive">
                        <?php
                        foreach ($today_collection_list_view_fetch as $sno => $today_collection_list) {
                            echo '<tr>
                                 <td>' . ++$sno . '</td>
                                 <td>' . $today_collection_list["CUSTOMER_FIRST_NAME"] . '</td>
                                 <td>' . $today_collection_list["CUSTOMER_ID"] . '</td>
                                 <td>' . $today_collection_list["AREA_NAME"] . '</td>
                                 <td>' . $today_collection_list["DISTRICT_NAME"] . '</td>
                                 <td>'.$today_collection_list["TR_AMOUNT_PAID"].'</td>
                                 <td>' . $today_collection_list["TR_AMOUNT_BALANCE"] . '</td>
                                 <td>' . $today_collection_list["TR_DATE"] . '</td>
                                 <td>' . $today_collection_list["TR_TIME"] . '</td>
                                 <td> <button type="button" class="btn btn-sm btn-success transactionViewModel" data-toggle="modal" id=' . $today_collection_list["TR_LN_ID"] . ' data-target="#modal-lg" data-id="'.$today_collection_list["CUSTOMER_ID"].'">
                                 EDIT
                                 <input type="hidden" id="editAreaDistrictId"  value="'.$today_collection_list["CUSTOMER_ID"].'">
                                 </button></td>
                                 
                                 </tr>';
                        }
                        ?>
                    </div>
                </tbody>
            </table>

        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.content -->
</div>

<!-- MODEL -->
<!-- Modal -->
<div id="model">
    <div class="modal fade" id="modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<?php
include_once "./assets/js_links.php";
?>