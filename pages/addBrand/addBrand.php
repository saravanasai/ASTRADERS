<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");

   
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
                <h3 class="card-title">ADD NEW BRAND</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="new_brand_creation">
                <div class="card-body">
                  <div class="form-group">
                    <label for="brandName">BRAND NAME</label>
                    <input type="text" class="form-control" id="brandName" placeholder="Enter Brand Name">
                  </div>
                 <!-- /.card-body -->

                <div class="card-footer ">
                <div class="float-right">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-success">ADD BRAND</button>
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
