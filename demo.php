<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

// $sql = "SELECT * FROM products,brand where BRAND_ID=PRODUCT_BRAND";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $products_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching

?>
<div class="content-wrapper" style="min-height: 1419.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Demo Stater Page</h1>
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
              Demo Starter Page
            </h3>
            <div class="card-tools">

            </div>
          </div>
          <div class="card-body">

          </div>
          <div class="card-footer">

          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
  </section>
  <!-- /.content -->
</div>

<?php
include_once "./assets/js_links.php";
?>