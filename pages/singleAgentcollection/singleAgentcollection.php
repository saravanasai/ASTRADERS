<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";





    //SECTION FOR FETCHING THE DATA FROM agents_to_area_view by Agents id

    $sql = "SELECT * FROM `agents`,districts WHERE `AGENT_STATUS`='ACTIVE' 
    AND districts.DISTRICT_ID=agents.AGENT_FOR_CITY";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $agents_total_collection_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // end SECTION FOR FETCHING THE DATA FROM agents_to_area_view by Agents id

 
  
   


?>
 <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="container p-0">
    <div class="card card-danger">
            <div class="card-header">
                 COLLECTION AMOUNT BY INDIVIDUAL
            </div>
           
          
            <div class="card-body table-responsive p-0">
                <table class="table table-striped ">
                  <thead>
                  <tr>
                    <th>AGENT NAME</th>
                    <th>PHONE NUMBER</th>
                    <th>AGENT DISTRICT</th>
                    <th>MORE DETAILS</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach($agents_total_collection_list as $agents_overall_cl_detail){ ?>
                    <tr>
                    <td>
                      <?php echo $agents_overall_cl_detail['AGENT_NAME'];?>
                    </td>
                    <td>   <?php echo $agents_overall_cl_detail['AGENT_PHONE_NUMBER'];?></td>
                    <td>
                    <?php echo $agents_overall_cl_detail['DISTRICT_NAME'];?>
                    </td>
                    <td>
                    <button type="button" class="btn btn-sm btn-success agentcollection"  id='<?php echo $agents_overall_cl_detail["AGENT_ID"] ?>'>
                    <i class="fa fa-book px-2"></i>
                         Details
                       </button>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              
            </div>
            </div>
            <!-- /.card-body -->
          </div>
    <!-- /.content -->
    </div>

<?php
include_once "./assets/js_links.php";
?>
