<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


//section for handling the products update

if (isset($_POST["updateForm"])) {

    $error = array("error_product_name" => "", "error_product_brand" => "", "error_product_model_no" => "", "error_product_price" => "", "error_product_quantity" => "");
    $validation_status = true;
    $product_update_to_id = $_POST["ProductUpdateId"];
    $product_update_name = $_POST["productNameUpdate"];
    $product_update_brand = $_POST["productBrandUpdate"];
    $product_update_model = $_POST["productmodelUpdate"];
    $product_update_price = $_POST["productPriceUpdate"];
    $product_update_quantity = $_POST["productQuantityUpdate"];




    //section for validating the updated product information

    if ($product_update_name == "") {
        $error["error_product_name"] = "ENTER THE PRODUCT NAME";
        $validation_status = false;
    }
    if ($product_update_brand == "") {
        $error["error_product_brand"] = "ENTER THE PRODUCT NAME";
        $validation_status = false;
    }
    if ($product_update_model == "") {
        $error["error_product_model_no"] = "ENTER THE MODEL NO";
        $validation_status = false;
    }
    if ($product_update_price == "" || !is_numeric($product_update_price)) {
        $error["error_product_price"] = "ENTER THE PRICE UPDATE";
        $validation_status = false;
    }
    if ($product_update_quantity == "" || !is_numeric($product_update_quantity)) {
        $error["error_product_quantity"] = "ENTER THE QUANTITY UPDATE";
        $validation_status = false;
    }


    //section for updating the area information to database


    if ($validation_status) {

        $sql = "UPDATE products SET PRODUCT_NAME=:name,PRODUCT_BRAND=:brand,PRODUCT_MODEL_NO=:model,PRODUCT_PRICE=:price,PRODUCT_QUANTITY=:quantity WHERE PRODUCT_ID=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id", $product_update_to_id);
        $stmt->bindParam("name", $product_update_name);
        $stmt->bindParam("brand", $product_update_brand);
        $stmt->bindParam("model", $product_update_model);
        $stmt->bindParam("price", $product_update_price);
        $stmt->bindParam("quantity", $product_update_quantity);


        if ($stmt->execute()) {
            echo '<script>
              swal("UPDATED", "THE PRODUCT DETAILS", "success").then(()=>{
                window.location.href = "./index.php?status=viewProduct"; 
              });
           </script>';
        } else {
            echo '<script>
              swal("OPPS!", "SOMETHING WENT WRONG", "error").then(()=>{
                window.location.href = "./index.php?status=viewProduct"; 
              });
           </script>';
        }
    } else {
        echo '<script>
      swal("OPPS!", "CHECK ALL THE ARE VALID ", "error");
      </script>';
    }

    //END OF PRODUCT UPDATION SECTION







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
                    <table class="table table-striped table-head-fixed text-nowrap table-bordered " id="viewProductTable">
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