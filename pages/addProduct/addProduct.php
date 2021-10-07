<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
  //SECTION FOR FETCHING THE DATA FROM AREAS TABLE

  $sql = "SELECT * FROM brand";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $brand_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h3 class="card-title">ADD NEW PRODUCTS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="new_product_creation">
                <div class="card-body">
                  <div class="form-group">
                    <label for="productName">PRODUCTS NAME</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group" >
                  <label>PRODUCT BRAND*</label>
                  <select class="form-control productBrand" id="productBrand" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                  <option selected="selected" value="0">CHOOSE THE BRAND</option>
                    <?php 
                      
                      foreach($brand_list_fecthed as $brand_list)
                      {
                        echo '
                        <option value="'.$brand_list["BRAND_ID"].'">'.$brand_list["BRAND_NAME"].'</option>';
                      }
                     ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="productModel">PRODUCTS MODEL</label>
                    <input type="text" class="form-control" id="productModel" placeholder="Enter Product details">
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="productPrice">PRODUCTS PRICE</label>
                    <input type="text" class="form-control" id="productPrice" placeholder="Enter Product Price">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label for="productQunatity">PRODUCTS QUANTITY</label>
                    <input type="text" class="form-control" id="productQunatity" placeholder="Enter Product Quantity">
                    </div>
                  </div>
                  </div>
                 
                  <!-- /.card-body -->

                <div class="card-footer ">
                <div class="float-right">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-success">ADD PRODUCT</button>
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
