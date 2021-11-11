<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
   //section to fetch districts form databse 
   $sql_to_fetch_district = "SELECT * FROM districts";
   $stmt_to_fetch_district = $conn->prepare($sql_to_fetch_district);
   $stmt_to_fetch_district->execute();
   $district_list_fecthed = $stmt_to_fetch_district->fetchAll(PDO::FETCH_ASSOC);
   //end section to fetch districts form databse  
   //section to fetch collection unpaidList report form databse 
   $sql = "SELECT * FROM collectionListView Where `COLLECTION_ON_DATE`<CURRENT_DATE";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $collection_report_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //end section to fetch collection unpaidList report form databse  
   $total_amount=0;
   $total_balance=0;
   
    foreach ($collection_report_fecthed as $key => $collection) {
        
        $total_amount+=$collection['LN_TAB_TOTAL_AMOUNT'];
        $total_balance+=$collection['LN_TAB_BALANCE_AMOUNT'];
        
    } 
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
            <section class="content-header">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col col-md-3">
            <div class="form-group">
              <label>SELECT DISTRICT</label>
              <span id="unpaid_report_to_district_error" class="error invalid-feedback">Please Choose District</span>
              <select class="form-control " id="unpaid_report_to_district" style="width: 100%;" tabindex="-1"
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
              <span id="unpaid_report_to_area_error" class="error invalid-feedback">Please Choose Area</span>
              <select class="form-control  inputDisabled " id="unpaid_report_to_area" style="width: 100%;" tabindex="-1"
                aria-hidden="true" disabled>
                <option selected="selected" value="0">CHOOSE THE AREA</option>
              </select>
            </div>
          </div>
          <div class="col col-md-1">
            <div class="form-group mt-4 p-1">
              <button type="button" id="unpaid_get_report" class="btn btn-success"><i class="fas fa-search mt-1 p-1"></i></button>
            </div>
          </div>
          <div class="col col-md-3">
          <div class="form-group">
              <label for="report_total">TOTAL AMOUNT</label>
              <input type="text" class="form-control" id="report_total" value="<?php echo $total_amount ?>" placeholder="TOTAL AMOUNT" disabled>
            </div>
          </div>
          <div class="col col-md-2">
          <div class="form-group">
              <label for="report_balance">BALANCE AMOUNT</label>
              <input type="text" class="form-control" id="report_balance" value="<?php echo $total_balance ?>" placeholder="BALANCE AMOUNT" disabled>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
               <!-- <h3>UNPAID LIST REPORT</h3> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-striped" id="unpaidListReportTable">
                    <thead>
                        <tr role="row">
                            <th>S.NO</th>
                            <th>CUSTOMER ID</th>
                            <th>F-NAME</th>
                            <th>DISTRICT</th>
                            <th>AREA</th>
                            <th>TOTAL AMOUNT</th>
                            <th>BALANCE AMOUNT</th>
                            <th>DUE DATE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="unpaid_list_report_insert">
                        <?php 
                       
                       $status="";
                       $unpaidFor="";
                      
                      foreach($collection_report_fecthed  as $sno=> $collection_list)
                      {
                           $date_today=date("Y-m-d");
                           $due_date=$collection_list['COLLECTION_ON_DATE'];
                        //    var_dump($due_date);
                            
                                $difference_date=round(abs(strtotime($date_today) - strtotime($due_date))/86400);
                                 if($difference_date<=7)
                                 {
                                     $status="success";
                                     $unpaidFor=$difference_date."-days";
                                 }
                                 elseif($difference_date<=14)
                                 {
                                     $status="info";
                                     $unpaidFor=$difference_date."-days";
                                 }
                                 elseif($difference_date<=21)
                                 {
                                     $status="warning";
                                     $unpaidFor=$difference_date."-days";
                                 }
                                 elseif($difference_date<=26)
                                 {
                                     $status="danger";
                                     $unpaidFor=$difference_date."-days";
                                 }
                            

                       echo '<tr>
                        <td>'.++$sno.'</td>
                        <td>'.$collection_list['CUSTOMER_ID'].'</td>
                        <td>'.$collection_list['CUSTOMER_FIRST_NAME'].'</td>
                        <td>'.$collection_list['DISTRICT_NAME'].'</td>
                        <td>'.$collection_list['AREA_NAME'].'</td>
                        <td>'.$collection_list['LN_TAB_TOTAL_AMOUNT'].'</td>
                        <td>'.$collection_list['COLLECTION_BALANCE_AMOUNT'].'</td>
                        <td>'.$collection_list['COLLECTION_ON_DATE'].'</td>
                        <td><span class="badge bg-'.$status.'">'.$unpaidFor.'</span></td>
                        </tr>';
                        
                      }
                     ?>
                    </tbody>
                </table>
            </div>
            <!-- /.content -->
        </div>
        <?php
  include_once("./assets/js_links.php");
?>