<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once("./assets/css_links.php");
//adding a database config file
include_once("./config.php");



if (isset($_GET["cus_id_transaction"])) {
    $customer_id = $_GET["cus_id_transaction"];


    //section for getting the detials of  customer transaction from transaction table
    $sql = "SELECT * FROM `customerTransactionView` WHERE `TR_OF_CUSTOMER`=:customerId AND TR_COMMIT_STATUS=0";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("customerId", $customer_id);
    $stmt->execute();
    $single_customer_transaction_details_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (count($single_customer_transaction_details_fetch) > 0) {
    } else {

        echo '<script>  swal("NO TRANSACTION DONE", "NO TRANSACTION", "info").then(() => {
            window.location.href = "./index.php?status=viewCustomer";
          }); </script>';
    }

    // end section for getting the detials of  customer transaction from transaction table


}








?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-md-6">
                    <h4>TRANSACTION DETAILS</h4>
                </div>


                <!-- /.col -->
            </div>
            <!-- info row -->
            <br>
            <div class="row invoice-info">

                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>AS TRADERS</strong><br>
                        118 Prashant Nagar,korit road<br>
                        Nandurbar,425412<br>
                        Phone: 8156005006<br>
                        Email: ajshaikboy@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong> NAME: <?php echo $single_customer_transaction_details_fetch[0]["CUSTOMER_FIRST_NAME"] ?></strong><br>

                        Customer Id: <?php echo $single_customer_transaction_details_fetch[0]["CUSTOMER_ID"] ?><br>
                        Phone: <?php echo  $single_customer_transaction_details_fetch[0]["CUSTOMER_PHONE_NUMBER"] ?><br>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b></b><br>
                    <br>
                    <b>Customer ID:</b> <?php echo  $single_customer_transaction_details_fetch[0]["CUSTOMER_ID"] ?><br>
                    <input type="hidden" id="customerSubmitId" value="<?php echo  $single_customer_transaction_details_fetch[0]["CUSTOMER_ID"] ?>">
                    <b>Report Date:</b> <?php echo  date("d-m-Y"); ?><br>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <div class="card card-danger table-responsive">
                        <div class="card-header">
                            <h3>Transaction History</h3>
                        </div>
                        <table class="table table-head-fixed table-striped table-bordered printTable m-3" id="singleCustomerTransactionTabl">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>LOAN ID</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th>PAID </th>
                                    <th>AMOUNT BALANACE</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>BILL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- section for view transaction -->
                                <?php
                                foreach ($single_customer_transaction_details_fetch as $sno => $single_customer_transaction_details) {
                                    echo '<tr>
                                 <td>' . ++$sno . '</td>
                                 <td>' . $single_customer_transaction_details["LOAN_ID"] . '</td> 
                                 <td>' . $single_customer_transaction_details["TR_AMOUNT_PAID_INITIAL"] . '</td>
                                 <td>' . $single_customer_transaction_details["TR_AMOUNT_PAID"] . '</td>
                                 <td>' . $single_customer_transaction_details["TR_AMOUNT_BALANCE"] . '</td>
                                 <td>' . $single_customer_transaction_details["TR_DATE"] . '</td>
                                 <td>' . $single_customer_transaction_details["TR_TIME"] . '</td> 
                                 <td><button class="btn btn-sm btn-success  invoiceDetails"  id="' . $single_customer_transaction_details["LOAN_ID"] . '"><i class="fas fa-binoculars px-1"></i>Invoice</button></td>    
                                 </tr>';
                                }

                                ?>
                                <!-- end section for view transaction -->
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12 mt-3">
                    <a href="?status=zeroBalanceList" class="btn btn-sm btn-info float-right text-white" style="margin-right: 5px;">
                        <i class="fas fa-backward px-2"></i> Back
                    </a>
                    <button type="button" class="btn btn-sm btn-primary float-right printButton" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>




<!-- /.content -->
</div>
<?php
include_once("./assets/js_links.php");
?>
<script>
    $(".printButton").click(function() {
        // $(".printTable").print();
        window.print();
    })
</script>