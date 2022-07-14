<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

$sql = "SELECT * FROM `collectionListView` WHERE LN_TAB_BALANCE_AMOUNT>0 AND LN_TAB_TOTAL_AMOUNT>0 AND LN_STATUS=1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$collection_list_view_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching
?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Collection View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="btn btn-sm btn-primary"><a class="text-white" href="<?php echo "index.php" ?>"><i class="fa fa-cubes px-1" aria-hidden="true"></i>
                                Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card table-responsive p-3">
                    <table class="table table-striped text-nowrap table-bordered " id="viewProductTable">
                        <thead>
                            <tr>
                                <th style="width: 10px">S.NO</th>
                                <th style="width: 10px">CUS ID</th>
                                <th>NAME</th>
                                <th>PHONE NO</th>
                                <th>DISRICT</th>
                                <th>TOTAL AMOUNT</th>
                                <th>BALANCE AMOUNT</th>
                                <th>DATE</th>
                                <th style="width: 40px">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($collection_list_view_fetch as $sno => $collection_list_view) {
                                echo '<tr>
                                        <td>' . ++$sno . '</td>
                                        <td>' . $collection_list_view["CUSTOMER_ID"] . '</td>
                                        <td>' . $collection_list_view["CUSTOMER_FIRST_NAME"] . '</td>
                                        <td>
                                        ' . $collection_list_view["CUSTOMER_PHONE_NUMBER"] . '
                                        </td>
                                        <td>
                                        ' . $collection_list_view["DISTRICT_NAME"] . '
                                    </td>
                                    <td>
                                    ' . $collection_list_view["LN_TAB_TOTAL_AMOUNT"] . '
                                </td>
                                <td>
                                ' . $collection_list_view["LN_TAB_BALANCE_AMOUNT"] . '
                                </td>
                                <td>
                                ' . $collection_list_view["LN_ON_DATE"] . '
                            </td>
                                        
                                        <td>
                                        <a href="index.php?status=payLoan&LOAN_ID=' . $collection_list_view["LOAN_ID"] . '&CUS_ID=' . $collection_list_view["CUSTOMER_ID"] . '" class="btn btn-success btn-sm"><i class="fas fa-calculator px-1"></i>PAY NOW</a>
                                        </td>
                                    </tr>';
                            }
                            ?>
                    </div>
                </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
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