
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

$sql = "SELECT * FROM products,brand where BRAND_ID=PRODUCT_BRAND";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching

//product over-all stock value
$productStockValue = 0;

?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Stock Report</h1>
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
            <div class="" style="height:200px;">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Stocks Report
                        </h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-nowrap table-bordered" id="viewProductTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.NO</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT BRAND</th>
                                    <th>PRODUCT MODEL</th>
                                    <th>PRODUCT PRICE</th>
                                    <th>PRODUCTS REMIANS</th>
                                    <th>STOCK VALUE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="card table-responsive">
                                    <?php
                                    foreach ($products_list_fecthed as $sno => $product_list) {

                                        $productStockValue += $product_list["PRODUCT_QUANTITY"] * $product_list["PRODUCT_PRICE"];

                                        echo '<tr>
                                            <td>' . ++$sno . '</td>
                                            <td>' . $product_list["PRODUCT_NAME"] . '</td>
                                            <td>
                                            ' . $product_list["BRAND_NAME"] . '
                                            </td>
                                            <td>
                                            ' . $product_list["PRODUCT_MODEL_NO"] . '
                                        </td>
                                        <td>
                                        ' . $product_list["PRODUCT_PRICE"] . '
                                        </td>
                                        <td>
                                        ' . $product_list["PRODUCT_QUANTITY"] . '
                                        </td>
                                            <td>
                                            ' . $product_list["PRODUCT_QUANTITY"] * $product_list["PRODUCT_PRICE"] . '
                                            </td>
                                        </tr>';
                                    }
                                    ?>
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto float-right">
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Total Stock Value:</a>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> <span class="px-2"><?= $productStockValue ?></span>
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
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
                    <h5 class="modal-title" id="staticBackdropLabel">PRODUCT DETAILS</h5>
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