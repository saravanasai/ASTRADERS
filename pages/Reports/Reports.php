<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
   
   //section to fetch districts form databse 
   $sql = "SELECT * FROM districts";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $district_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //end section to fetch districts form databse  
 ?>
<!-- styles for loader -->
<style>
  .lds-hourglass {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
  }
  .lds-hourglass:after {
    content: " ";
    display: block;
    border-radius: 50%;
    width: 0;
    height: 0;
    margin: 8px;
    box-sizing: border-box;
    border: 32px solid red;
    border-color: red transparent red transparent;
    animation: lds-hourglass 1.2s infinite;
  }
  @keyframes lds-hourglass {
    0% {
      transform: rotate(0);
      animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }
    50% {
      transform: rotate(900deg);
      animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    100% {
      transform: rotate(1800deg);
    }
  }
  
</style>
<!--end styles for loader -->
<div class="content-wrapper" style="min-height: 1419.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col col-md-3">
            <div class="form-group">
              <label>SELECT DISTRICT</label>
              <span id="report_to_district_error" class="error invalid-feedback">Please Choose District</span>
              <select class="form-control " id="report_to_district" style="width: 100%;" tabindex="-1"
                aria-hidden="true">
                <option selected="selected" value="0">CHOOSE THE DISTRICT</option>
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
          <div class="col col-md-3">
            <div class="form-group">
              <label>SELECT AREA</label>
              <span id="report_to_area_error" class="error invalid-feedback">Please Choose Area</span>
              <select class="form-control  inputDisabled " id="report_to_area" style="width: 100%;" tabindex="-1"
                aria-hidden="true" disabled>
                <option selected="selected" value="0">CHOOSE THE AREA</option>
              </select>
            </div>
          </div>
          <div class="col col-md-1">
            <div class="form-group mt-4 p-1">
              <button type="button" id="get_report" class="btn btn-success"><i class="fas fa-search mt-1 p-1"></i></button>
            </div>
          </div>
          <div class="col col-md-3">
          <div class="form-group">
              <label for="report_total">TOTAL</label>
              <input type="text" class="form-control" id="report_total" placeholder="TOTAL" disabled>
            </div>
          </div>
          <div class="col col-md-2">
          <div class="form-group">
              <label for="report_balance">BALANCE</label>
              <input type="text" class="form-control" id="report_balance" placeholder="BALANCE" disabled>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="container">
   
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-striped" id="viewReportTable">
                <thead>
                  <tr role="row">
                    <th>CUS ID</th>
                    <th>NAME</th>
                    <th>INVOICE NO</th>
                    <th>TOTAL</th>
                    <th>BALANCE</th>
                    <th>LN DATE</th>
                  </tr>
                </thead>
                <tbody id="report_insert">
                  <tr id="loading_spinner" >
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>   
                </tbody>
              </table>
            </div>
        <!-- /.content -->
      </div>
      <?php
  include_once("./assets/js_links.php");
?>