<?php
    include"head.php";
        if (in_array(10, $userss)) {
      
?>
<?php include "head.php"?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php include "navbar.php"?>
<?php include "sidebar.php"?>
<?php

$total=0;
$day=date("Y-m-d");
$sql1="SELECT total FROM payment WHERE sale_date like '%$day%'";
if($result=$conn->query($sql1)){
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
  # code...
  $all = $row['total'];
  $total += $all;
}
}
$total2=0;
$month=date("Y-m");

$sql2="SELECT total FROM payment WHERE sale_date like '%$month%'";
if($result=$conn->query($sql2)){
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
  # code...
  $all2 = $row['total'];
  $total2 += $all2;
}
}

$total3=0;
$year=date("Y");

$sql2="SELECT total FROM payment WHERE sale_date like '%$year%'";
if($result=$conn->query($sql2)){
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
  # code...
  $all3 = $row['total'];
  $total3 += $all3;
}
}
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Item sold today</span>
                <span class="info-box-number">
                  # <?php echo number_format($total)?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Items sold for the month</span>
                <span class="info-box-number"># <?php echo number_format($total2)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Items sold for the year</span>
                <span class="info-box-number"># <?php echo number_format($total3)?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Available items in the store</span>
                <span class="info-box-number"><?php echo $items?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Yearly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Sales for the year <?php echo date("Y")?></strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="chartjs_bar" width="100%" height="50"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <!--div class="card-footer">
                <div class="row">
                 
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
           

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>
           
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                    <th>S/N</th>
                      <th>Order ID</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php 
                     $sn =0;
            $orders = getOrders();
            foreach ($orders as $value) {
           
            ?>
            <tr>
              <td><?php echo ++$sn?></td>
              <td><?php echo $value['invoiceno']?></td>
              <td><?php echo $value['total']?></td>
            </tr>
                        
                    <?php }?>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
             <div class="card-footer clearfix">
                <a href="report.php" class="btn btn-sm btn-info float-right">View all Order</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
           
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>
               
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                          <?php 
                     $sn =0;
            $itemss = getItemss();
            foreach ($itemss as $value) {
           
            ?>
                  <li class="item">
                    <div class="product-img">
                    </div>
                    
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo $value['item']?>
                        <span class="badge badge-success float-right"><?php echo $value['qty']?></span></a>
                      
                    </div>
                  </li>
                  <?php }?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="available_items.php" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include"footer.php"?>
</div>
</body>
<?php } else{?>

<?php include "head.php"?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php include "navbar.php"?>
<?php include "sidebar.php"?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
     <h2 class="text-center">Welcome : <?php echo $name?></h2>
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include"footer.php"?>
</div>
</body>

<?php }?>

<?php error_reporting(0);
include 'conn.php';
         $sql ="SELECT * FROM allitems";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname  = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            
            $date = $row['sale_date'];
            $amount = $row['amount'];

            $newdate=explode('-', $date);
            $newyear=date("Y");
            $newmonth =date("m");
            $day = $newdate[2];
            $month = $newdate[1];
            $year = $newdate[0];
            $newM = $year ."-". $newmonth;
            
            $j = $newyear ."-". "01";
            //$sales = array($amount);
            if ($month == 01 && $year == $newyear) {
              # code...
              $jan =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$j%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $jqty =$row['sqty'];
                  $jamt = $row['amount'] * $jqty;
                  $jan += $jamt;

                }
              }
              
            }
            $f = $newyear ."-". "02";
            if ($month ==02  && $year == $newyear) {
              # code...
              $feb =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$f%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $fqty= $row['sqty'];
                  $famt = $row['amount'] * $fqty;
                  $feb += $famt;

                }
              }
              
            }
            $m = $newyear ."-". "03";
            if ($month == 03  && $year == $newyear) {
              # code...
              $march = 0;
              $sql2="SELECT * FROM allitems WHERE sale_date LIKE '%$m%'";
              if ($res =$conn->query($sql2)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $mqty = $row['sqty'];
                  $mamt = $row['amount'] * $mqty;
                  $march += $mamt;

                }
              }
              
            }
            $a = $newyear ."-". "04";
            if ($month == 04  && $year == $newyear) {
              # code...
              $april =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$a%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $aqty = $row['sqty'];
                  $aamt = $row['amount'] * $aqty;
                  $april += $aamt;

                }
              }
              
            }
            $ma = $newyear ."-". "05";
            if ($month == 05  && $year == $newyear) {
              # code...
              $may =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$ma%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $maaqty = $row['sqty'];
                  $maamt = $row['amount'] * $maaqty;
                  $may += $maamt;

                }
              }
              
            }
            $jj = $newyear ."-". "06";
            if ($month ==06  && $year == $newyear) {
              # code...
              $june =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$jj%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $jqty = $row['sqty'];
                  $jjamt = $row['amount'] * $jqty;
                  $june += $jjamt;

                }
              }
              
            }
            $jjj = $newyear ."-". "07";
            if ($month ==07  && $year == $newyear) {
              # code...
              $july =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$jjj%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $jjqt = $row['sqty'];
                  $jjjamt = $row['amount'] * $jjqt;
                  $july += $jjjamt;

                }
              }
              
            }
            $aa = $newyear ."-". "08";
            if ($month == '08'  && $year == $newyear) {
              # code...
              $aug =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$aa%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $auqt =$row['sqty'];
                  $aaamt = $row['amount'] * $auqt;
                  $aug += $aaamt;

                }
              }
              
            }
            $s = $newyear ."-". "09";
            if ($month == '09'  && $year == $newyear) {
              # code...
              $sep =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$s%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $ssq = $row['ssq'];
                  $samt = $row['amount'] * $ssq;
                  $sep += $samt;

                }
              }
              
            }
            $o = $newyear ."-". "10";
            if ($month == '10'  && $year == $newyear) {
              # code...
              $oct =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$o%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $oc =$row['sqty'];
                  $oamt = $row['amount'] * $oc;
                  $oct += $oamt;

                }
              }
              
            }
            $n = $newyear ."-". "11";
            if ($month == '11'  && $year == $newyear) {
              # code...
              $nov =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$n%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $n =$row['sqty'];
                  $namt = $row['amount'] * $n;
                  $nov += $namt;

                }
              }
              
            }
            $d = $newyear ."-". "12";
            if ($month == '12'  && $year == $newyear) {
              # code...
              $dec =0;
              $sql="SELECT * FROM allitems WHERE sale_date LIKE '%$d%'";
              if ($res =$conn->query($sql)) {
                # code...
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                  # code...
                  $d =$row['sqty'];
                  $damt = $row['amount'] * $d;
                  $dec += $damt;

                }
              }
              
            }
            $sales = array("$jan", "$feb", "$march", "$april", "$may", "$june", "$july", "$aug", "$sep", "$oct", "$nov", "$dec");
        }
 
 
 
 
 
?>


  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e",
                                "green",
                                "purple",
                                "goldenrod",
                                "blue",
                                "#336744"
                            ],
                            
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>



