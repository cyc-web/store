<?php
include"head.php";
        if (in_array(5, $userss) || in_array(7, $userss)) {
      
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
            <h1 class="m-0 text-dark">Dashboard v2</h1>
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
          <div class="col-12 col-sm-6 col-md-4">
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
          <div class="col-12 col-sm-6 col-md-4">
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

          <div class="col-12 col-sm-6 col-md-4">
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
          
          <!-- /.col -->
        </div>
        
      </div><!--/. container-fluid -->
    </section>
     <section class="content">
      <div class="row">
        <div class="col-12">
           

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sales report</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Invoice No.</th>
                    <th>Amount</th>
                    <th>Sold by</th>
                    <th>Date</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php include 'conn.php';
                    $reports= getReport();
                    $sn=0;
                    foreach ($reports as $report) {
                      # code...
                      $invoiceno=$report['invoiceno'];
                      //$amount=$item['amount'];
                    
                  ?>
                  <tr>
                    <td><?php echo ++$sn;?></td>
                    <td><?php echo $report['invoiceno'];?></td>
                    <td><?php echo $report['total'];?></td>
                    <td><?php echo $report['user_id'];?>  <?php echo $report['name'];?></td>
                    <td><?php echo $report['sale_date'];?></td>
                    <td style="text-align: center;"><a href="view.php?v=<?php echo $invoiceno?>" class="btn btn-primary btn-lg">view</a></td>
                  </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Invoice No.</th>
                    <th>Amount</th>
                    <th>Sold by</th>
                    <th>Date</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </tfoot>
              </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include"footer.php"?>
</div>
</body>
<?php } else{?>
<?php 
session_unset();
session_destroy();
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>



