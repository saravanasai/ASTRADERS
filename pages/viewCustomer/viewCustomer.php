<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM CUSTOMERS MASTER TABLE

$sql = "SELECT * FROM `customerMasterView` WHERE  CUSTOMER_STATUS=1  ORDER BY `customerMasterView`.`CUSTOMER_ID` ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$customer_Master_view_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

// END SECTION FOR FETCHING THE DATA FROM CUSTOMERS MASTER TABLE


//section for handling the customer update

if (isset($_POST["customerupdateForm"])) {

    $error = array("error_first_name" => "", "error_last_name" => "","error_phone_number" => "","error_district" => "","error_city" => "","error_address" => "");
    $validation_status = true;
    $customer_update_to_id = $_POST["cutomerUpdateId"];
    $customer_first_update_name = $_POST["customerFirstNameUpdate"];
    $customer_last_update_name = $_POST["customerLastNameUpdate"];
    $customer_phone_number_update = $_POST["customerPhoneNumberUpdate"];
    $customer_email_update = $_POST["customerEmailUpdate"];
    $customer_adhar_no_update = $_POST["customerAdharNumberUpdate"];
    $customer_district_update = $_POST["customerDistrictUpdate"];
    $customer_area_update = $_POST["customerUpdateArea"];
    $customer_address_update = $_POST["customerAddressUpdate"];

    //section for validating the updated area information

    if ($customer_area_update == "") {
        $error["error_city"] = "ENTER THE AREA NAME";
        $validation_status = false;
    }
    if ($customer_district_update == "") {
        $error["error_district"] = "ENTER THE DISTRICT NAME";
        $validation_status = false;
    }
    if ($customer_first_update_name == "") {
        $error["error_first_name"] = "ENTER THE FIRST NAME";
        $validation_status = false;
    }
    // if ($customer_last_update_name == "") {
    //     $error["error_last_name"] = "ENTER THE LAST NAME";
    //     $validation_status = false;
    // }
    // if ($customer_phone_number_update == ""||strlen($customer_phone_number_update)>10||strlen($customer_phone_number_update)<10||
    // !is_numeric($customer_phone_number_update)) {
    //     $error["error_last_name"] = "ENTER THE PHONE NUMBER PROPERLY";
    //     $validation_status = false;
    // }
    if ($customer_address_update == "") {
        $error["error_address"] = "ENTER THE ADDRESS ";
        $validation_status = false;
    }


    //section for updating the area information to database
     

    if ($validation_status) {

        $sql = "UPDATE `customerMasterView` SET 
        `CUSTOMER_FIRST_NAME`=:customerFirstName,
        `CUSTOMER_LAST_NAME`=:customerLastName,
        `CUSTOMER_PHONE_NUMBER`=:customerPhoneNumber,
        `CUSTOMER_EMAIL`=:customerEmail,
        `CUSTOMER_ADHAR_NO`=:customerAdhar,
        `CUSTOMER_DISTRICT`=:customerDistrict,
        `CUSTOMER_CITY`=:customerArea,
        `CUSTOMER_ADDRESS`=:customerAddress WHERE `CUSTOMER_ID`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id", $customer_update_to_id);
        $stmt->bindParam("customerFirstName", $customer_first_update_name);
        $stmt->bindParam("customerLastName", $customer_last_update_name);
        $stmt->bindParam("customerPhoneNumber", $customer_phone_number_update);
        $stmt->bindParam("customerEmail", $customer_email_update);
        $stmt->bindParam("customerAdhar", $customer_adhar_no_update);
        $stmt->bindParam("customerDistrict", $customer_district_update);
        $stmt->bindParam("customerArea", $customer_area_update);
        $stmt->bindParam("customerAddress", $customer_address_update);

        if ($stmt->execute()) {
             
            var_dump($customer_area_update);

            echo '<script>
              swal("UPDATED", "THE CUSTOMER DETAILS", "success").then(()=>{
                window.location.href = "./index.php?status=viewCustomer"; 
              });
           </script>';
        } else {
            echo '<script>
              swal("OPPS!", "SOMETHING WENT WRONG", "error").then(()=>{
                window.location.href = "./index.php?status=viewCustomer"; 
              });
           </script>';
        }
    } else {
        echo '<script>
      swal("OPPS!", "CHECK ALL THE ARE VALID ", "error");
      </script>';
    }

    //END OF customer UPDATION SECTION








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
        <div class="" style="height:200px;">
            <table class="table table-striped table-responsive table-head-fixed text-nowrap table-bordered" id="viewAreaTable">
                <thead>
                    <tr>
                        <th style="width: 10px">S.NO</th>
                        <th>CUSTOMER ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>PH NUMBER</th>
                        <th>AREA NAME</th>
                        <th>DISTRICT NAME</th>
                        <th style="width: 40px">ACTION</th>
                        <th style="width: 40px">DELETE</th>
                        <th style="width: 40px">TRANSACTION</th>
                        <th style="width: 40px">TAKE LOAN</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="card table-responsive">
                        <?php
                        foreach ($customer_Master_view_list_fecthed as $sno => $customer_Master_view_list) {
                             
                            $statusColor="danger";
                            $statusText="DELETE";
                            $takeloanbuttonstatus="";
                            $deactivateRedirection="";
                            if($customer_Master_view_list["CUSTOMER_STATUS"]==0)
                            {
                                $statusColor="info";
                                $statusText="DISABLED";
                                $takeloanbuttonstatus="disabled";
                                $deactivateRedirection="no";
                            }

                            echo '<tr>
                     <td>' . ++$sno . '</td>
                     <td>' . $customer_Master_view_list["CUSTOMER_ID"] . '</td>
                     <td>' . $customer_Master_view_list["CUSTOMER_FIRST_NAME"] . '</td>
                     <td>
                       ' . $customer_Master_view_list["CUSTOMER_LAST_NAME"] . '
                     </td>
                     <td>
                       ' . $customer_Master_view_list["CUSTOMER_PHONE_NUMBER"] . '
                     </td>
                     <td>
                     ' . $customer_Master_view_list["AREA_NAME"] . '
                     </td>
                     <td>
                     ' . $customer_Master_view_list["DISTRICT_NAME"] . '
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-warning customerViewModel" data-toggle="modal" id='.$customer_Master_view_list["CUSTOMER_ID"]. ' data-target="#modal-lg">
                      EDIT
                      
                      </button>
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-'.$statusColor.' deleteCustomer"  id=' . $customer_Master_view_list["CUSTOMER_ID"]  . '>'.$statusText.'
                     </button>
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-success loanTransaction"  id=' . $customer_Master_view_list["CUSTOMER_ID"]  . '>TRANSACTION
                     </button>
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-success takeLoanRedirect'.$deactivateRedirection.' '.$takeloanbuttonstatus.'"  id=' . $customer_Master_view_list["CUSTOMER_ID"]  . '>TAKE LOAN
                     </button>
                    
                     </td>
                   </tr>';
                        }
                        ?>
                </tbody>
                
            </table>
        
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
                    <h5 class="modal-title" id="staticBackdropLabel">EDIT CUSTOMER DETAIL</h5>
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