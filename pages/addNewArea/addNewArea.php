<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
 
  //SECTION FOR FETCHING THE DATA FROM AREAS TABLE

   
  $sql = "SELECT * FROM districts";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $districts_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
//end of the disricts list fetching



   
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
                <h3 class="card-title">ADD NEW AREA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="new_area_creation">
                <div class="card-body">
                  <div class="form-group">
                    <label for="areaName">AREA NAME</label>
                    <input type="text" class="form-control" id="areaName" placeholder="Enter Area Name">
                  </div>
                  <div class="form-group">
                    <label for="areaDistrict">AREA DISTRICT</label>
                    <select class="form-control" id="areaDistrict" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                  <option selected="selected" value="0">CHOOSE THE DISTRICT</option>
                    <?php 
                      foreach($districts_list_fecthed as $district_list)
                      {
                        echo '
                        <option value="'.$district_list["DISTRICT_ID"].'">'.$district_list["DISTRICT_NAME"].'</option>';
                      }
                     ?>
                  </select>
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer ">
                <div class="float-right">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-success">ADD AREA</button>
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
