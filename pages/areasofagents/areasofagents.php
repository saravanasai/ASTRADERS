<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";



if(isset($_GET['id']))
{
    $agent_id=$_GET['id'];

       


     //section for fetching then agent by id from agents table
     $sql_for_agent = "SELECT * FROM `agents`,districts WHERE `AGENT_ID`=:id AND agents.AGENT_FOR_CITY=districts.DISTRICT_ID";
     $stmt_for_agent = $conn->prepare($sql_for_agent);
     $stmt_for_agent->bindParam('id',$agent_id);
     $stmt_for_agent->execute();
     $agent_list_fecthed = $stmt_for_agent->fetchAll(PDO::FETCH_ASSOC);
       
     //end section for fetching then agent by id from agents table

      //section to fetch the avaliable areas

      $sql="SELECT * FROM agents_to_area,areas,districts,agents WHERE 
      agents.AGENT_FOR_CITY=:disid 
      AND `AREA_TO_AGENT` IS NULL 
      AND areas.AREA_ID=agents_to_area.AREA_ID_AG
      AND agents.AGENT_FOR_CITY=districts.DISTRICT_ID
      AND agents_to_area.AREA_TO_DISTRICT=:disid GROUP BY `AREA_ID_AG`" ;

          //group by query
    //       SELECT * FROM `agents_to_area`,areas,districts,agents WHERE 
    //   agents.AGENT_FOR_CITY=1 
    //   AND `AREA_TO_AGENT` IS NULL 
    //   AND areas.AREA_ID=agents_to_area.AREA_ID_AG
    //   AND agents.AGENT_FOR_CITY=districts.DISTRICT_ID
    //   AND agents_to_area.AREA_TO_DISTRICT=1 GROUP BY `AREA_ID_AG`

       
      $stmt=$conn->prepare($sql);
      $stmt->bindParam('disid',$agent_list_fecthed[0]['AGENT_FOR_CITY']);
      $stmt->execute();
      $areas_by_district_fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
      //end section to fetch the avaliable areas 


    //SECTION FOR FETCHING THE DATA FROM agents_to_area_view by Agents id

    $sql_for_agent_areas = "SELECT * FROM `agents_to_area_view` WHERE `AREA_TO_AGENT`=$agent_id";
    $stmt_for_agents_areas = $conn->prepare($sql_for_agent_areas);
    $stmt_for_agents_areas->execute();
    $agents_area_list_fecthed = $stmt_for_agents_areas->fetchAll(PDO::FETCH_ASSOC);

    // end SECTION FOR FETCHING THE DATA FROM agents_to_area_view by Agents id

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
    <div class="card card-danger">
            <div class="card-header">
                 <div class="row">
                     <div class="col col-md-2">
                       Areas Of Agent
                     </div>
                     <div class="col col-md-3">
                       Name:  <?php echo  $agent_list_fecthed[0]['AGENT_NAME']  ?>
                     
                     </div>
                      <div class="col col-md-3">
                      Phone Number:  <?php echo  $agent_list_fecthed[0]['AGENT_PHONE_NUMBER']  ?>
                     </div>
                     <div class="col col-md-3">
                      AGENT DISTRICT:  <?php echo  $agent_list_fecthed[0]['DISTRICT_NAME']  ?>
                     <input type="hidden" id="area_add_to_agent_id" value="<?php echo$agent_list_fecthed[0]['AGENT_ID'] ?>">
                    </div>
                 </div>
            </div>
            <div class="card-body p-0">
              <div class="row">
                  <div class="col col-md-6">
                      <div class="card card-warning mt-3 ml-2">
                          <div class="card-header">
                              <h4 class="card-title">Current Areas</h4>
                          </div>
                          <div class="card-body">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>District Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php foreach($agents_area_list_fecthed as $agents_area_list){ ?>
                                            <tr>
                                                <td><?php echo $agents_area_list["AREA_NAME"] ?></td>
                                                <td><?php echo $agents_area_list["DISTRICT_NAME"] ?></td>
                                                <td class=" py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <button id="<?php echo $agents_area_list["AG_TO_AREA_ID"] ?>" class="btn btn-danger removearea"><i class="fas fa-trash"></i></button>
                                                </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
                          </div>
                           
                      </div>
                        
                  </div>
                  <div class="col col-md-6">
                  <div class="card card-success mt-3 ml-2 mr-2">
                          <div class="card-header">
                              <h4 class="card-title">Areas Available</h4>
                          </div>
                          <div class="card-body">
                            <table class="table" id="areas_available_table">
                                        <thead>
                                            <tr>
                                                <th>Area Name</th>
                                                <th>District Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <?php foreach($areas_by_district_fetch as $areas_by_district){ ?>
                                                <tr>
                                                    <td><?php echo $areas_by_district["AREA_NAME"] ?></td>
                                                    <td><?php echo $areas_by_district["DISTRICT_NAME"] ?></td>
                                                    <td class=" py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <button  id="<?php echo $areas_by_district["AG_TO_AREA_ID"] ?>" class="btn btn-success addtoAgentarea"><i class="fas fa-plus"></i></button>
                                                       
                                                    </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                    </table>
                          </div>
                  </div>

                  </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    <!-- /.content -->
    </div>

<?php
include_once "./assets/js_links.php";
?>
