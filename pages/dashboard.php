<?php
include_once("./assets/css_links.php");
//adding a database config file
include_once("./config.php");
// SECTION TO FETCHING TOTAL TODAY SALES
$sql_today_total_sales = "SELECT SUM(`TR_AMOUNT_PAID`) as totalSales FROM `loanTransaction` WHERE `TR_COMMIT_STATUS`=1" ;
$stmt_to_today_sales = $conn->prepare($sql_today_total_sales);
$stmt_to_today_sales->execute();
$today_total_collection_amount_fetch = $stmt_to_today_sales->fetchAll(PDO::FETCH_ASSOC);
// END SECTION TO FETCHING TOTAL TODAY SALES
?>
<div class="content-wrapper" style="min-height: 1419.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="container">
    <!-- row_1 -->

    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo '?status=masterCollectionList' ?>">
          <div class="info-box text-dark">
            <span class="info-box-icon bg-danger"><i class="fas fa-hand-holding-usd"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-grey">COLLECTION LIST</span>
              <span class="info-box-number">AS TRADERS</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo '?status=addCustomer' ?>">
          <div class="info-box text-dark">
            <span class="info-box-icon bg-success"><i class="fas fa-plus-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NEW CUSTOMER</span>
              <span class="info-box-number">REGISTERATION</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      </a>
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo '?status=newLoan' ?>">
          <div class="info-box text-dark">
            <span class="info-box-icon bg-warning"><i class="far fa-money-bill-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> TAKE LOAN</span>
              <span class="info-box-number">EXSITING CUSTOMER</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      </a>
      <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo '?status=viewCustomer' ?>">
          <div class="info-box text-dark">
            <span class="info-box-icon bg-info"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ALL CUSTOMERS</span>
              <span class="info-box-number">LIST VIEW</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      </a>
    </div>
    <!-- end of row _1 -->
  </div>
  <!-- start of second row    -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <?php if($today_total_collection_amount_fetch[0]["totalSales"]){ ?>
            <h3><?php echo $today_total_collection_amount_fetch[0]["totalSales"]; ?></h3>
            <?php }else{?>
            <h3><?php echo 0 ?></h3>
            <?php }?>
            <p>TODAY TRANSACTIONS</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo '?status=todayTransaction'; ?>" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>MORE<sup style="font-size: 20px"></sup></h3>

            <p>DETAIL OF COLLECTION</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?php echo '?status=singleAgentcollection'; ?>" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner text-white">
            <h3>REPORTS</h3>

            <p>ADMIN REPORTS</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo '?status=Reports'; ?>" class="small-box-footer text-white">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- <div class="col-lg-3 col-6"> -->
      <!-- small box -->
      <!-- <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      <!-- ./col -->
    </div>
    <!-- end of second row    -->
  </div>
  <div class="container">
    <div class="row">
      <div class="col col-md-6">
        <canvas id="myChart"></canvas>
      </div>
      <div class="col col-md-6">
        <div class="">
          <div class="card-body">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <canvas id="pieChart"
              style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;"
              class="chartjs-render-monitor" width="627" height="250"></canvas>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<?php
include_once("./assets/js_links.php");
?>
<!-- script for bar chart  -->
<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Balance', 'Customers', 'Agents','Collection' ],
      datasets: [{
        label: '# of Sales',
        data: [<?php echo $Total_collection_count?>, <?php echo $Total_customer_count ?>,<?php echo $Total_agent_count?>,<?php echo $Total_Today_collection_count ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'   
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- end script for bar chart  -->
<!-- script for bar chart  -->
<script>
  var ctx = document.getElementById('pieChart');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        'Balance', 'Customers', 'Agents','Collection'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [<?php echo $Total_collection_count?>, <?php echo $Total_customer_count ?>, <?php echo $Total_agent_count?>,<?php echo $Total_Today_collection_count ?>],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgba(0, 165, 16, 1)',
          'rgb(255, 205, 86)',
          'rgba(0, 138, 237, 1)'
        ],
        hoverOffset: 4
      }],
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    },
    circumference: 1
  });
</script>
<!-- end script for bar chart  -->