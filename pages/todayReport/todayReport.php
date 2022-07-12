<?php
include_once("./assets/css_links.php");
//adding a database config file
include_once("./config.php");

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
            <h4 class="mb-2">COLLECTION SPLIT REPORT</h4>
            <div class="row">
                <div class="col col-md-3">
                    <div class="form-group">
                        <label>SELECT DISTRICT</label>
                        <span id="report_to_district_error" class="error invalid-feedback">Please Choose District</span>
                        <select class="form-control " id="today_report_to_district" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option selected="selected" value="0">CHOOSE THE DISTRICT</option>
                            <?php
                            foreach ($district_list_fecthed as $district_list) {
                                echo '
                        <option value="' . $district_list["DISTRICT_ID"] . '">' . $district_list["DISTRICT_NAME"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-group">
                        <label>SELECT AREA</label>
                        <div class="select2-danger">
                            <span id="report_to_area_error" class="error invalid-feedback">Please Choose Area</span>
                            <select class="select2  inputDisabled" name="today_report_area[]" data-placeholder="CHOOSE THE AREA" multiple="multiple" id="today_report_to_area" data-dropdown-css-class="select2-danger" style="width: 100%;" tabindex="-1" aria-hidden="true" disabled>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-group">
                        <label>COLELCTION DATE</label>
                        <span id="today_report_date_error" class="error invalid-feedback">Please Choose Date</span>
                        <input type="date" class="form-control" id="today_report_date" placeholder="Collection Date">
                    </div>
                </div>
                <div class="col col-md-1">
                    <div class="form-group mt-4 p-1">
                        <button type="button" id="get_today_report" class="btn btn-success"><i class="fas fa-search mt-1 p-1"></i></button>
                    </div>
                </div>

                <div class="col col-md-2">
                    <div class="form-group">
                        <label for="report_balance">ESTIMATED COLLECTION</label>
                        <input type="text" class="form-control" id="report_balance" placeholder="ES-AMOUNT" disabled>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Today Collection Report
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped" id="viewTodayCollectionReportTable">
                                <thead>
                                    <tr role="row">
                                        <th>CUS ID</th>
                                        <th>NAME</th>
                                        <th>DISTRICT</th>
                                        <th>AREA</th>
                                        <th>ADDRESS</th>
                                        <th>TOTAL</th>
                                        <th>BALANCE</th>
                                        <th>LN DATE</th>
                                        <th>CL DATE</th>
                                        <th>INVOICE</th>
                                    </tr>
                                </thead>
                                <tbody id="report_insert">
                                    <tr id="loading_spinner_today_report">
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                    </div>

                </div>
                <!-- /.content -->
            </div>
    </section>
    <?php
    include_once("./assets/js_links.php");
    ?>