<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";

//SECTION FOR FETCHING THE LAST THREE DATE FROM todayTransactionView 

$sql = "SELECT * FROM `todayTransactionView` WHERE `TR_COMMIT_STATUS`=0 GROUP BY `TR_DATE` ORDER by `TR_DATE` DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->execute();
$avaliabe_dates_to_reverse = $stmt->fetchAll(PDO::FETCH_ASSOC);

//END SECTION FOR FETCHING THE LAST THREE DATE FROM todayTransactionView






?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DAY CLOSE REVERSAL</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-danger">
                        <h5><i class="fas fa-info"></i> <strong>Note:</strong> </h5>
                        This Feature Consume More Server Resource & Makes The System Unstable use it as Minimal As Possible.
                        <p class="text-danger">* Before Reversing the day close Please ensure All other days are closed only One Day can be open at once.</p>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe px-2"></i>AS TRADERS
                                    <small class="float-right">Current Date: <?= date("d-m-Y");   ?></small>
                                </h4>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Day Close Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($avaliabe_dates_to_reverse as $key => $item) {
                                            ++$key;
                                            $badge = $item['TR_COMMIT_STATUS'] == 0 ? '<small class="badge badge-success"><i class="far fa-clock px-1"></i>Closed</small>' : '<small class="badge badge-danger"><i class="far fa-clock px-1"></i>Open</small>';
                                            $diabledStatus = $item['TR_COMMIT_STATUS'] == 0 ? false : true;
                                            echo "<tr>
                                                    <td>{$key}</td>
                                                    <td>{$item['TR_DATE']}</td>
                                                    <td>{$badge}</td>
                                                    <td><button data-id='{$item['TR_DATE']}' disable='{$diabledStatus}' type='button' id='reverse_day_btn' class='btn btn-sm btn-danger'><i class='fa fa-exclamation-triangle px-2'></i>Reverse</button></td>
                                                </tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php
include_once "./assets/js_links.php";
?>