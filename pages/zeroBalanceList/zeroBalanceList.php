<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
    //section to fetch customer with zero balance 
    $sql = "SELECT * FROM `customerZeroBalanceListView` ORDER BY `customerZeroBalanceListView`.`CUSTOMER_ID` ASC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $collection_list_view_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //end section to fetch customer with zero balance  

  

 ?>

<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="container mt-3">
            <div class="col-md-12">
                <div class="callout callout-danger">
                    <div class="row">
                        <div class="col-md-9">
                        <h5><i class="fas fa-info px-2"></i>Important</h5>
                            This List Shows The Customer With Zero Balance Of Payment
                        </div>
                        <div class="col-md-3">
                            <div class="float-right mt-3 ">
                            <button type="button" id="zero_balance_list_select_all" class="btn btn-warning btn-sm "><i class="fa fa-minus-square px-1" aria-hidden="true"></i>SELECT ALL</button>
                            <button type="button" id="zero_balance_list_multiple_del" class="btn btn-danger btn-sm "><i class="fas fa-user-times px-1"></i>DELETE</button>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped" id="ZeroBalanceListTable">
                    <thead>
                        <tr role="row">
                            <th></th>
                            <th>S.NO</th>
                            <th>CUSTOMER ID</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>TRANSACTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="sales_report_insert">
                        <form action="" id="mutiple_row_delete_form" method="post">
                        <?php  
                      foreach($collection_list_view_fetch  as $sno=> $list_with_zero_balance)
                      {
                       echo '<tr>
                       <td class=""> <input type="checkbox" id="'.$list_with_zero_balance['CUSTOMER_ID'].'" name="zeroBalanceCustomerID" value="'.$list_with_zero_balance['CUSTOMER_ID'].'"></td>
                        <td>'.++$sno.'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_ID'].'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_FIRST_NAME'].'</td>
                        <td>'.$list_with_zero_balance['CUSTOMER_LAST_NAME'].'</td>
                        <td><a href="?status=viewTransaction&cus_id_transaction=' . $list_with_zero_balance["CUSTOMER_ID"].'" class="btn btn-sm btn-primary "  id=' . $list_with_zero_balance["CUSTOMER_ID"].'><i class="fas fa-file-download px-1"></i>Transaction</a></td>
                        <td><button type="button" class="btn btn-sm btn-warning deleteCustomerFromZeroList"  id=' . $list_with_zero_balance["CUSTOMER_ID"].'><i class="far fa-trash-alt px-2"></i>Delete</button></td>
                        </tr>';
                      }
                     ?>
                     </form>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <?php
  include_once("./assets/js_links.php");
?>