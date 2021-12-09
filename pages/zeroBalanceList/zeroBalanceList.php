<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
    //section to fetch districts form databse 
    $sql = "SELECT * FROM `customerZeroBalanceListView`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $collection_list_view_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
     
   //end section to fetch districts form databse  
 ?>

<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="container mt-3">
        <div class="col-md-12">
        <div class="callout callout-danger">
              <h5><i class="fas fa-info px-2"></i>Important</h5>
               This List Shows The Customer With Zero Balance Of Payment
            </div>
        </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-striped" id="ZeroBalanceListTable">
                    <thead>
                        <tr role="row">
                            <th>S.NO</th>
                            <th>CUSTOMER ID</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="sales_report_insert">
                        <?php  
                      foreach($collection_list_view_fetch  as $sno=> $list_with_zero_balance)
                      {
                       echo '<tr>
                        <td>'.++$sno.'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_ID'].'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_FIRST_NAME'].'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_LAST_NAME'].'</td>
                        <td><button type="button" class="btn btn-sm btn-danger deleteCustomerFromZeroList"  id=' . $list_with_zero_balance["CUSTOMER_ID"].'><i class="fas fa-user-times px-1"></i>Delete</button></td>
                        </tr>';
                      }
                     ?>
                    </tbody>
                </table>
            </div>
            <!-- /.content -->
        </div>
        <?php
  include_once("./assets/js_links.php");
?>