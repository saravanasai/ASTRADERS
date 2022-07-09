
    <div class="col-md-12 col-sm-12"  x-data="dashboardCompnent()">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Today Status</h5>
                <div class="card-tools">
                    <a href="<?= '?status=reverseDayClose'  ?>" class="btn btn-primary">
                        <i class="fa fa-recycle px-1"></i>
                        Reverse Day Close
                    </a>
                    <a href="<?= '?status=todayReport'  ?>" class="btn btn-success">
                        <i class="fas fa-arrow-circle-right px-1"></i>
                        Get Report
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-md-4">
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
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;" class="chartjs-render-monitor" width="627" height="250"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <!-- <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">$<span x-text="count"></span></h5>
                            <span class="description-text">TOTAL STOCK VALUE</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">

                            <h5 class="description-header">$ 0</h5>
                            <span class="description-text">ESTIMATED COLLECTION</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">

                            <h5 class="description-header">$ 0</h5>
                            <span class="description-text">TOTAL COLLECTED</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            <h5 class="description-header">$ 0</h5>
                            <span class="description-text">BALANCE</span>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>

    </div>


<script>
    function dashboardCompnent() {

        return {

            count: 0

        }


    }
</script>