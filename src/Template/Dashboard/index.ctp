<section class="content" id="chartBox">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <span id="totalProj">00</span>
                        <span class="overlay" id="totalPLoader">
                            <i class="fa fa-refresh fa-spin"></i>
                        </span>
                    </h3>

                    <p>Projects at Hand</p>
                </div>
                <div class="icon">
                    <i class="ion ion-code-working"></i>
                </div>
                <a href="./projects/info" class="small-box-footer">Get My Projects&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <span id="overall_rating">00</span>
                        <sup style="font-size: 20px">%</sup>
                        <span class="overlay" id="totalRLoader">
                            <i class="fa fa-refresh fa-spin"></i>
                        </span>
                    </h3>

                    <p>Overall Ratings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="./ratings/add" class="small-box-footer">Give Rating &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <span id="totalEmp">00</span>
                        <span class="overlay" id="totalELoader">
                            <i class="fa fa-refresh fa-spin"></i>
                        </span>
                    </h3>

                    <p>Total Employees</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="./users/info" class="small-box-footer">Get User Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <span id="totalFeedbacks">00</span>
                        <span class="overlay" id="totalFLoader">
                            <i class="fa fa-refresh fa-spin"></i>
                        </span>
                    </h3>

                    <p>Today's Feedbacks</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
                <a href="./feedbacks/read" class="small-box-footer">Read Feedbacks<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="chartBoxHeading">
                        <span id="BoxHead">Weekly Ratings Analogy</span>
                    </h3>
                    <div class="pull-right" id="mode_button">
                        <a href="#" class="btn btn-primary btn-xs">
                            <span id="mode">Monthly Ratings</span>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
<!--                            <p class="text-center">-->
<!--                                <strong id="chartBoxDateRange">Ratigns: 1 Jan, 2014 - 30 Jul, 2014</strong>-->
<!--                            </p>-->

                            <div class="chart" id="chart_draw_block">
                                <!-- Sales Chart Canvas -->
                                <canvas id="rateChart" style="height: 180px;"></canvas>
                                <span class="overlay" id="ChartLoader">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </span>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <h3 class="text-center">
                                <strong>Rating Statics</strong>
                            </h3>
                            <hr>
                            <div class="description-block border-right">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header"><strong>
                                        <u id="lastMode">LAST WEEK</u>
                                    </strong></span>
                            </div>
                            <div class="description-block border-right col-sm-6">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header">HIGHEST RATING</span>
                                <p class="description-text text-success" id="lastHighVal">10</p>
                            </div>
                            <div class="description-block border-right col-sm-6">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header">LOWEST RATING</span>
                                <p class="description-text text-danger" id="lastLowVal">0</p>
                            </div>
                            <hr>
                            <div class="description-block border-right">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header"><strong>
                                        <u id="currentMode">CURRENT WEEK</u>
                                    </strong></span>
                            </div>
                            <div class="description-block border-right col-sm-6">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header">HIGHEST RATING</span>
                                <p class="description-text text-success" id="currentHighVal">10</p>
                            </div>
                            <div class="description-block border-right col-sm-6">
                                <!--                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                                <span class="description-header">LOWEST RATING</span>
                                <p class="description-text text-danger" id="currentLowVal">0</p>
                            </div>

                            <div class="overlay" id="SideDetailLoader">
                                <i class="fa fa-refresh fa-spin"></i>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>

<?php $this->start('scriptBottom'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script>
    $(document).ready(function () {
        drawChart(1);
        $('#mode_button').click(function () {
            var mode=$('#mode').html().toString();

            if(mode === 'Monthly Ratings')
            {
                //Show Loader
                $('#ChartLoader').show();
                $('#SideDetailLoader').show();
                //
                drawChart(2);
                $('#mode').html('Weekly Ratings');
                $('#BoxHead').html('Monthly Ratings Analogy');
                $('#lastMode').html('LAST MONTH');
                $('#currentMode').html('CURRENT MONTH');
            }
            else
            {
                //Show Loader
                $('#ChartLoader').show();
                $('#SideDetailLoader').show();
                //
                drawChart(1);
                $('#mode').html('Monthly Ratings');
                $('#BoxHead').html('Weekly Ratings Analogy');
                $('#lastMode').html('LAST WEEK');
                $('#currentMode').html('CURRENT WEEK');
            }
        });


        setTotalEmployees();
        setTotalFeedbacks();
        setTotalProjects();
    });
    function drawChart(option) {
        $.ajax({
            type: "GET",
            url : "ratings/report-json?option="+option,
            success :function (data) {
                var info=$.parseJSON(data);
                if(option == 1){
                    var dataset1_heading='This Week';
                    var dataset2_heading='Last Week';
                }
                else if(option == 2){
                    var dataset1_heading='This Month';
                    var dataset2_heading='Last Month';
                }

                //empty chart section before redrawing it
                $('#chart_draw_block').empty();
                $('#chart_draw_block').html('<canvas id=rateChart style="height: 180px;"></canvas>');
                //
                var chrt=document.getElementById('rateChart').getContext('2d');
                var myChart = new Chart(chrt, {
                    type: 'bar',
                    data: {
                        labels:info[2],
                        datasets: [{
                            label: dataset1_heading,
                            data: info[0],
                            backgroundColor: '#FFAB00'
                        },{
                            label: dataset2_heading,
                            data: info[1],
                            backgroundColor: '#D50000'
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                stacked: false
                            }],
                            yAxes: [{
                                stacked: false
                            }]
                        }
                    }
                });

                $('#lastHighVal').html(info[4]);
                $('#currentHighVal').html(info[3]);
                $('#lastLowVal').html(info[7]);
                $('#currentLowVal').html(info[6]);

                //getting percentage of overall rating
                var overall_rating=Math.round(info[5]*1000)/100;
                $('#overall_rating').html(overall_rating);

                //Hiding Loader

                $('#totalRLoader').hide();
                $('#ChartLoader').hide();
                $('#SideDetailLoader').hide();
            },
            error   :function (data) {

            }
        });
    }
    function setTotalProjects() {
        $.ajax({
            type: "GET",
            url : "projects/report-json?option=1",
            success :function (data) {
                var info =$.parseJSON(data);
                $('#totalProj').html(info[0]);
                $('#totalPLoader').hide();
            },
            error   :function (data) {

            }
        });
    }
    function setTotalEmployees() {
        $.ajax({
            type: "GET",
            url : "users/report-json?option=1",
            success :function (data) {
                var info =$.parseJSON(data);
                $('#totalEmp').html(info[0]);
                $('#totalELoader').hide();
            },
            error   :function (data) {

            }
        });
    }
    function setTotalFeedbacks() {
        $.ajax({
            type: "GET",
            url : "feedbacks/report-json?option=1",
            success :function (data) {
                var info =$.parseJSON(data);
                $('#totalFeedbacks').html(info[0]);
                $('#totalFLoader').hide();
            },
            error   :function (data) {

            }
        });
    }
</script>
<?php $this->end(); ?>
