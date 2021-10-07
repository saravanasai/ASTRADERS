<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//global decleration for checking weather redirected from other page or not
$redirect_check = true;


//SECTION TO FETCH THE LOAN DETAILS BY LOAN ID IF REDIRECTED FROM OTHER PAGES
if (isset($_GET["LOAN_ID"])) {

  $redirect_check = false;

  $loan_id = $_GET["LOAN_ID"];
  $customer_id = $_GET["CUS_ID"];
  $sql = "SELECT * FROM `loanMaster`,`customermaster`,`collectionList` WHERE LOAN_ID=:loanid AND customermaster.CUSTOMER_ID=:customerid";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("loanid", $loan_id);
  $stmt->bindParam("customerid", $customer_id);
  $stmt->execute();
  $loan_details_fetched_by_loanid = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // var_dump($loan_details_fetched_by_loanid);
}
//END SECTION TO FETCH THE LOAN DETAILS BY LOAN ID IF REDIRECTED FROM OTHER PAGES

?>
<?php if ($redirect_check) {
?>
  <!-- section view  only while direct loan pay by phone number -->
  <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- THE PAGE MAIN CONTAINER -->
    <div class="container">

      <!-- section for first row -->
      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label for="customerPhoneNumnber">CUSTOMER IDENTIFICATION NUMBER</label>
            <div class="text-danger" id="errorCustomerPhoneNumber"></div>
            <input type="email" class="form-control" id="customerPhoneNumnber" placeholder="Enter Customer Id">
          </div>
          <button type="button" class="btn btn-success float-right" id="getCustomerDetail">GET DETAILS</button>
        </div>
      </div>
      <br>
      <div class="conatiner">
        <div class="row">
          <div class="col-md-12">
            <div class="customerdetailView"></div>

          </div>
        </div>
      </div>
    </div>
    <!-- end of first section -->

    <!-- section for Customer details -->



  </div>
  <!-- END OF MAIN CONTAINER -->
  </div>

<?php } else { ?>
  <!--end section view  only while direct loan pay by phone number -->

  <!-- section view  only while directed form other page  -->

  <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- THE PAGE MAIN CONTAINER -->
    <div class="container">

      <!-- section for first row -->
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">PAY LOAN FORM</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="position-relative p-3 bg-gray" style="height:300px">
               
                <div>
                  <div class="conatiner">
                     <!-- DETIALS VIEW ROW START -->
                    <div class="row">
                      <div class="col col-md-6">
                        <ul class="list-group list-group-bordered mb-3 text-danger">
                          <li class="list-group-item bg-navy">
                            <b>NAME</b> <a class="float-right"><?php echo $loan_details_fetched_by_loanid[0]['CUSTOMER_FIRST_NAME']; ?></a>
                          </li>
                          <li class="list-group-item bg-navy">
                            <b>PHONE NO</b> <a class="float-right"><?php echo $loan_details_fetched_by_loanid[0]['CUSTOMER_PHONE_NUMBER']; ?></a>
                          </li>
                          <li class="list-group-item bg-navy">
                            <b>MAIL</b> <a class="float-right"><?php echo $loan_details_fetched_by_loanid[0]['CUSTOMER_EMAIL']; ?></a>
                          </li>
                          <li class="list-group-item bg-navy">
                            <b>TOTAL AMOUNT</b> <a class="float-right"><?php echo $loan_details_fetched_by_loanid[0]['LN_TAB_TOTAL_AMOUNT']; ?></a>
                          </li>
                          <li class="list-group-item bg-navy">
                            <b>BALANCE AMOUNT</b> <a class="float-right"><?php echo $loan_details_fetched_by_loanid[0]['LN_TAB_BALANCE_AMOUNT']; ?></a>
                          </li>
                        </ul>
                      </div>
                         <!-- SECOND COLUMN -->
                         <div class="col col-md-6">
                        <ul class="list-group list-group-bordered mb-3 text-danger">
                          <li class="list-group-item bg-navy">
                            <b>PAYMENT NOW</b><a class="float-right"><input type="number" class="form-control form-control-border" id="amountPaidNow" placeholder=""></a>
                          </li>
                          <li class="list-group-item bg-navy">
                            <b>BALANCE </b> <a class="float-right"><input type="number" class="form-control form-control-border" id="amountBalanceNow" placeholder="" disabled></a>
                          </li>
                          
                        </ul>
                      </div>
                         <!-- END OF SECNOND COLUMN -->
                    </div>
                   <!--END OF DETIALS VIEW ROW START -->


                  </div>
                  

                
                          

                </div>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <!-- //hidden feilds for geting the value and form to update loan master  -->
              
            <input type="hidden"  id="amountBalanceBefore" value="<?php echo $loan_details_fetched_by_loanid[0]['LN_TAB_BALANCE_AMOUNT']; ?>" >
            <input type="hidden"  id="updateToCustomerId" value="<?php echo $loan_details_fetched_by_loanid[0]['CUSTOMER_ID']; ?>" >
            <input type="hidden"  id="updateToLoanId" value="<?php echo $loan_details_fetched_by_loanid[0]['LOAN_ID']; ?>" >
            <input type="hidden"  id="collectionListProductUpdate" value="<?php echo $loan_details_fetched_by_loanid[0]['LN_TO_PRODUCT']; ?>" >
                    
                <div class="float-right" id="payButton">
                <button type="submit" id="loanPayUpdateButton" class="btn btn-success">PAY</button>
              </div>
              
                  <!-- //hidden feilds for geting the value and form to update loan master  --> 
            </div>
            <!-- /.card-footer-->
          </div>
        </div>
      </div>
    </div>















    <!-- end section view  only while directed form other page  -->
  <?php } ?>

  <!-- /.content -->
  </div>
  <?php
  include_once "./assets/js_links.php";
  ?>