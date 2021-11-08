<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
   
   //section to fetch districts form databse 
   $sql = "SELECT * FROM agents";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $agent_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <label>SELECT AGENT</label>
                            <span id="report_of_agent_error" class="error invalid-feedback">Please Choose
                                Agent</span>
                            <select class="form-control " id="report_to_agent" style="width: 100%;" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" value="0">SELECT AGENT</option>
                                <?php 
                      
                      foreach($agent_list_fecthed as $agent_list)
                      {
                        echo '
                        <option value="'.$agent_list["AGENT_ID"].'">'.$agent_list["AGENT_NAME"].'--'.$agent_list["AGENT_PHONE_NUMBER"].'</option>';
                      }
                     ?>
                            </select>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="form-group">
                            <label>FROM DATE:</label>
                            <div class="input-group date"  >
                                <input type="date" id="from_date" class="form-control">
                                <div class="input-group-append" >
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="form-group">
                            <label>TO DATE:</label>
                            <div class="input-group date" >
                                <input type="date" class="form-control"  id="to_date">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-1 mt-1">
                        <div class="form-group mt-4 p-1">
                            <button type="button" id="refreshbtn" class="btn btn-sm btn-success"><i
                                    class="fas fa-redo-alt mt-1 p-1"></i>Load</button>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="form-group">
                            <label for="report_total">TOTAL AMOUNT</label>
                            <input type="text" class="form-control" id="agent_report_total" placeholder="TOTAL" disabled>
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
                <table class="table table-bordered table-striped" id="viewAgentReportTable">
                    <thead>
                        <tr role="row">
                            <th>LN ID</th>
                            <th>CUSTOMER ID</th>
                            <th>NAME</th>
                            <th>DISTRICT</th>
                            <th>AREA</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody id="agent_report_insert">
                        <tr id="loading_spinner">
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