<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
  
//section to validate if user redircted form customerMaster view
 
  if(isset($_GET["CUS_ID"]))
  {
       $customer_id=$_GET["CUS_ID"];
        
       
       //section for getting the detials of existing customer
       $sql="SELECT * FROM `loanMaster` WHERE `LN_TO_CUSTOMER`=:id AND `LN_STATUS`=1;" ;

       $stmt=$conn->prepare($sql);
       $stmt->bindParam("id",$customer_id);
        $stmt->execute();
      
      
       $single_customer_details_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
           //section to validate weather the customer loan exists
                      if(count($single_customer_details_fetch)>0)
                      {
                        echo '<script>
                        swal({
                          title: "LOAN EXIST TO CUSTOMER?",
                          text: "press Ok to Proceed!",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        }).then((willDelete) => {
                          if (willDelete) {
                            swal("Your approved To Loan").then(()=>{
                              window.location.href="index.php?status=takeLoan&CUS_ID='.$customer_id.'";
                            });
                          } else {
                            swal("DENIED TO TAKE LOAN").then(()=>{
                              window.location.href="index.php?status=viewCustomer";
                            });
                          }
                        });
                            
                               </script>';
                            }
                      else
                      {
                        echo '<script>
                        
                        swal("NO LOAN EXTISTS").then(()=>{

                          window.location.href="index.php?status=takeLoan&CUS_ID='.$customer_id.'";
                        })
                             
                        </script>';
                      }

           //end section to validate weather the customer loan exists
    
        // end section for getting the detials of existing customer



  }
   


//end section to validate if user redircted form customerMaster view

?>
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

      




    <!-- /.content -->
</div>
<?php
include_once "./assets/js_links.php";
?>