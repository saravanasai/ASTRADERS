<?php

include("../../config.php");

// ********important fetching is done from addcustomer module php file to get diristcs on area*******


//SECTION FOR FETCHING THE DATA FROM districts TABLE
$sql_for_district = "SELECT * FROM districts";
$stmt_for_dsitrict = $conn->prepare($sql_for_district);
$stmt_for_dsitrict->execute();
$district_list_fecthed = $stmt_for_dsitrict->fetchAll(PDO::FETCH_ASSOC);
$district_list_view_on_modal = "";

foreach ($district_list_fecthed as $district_list) {
    $district_list_view_on_modal .= '
  <option value="' . $district_list["DISTRICT_ID"] . '">' . $district_list["DISTRICT_NAME"] . '</option>';
}
//end of the districts list fetching





//section for fetching and showing the customer view data in model
if (isset($_POST["id"])) {

    $id = $_POST["id"];

    $sql = "SELECT * FROM `customermaster`,`districts`,`areas` WHERE CUSTOMER_ID=:id AND DISTRICT_ID =CUSTOMER_DISTRICT AND  AREA_ID=CUSTOMER_CITY  ;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("id", $id);
    $stmt->execute();


    $single_Customer_Detail_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    foreach ($single_Customer_Detail_fetch as $single_customer_details) {

        echo '<form id="customerupdateForm" method="post">
    <div class="card-body">
       <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="customerUpdateName">FIRST NAME</label>
                    <input type="text" class="form-control" id="customerUpdateName" name="customerFirstNameUpdate" placeholder="FIRST NAME" value="' . $single_customer_details["CUSTOMER_FIRST_NAME"] . '">
                    </div>
               </div>
               <div class="col-md-4">
                    <div class="form-group">
                    <label for="customerLastNameUpdate">LAST NAME</label>
                    <input type="text" class="form-control" id="customerLastNameUpdate" name="customerLastNameUpdate" placeholder="LAST NAME" value="' . $single_customer_details["CUSTOMER_LAST_NAME"] . '">
                    </div>
                </div>
               <div class="col-md-4">
                    <div class="form-group">
                    <label for="customerPhoneNumberUpdate">PHONE NUMBER</label>
                    <input type="text" class="form-control" id="customerPhoneNumberUpdate" name="customerPhoneNumberUpdate" placeholder="Phone Number" value="' . $single_customer_details["CUSTOMER_PHONE_NUMBER"] . '">
                    </div>
               </div>
            </div>
   
           <div class="row">
              <div class="col-md-4">
                    <div class="form-group">
                    <label for="customerEmailUpdate">EMAIL</label>
                    <input type="text" class="form-control" id="customerEmailUpdate" name="customerEmailUpdate" placeholder="Email" value="' . $single_customer_details["CUSTOMER_EMAIL"] . '">
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                    <label for="customerAdharNumberUpdate">ADHAR NUMBER</label>
                    <input type="text" class="form-control" id="customerAdharNumberUpdate" name="customerAdharNumberUpdate" placeholder="Adhar Number" value="' . $single_customer_details["CUSTOMER_ADHAR_NO"] . '">
                    </div>
             </div>
             <div class="col-md-4">
                    <div class="form-group">
                    <label>DISTRICT</label>
                    <select class="form-control" id="customerDistrictUpdate" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="customerDistrictUpdate">
                    <option selected="selected" value="' . $single_customer_details["CUSTOMER_DISTRICT"] . '">' . $single_customer_details["DISTRICT_NAME"] . '</option>
                    "' . $district_list_view_on_modal . '"
                    </select>
                    </div>
             </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>AREA</label>
                    <select class="form-control" id="customerAreaUpdate" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="customerUpdateArea" >
                    <option selected="selected" value="'. $single_customer_details["AREA_ID"] . '">' . $single_customer_details["AREA_NAME"] . '</option>
                    </select>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                    <label for="customerAddressUpdate">ADDRESS</label>
                    <textarea type="text" row="2" class="form-control" id="customerAddressUpdate" name="customerAddressUpdate" placeholder="customer Address" >' . $single_customer_details["CUSTOMER_ADDRESS"] . '</textarea>
                    </div>
               </div>
    </div>
   </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-warning float-right" name="customerupdateForm">UPDATE</button>
      <input type="hidden"  name="cutomerUpdateId" value="' . $single_customer_details["CUSTOMER_ID"] . '">
    </div>
  </form>';
    }
}
