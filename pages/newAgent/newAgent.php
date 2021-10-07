<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
  //SECTION FOR FETCHING THE DATA FROM AREAS TABLE

  $sql = "SELECT * FROM districts";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $district_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h3 class="card-title">ADD NEW AGENT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="new_agent_creation_form">
                <div class="card-body">
                  <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                        <label for="agentName">AGENT NAME*</label>
                        <input type="text" class="form-control" id="agentName" placeholder="Enter Agent Name">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                        <label for="agentPhoneNumber">AGENT PHONE NUMBER*</label>
                        <input type="text" class="form-control" id="agentPhoneNumber" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                          <label for="agentAdharNumber">AGENT ADHAR NUMBER*</label>
                          <input type="text" class="form-control" id="agentAdharNumber" placeholder="Adhar Number">
                        </div>
                    </div>
                   
                   
                  </div>
                 
                 
                      <div class="row">
                          <div class="col col-md-4">
                            <div class="form-group">
                              <label>DISTRICT TO AGENT*</label>
                                <select class="form-control " id="agentCity" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                  <option selected="selected" value="0">CHOOSE THE CITY</option>
                                    <?php 
                                      
                                      foreach($district_list_fecthed as $district_list)
                                      {
                                        echo '
                                        <option value="'.$district_list["DISTRICT_ID"].'">'.$district_list["DISTRICT_NAME"].'</option>';
                                      }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-8">
                               <div class="text-danger" id="error_area"></div>
                            <div class="select2-danger" >
                              <div class="form-group">
                              <label for="agent_to_area">AGENT AREA*</label>
                                  <select class="select2 inputDisabled y-2"  name="areas[]" multiple="multiple" data-placeholder="Select a City" id="agent_to_area" data-dropdown-css-class="select2-danger" style="width: 100%;"  tabindex="-1" aria-hidden="true" disabled>
                                   
                                  </select>
                              </div>
                          </div>
                        </div>
                      </div>
                 
                  <div class="form-group">
                    <label for="agentAddress">AGENT ADDRESS</label>
                    <textarea type="text" class="form-control" rows="3" id="agentAddress" >Agent Address</textarea>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer ">
                <div class="float-right">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-success">ADD AGENT</button>
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
