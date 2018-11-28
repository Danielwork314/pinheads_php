<!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li>Dashboard</li>
            </ol>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        </ol>
    </section>

	  <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>All Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Ongoing Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Outstanding Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>

        <div class="mediumBox">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h4 class="whiteTitle" style='display: inline-block;'>Total Sales Chart</h4>
                    </div>
                    <div class="box box-default">
                        <div class="box-header user-panel">
                            <?php if($multiple != 1){ ?>
                                <div id="mychart" style="height: 250px;"></div>
                            <?php } else { ?>
                                <div id="myfirstchart" style="height: 250px;"></div>
                            <?php } ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
            
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'mychart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2008', value: 20 },
                { year: '2009', value: 10 },
                { year: '2010', value: 5 },
                { year: '2011', value: 5 },
                { year: '2012', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });


        new Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { label: '2008', value: 20 },
                { label: '2009', value: 10 },
                { label: '2010', value: 5 },
                { label: '2011', value: 5 },
                { label: '2012', value: 20 }
            ]
        });
        // var dashboard = document.getElementById("bar-chart").getContext('2d');
        // var myChart = new Chart(dashboard, {
        //     type: 'bar',
        //     data: {
        //         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //         datasets: [{
        //             label: 'Year <?= $total_sales_year ?> Total Sales',
        //             data: [<?= $total_sales_report["jan"] ?>,
        //                 <?= $total_sales_report["feb"] ?>,
        //                 <?= $total_sales_report["mar"] ?>,
        //                 <?= $total_sales_report["apr"] ?>, 
        //                 <?= $total_sales_report["may"] ?>,
        //                 <?= $total_sales_report["jun"] ?>,
        //                 <?= $total_sales_report["jul"] ?>,
        //                 <?= $total_sales_report["aug"] ?>,
        //                 <?= $total_sales_report["sep"] ?>,
        //                 <?= $total_sales_report["oct"] ?>,
        //                 <?= $total_sales_report["nov"] ?>,
        //                 <?= $total_sales_report["dec"] ?>
        //             ],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)',
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });
    </script>