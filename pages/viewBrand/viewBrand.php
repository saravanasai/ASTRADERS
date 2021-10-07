<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
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
            <div class="card">
              <div class="card-header  bg-danger">
                <h3 class="card-title">BRAND LIST </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">S.NO</th>
                      <th>BRAND NAME</th>
                       <th style="width: 40px">ACTION</th>
                     </tr>
                  </thead>
                  <tbody>
                   <?php
foreach ($brand_list_fecthed as $sno => $brand_list) {
    echo '<tr>
                     <td>' . ++$sno . '</td>
                    
                     <td>
                       ' . $brand_list["BRAND_NAME"] . '
                     </td>
                      <td>
                     <button type="button" class="btn btn-sm btn-danger deletebrand"  id=' . $brand_list["BRAND_ID"] . '>DELETE
                     </button>
                     </td>

                   </tr>';

}
?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
