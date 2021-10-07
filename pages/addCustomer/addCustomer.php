<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");

  //SECTION FOR FETCHING THE DATA FROM AREAS TABLE

  $sql = "SELECT  * FROM districts";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $district_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching




   
 ?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">ADD NEW CUSTOMER</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="new_customer_creation">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerFirstName">FIRST NAME*</label>
                                    <input type="text" class="form-control" id="customerFirstName"
                                        placeholder="Enter customer First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerLastName">LAST NAME*</label>
                                    <input type="text" class="form-control" id="customerLastName"
                                        placeholder="Enter customer Last Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerPhoneNumber">PHONE NUMBER(optional)</label>
                                    <input type="text" class="form-control" id="customerPhoneNumber"
                                        placeholder="Enter customer Phone Number">
                                </div>
                            </div>
                        </div>
                        <!-- second row of form -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerEmail">EMAIL(optional)</label>
                                    <input type="text" class="form-control" id="customerEmail"
                                        placeholder="Enter customer Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerAdharNo">AADHAR NUMBER (optional)</label>
                                    <input type="text" class="form-control" id="customerAdharNo"
                                        placeholder="Enter customer Adhar Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CUSTOMER CITY*</label>
                                    <select class="form-control " id="customerDistrict" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                        <option selected="selected" value="0">CHOOSE THE CITY</option>
                                        <?php 
                      
                      foreach($district_list_fecthed as $district_list)
                      {
                        echo '
                        <option value="'.$district_list["DISTRICT_ID"].'">'.$district_list["DISTRICT_NAME"].'</option>';
                      }
                     ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CUSTOMER AREA*</label>
                                    <select class="form-control  inputDisabled " id="customerArea" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true" disabled>
                                        <option selected="selected" value="0">CHOOSE THE CITY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customerAddress">CUSTOMER ADDRESS*</label>
                                    <textarea type="text" class="form-control" rows="3" id="customerAddress"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer ">
                            <div class="float-right">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-success addcus">ADD CUSTOMER</button>
                                <button type="submit" class="btn btn-warning" id="takeLoanBtn">ADD CUSTOMER & TAKE
                                    LOAN</button>
                            </div>
                        </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->
</div>
<?php
  include_once("./assets/js_links.php");
?>