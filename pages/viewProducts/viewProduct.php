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
      <table class="table table-striped table-head-fixed text-nowrap table-bordered " id="viewProductTable">


        <thead>
          <tr>
            <th style="width: 10px">S.NO</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT BRAND</th>
            <th>PRODUCT MODEL</th>
            <th>PRODUCT PRICE</th>
            <th>PRODUCTS REMIANS</th>
            <th style="width: 40px">ACTION</th>
            <th style="width: 40px">DELETE</th>


          </tr>
        </thead>
        <tbody>
          <div class="card table-responsive">
            <?php
            foreach ($products_list_fecthed as $sno => $product_list) {
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
                     <button type="button" class="btn btn-sm btn-warning productViewModel" data-toggle="modal" id=' . $product_list["PRODUCT_ID"] . ' data-target="#modal-lg">

                     <i class="far fa-edit"></i> EDIT
                      </button>
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-danger deleteProduct"  id=' . $product_list["PRODUCT_ID"] . '><i class="fas fa-trash-alt px-1"></i>DELETE
                     </button>
                    </td>
                 </tr>';
            }
            ?>
          </div>
        </tbody>
      </table>

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