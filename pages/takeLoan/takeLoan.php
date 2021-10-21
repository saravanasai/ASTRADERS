<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
   //section for fetching the latest customer details from dataBase to proceed loan 

   //gloabal variable decleration for customer details
   $single_customer_details_fetch;

    if(isset($_GET["CUS_ID"]))
    {
        $customer_id=$_GET["CUS_ID"];
         //SECTION FOR VALIDATION IS NEW CUSTOMER OR NOT 
           if($customer_id==0)
           { 
            //section for getting the detials of existing customer directly
            $sql="
            SELECT * FROM customermaster  
            ORDER BY CUSTOMER_ID DESC  
            LIMIT 1" ;

            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $single_customer_details_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
              

           }
           else{
               
            //section for getting the detials of existing customer
            $sql="
            SELECT * FROM customermaster  
            WHERE CUSTOMER_ID=:id" ;

            $stmt=$conn->prepare($sql);
            $stmt->bindParam("id",$customer_id);
            $stmt->execute();
            $single_customer_details_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
             
            }
             // end section for getting the detials of existing customer
         }  
         //end of the section for lastest customer fetch

  







   
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
                <div class="col-md-4">
                  <h4 class="display-12">SEARCH PRODUCT</h4>
                 <div class="row">
                <div class="col-md-8">
                    <form >
                        <div class="input-group">
                            <input type="search" id="searchBar" class="form-control form-control-md" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-success">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
               </div>
            </h4>
        </div>
               <!-- column for to product table -->
              
               <div class="col-md-8 productTable">
                  <h4>
                  <h4 class="display-8">CHOOSE PORDUCT</h4>
                 <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-body table-responsive p-0" style="height:200px;">
                <table class="table table-striped table-head-fixed text-nowrap ">
                  <thead>
                    <tr>
                      <th style="width: 10px">S.NO</th>
                      <th>NAME</th>
                      <th>MODEL</th>
                      <th>QUANTITY</th>
                      <th>PRICE</th>
                      <th style="width: 40px">ADD</th>
                    </tr>
                  </thead>
                  <tbody id="searchResultTable">
                    <div ></div>
                    </tbody>
                   
                </table>
                </div>
                </div>
                 </div>
               </div>
            </h4>
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
                    <strong> NAME: <?php echo $single_customer_details_fetch[0]["CUSTOMER_FIRST_NAME"] ?></strong><br>
                  
                    Address:  <?php echo $single_customer_details_fetch[0]["CUSTOMER_ADDRESS"] ?><br>
                    Phone:  <?php echo $single_customer_details_fetch[0]["CUSTOMER_PHONE_NUMBER"] ?><br>
                    Email: <?php echo $single_customer_details_fetch[0]["CUSTOMER_EMAIL"] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b></b><br>
                  <br>
                  <b>Customer ID:</b> <?php echo $single_customer_details_fetch[0]["CUSTOMER_ID"] ?><br>
                    <input type="hidden" id="customerSubmitId" value="<?php echo $single_customer_details_fetch[0]["CUSTOMER_ID"] ?>">
                  <b>Bill Date:</b>  <?php echo  date("d-m-Y"); ?><br>
                  <b>Addhar No:</b> <?php echo $single_customer_details_fetch[0]["CUSTOMER_ADHAR_NO"] ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>NAME</th>
                      <th>MODEL</th>
                      <th>QUANTITY</th>
                      <th>PRICE</th>
                      <th>TOTAL</th>
                      <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody class="addToBill">
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <!-- section for customer loan details form -->
                  <div class="card card-danger paymentForm">
              <div class="card-header">
                <h3 class="card-title">PAYMENT DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                <div class="form-group row">
                    <label for="productDiscount" class="col-sm-6 col-form-label">DISCOUNT</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="productDiscount" value="0" placeholder="DISCOUNT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="iniztialPayment" class="col-sm-6 col-form-label">INIZIAL PAYMENT</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="0" id="iniztialPayment" placeholder="INIZTIAL PAYMENT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label" >BALANCE AMOUNT</label>
                    <div class="col-sm-6">
                      <input type="text"  class="form-control" id="balanceAmount" placeholder="BALANCE AMOUNT" disabled>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
                   


                   <!--End of customer loan details form -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                 
                   <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Grand Total: Rs</th>
                        <td><div class="grandTotalDetailView"></div></td>
                      </tr>
                      <tr>
                        <th>Inizitial Payment: Rs</th>
                        <td><div class="iniztialPaymentDetailView"></div></td>
                      </tr>
                      <tr>
                        <th>Discount Amount: Rs</th>
                        <td><div class="discountPaymentDetailView"></div></td>
                      </tr>
                      <tr>
                        <th>Balance: Rs</th>
                        <td><div class="balanceDetailView"></div></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 
                  <button type="button" class="btn btn-success float-right submitLoan"><i class="far fa-credit-card"></i> Submit
                    Payment
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
