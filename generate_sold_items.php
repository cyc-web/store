<?php
require_once"conn.php";
require_once"functions.php";
ini_set('max_execution_time', 600000);
ini_set('mysqli.connect_timeout', 30000);

if(!isset($_SESSION["id"])) 
{
 
session_unset();
session_destroy();
header ("location:index.php");

} 
//include "conn.php";

$query = "";
if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM admin  WHERE  email='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $user_id=$row['id'];
    $name = $row['surname'];
    $tasks = $row['task_id'];
    $userss = explode(",", $tasks);


?>
<?php
        if (in_array(5, $userss)) {
      
?>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard </title>
  

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  
  
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

     
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="post">
      <div class="input-group input-group-sm">
      <label for="">From</label>&nbsp;&nbsp;&nbsp;
        <input class="form-control form-control-navbar" name="date1" type="date" required>&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="">To</label>&nbsp;&nbsp;&nbsp;
        <input class="form-control form-control-navbar" name="date2" type="date" required>
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" name="sumit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php echo $name?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      
    </ul>
  </nav>

<?php include "sidebar.php"?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
           

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Generate Report</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
		<div class="btn-group" style=" padding: 10px;">
			<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     <span class="glyphicon glyphicon-th-list"></span> Export to
   
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    
								<li><a href="#" onclick="$('#employees').tableExport({type:'sql'});" style="padding-left:10px"> SQL</a></li>
								<li class="divider"></li>
								<li><a href="#" onclick="$('#employees').tableExport({type:'csv',escape:'false'});" style="padding-left:10px"> CSV</a></li>
								
								<li><a href="#" onclick="$('#employees').tableExport({type:'excel',escape:'false'});" style="padding-left:10px"> Excel</a></li>
								
								
								
  </ul>
</div>
		</div>
	</div>	
              <table id="employees" class="table table-bordered table-striped">
                <thead>
               <tr>
                    <th>Units</th>
                    <th>Items</th>
                    <th>Amount</th>
                    <th>Total</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
               <?php

                  if (isset($_POST['sumit'])) {
                    # code...
                    $date1=$_POST['date1'];
                    $date2= $_POST['date2'];
                    echo "Showing record (s)"."between". ' '. $date1. "and". $date2;
                    $total = 0;
                    $stotal =0;
                    $ptotal = 0;
                    $svtotal = 0;
                    $dtotal = 0;
                    $pcost =0;
                    $gp = 0;

                    $sql="SELECT  items.qty,items.cost, allitems.amount, allitems.sqty, allitems.items, allitems.sale_date FROM allitems inner join items on items.item=allitems.items WHERE allitems.sale_date BETWEEN '$date1' AND '$date2'";
                    if ($result=$conn->query($sql)) {
                      # code...
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                        # code...
                        $qty=$row['qty'];
                        $qty2=$row['sqty'];
                        $cost = $row['cost'];
                        $amount = $row['amount'];
                        $sale_date = $row['sale_date'];
                        $tsold = $amount * $qty2;
                        $pvat = 7.5 / 100 * $cost; 
                        $svat = 7.5 / 100 * $amount;
                        $diff = $svat - $pvat;
                        $stotal += $tsold;
                        $ptotal += $pvat;
                        $svtotal += $svat;
                        $dtotal += $diff;
                        $pcost += $cost;
                        $gp = $stotal - $pcost;
                      
                    
                  
                  ?>
                  <tr>
                    <td><?php echo $row['sqty']?></td>
                    <td><?php echo $row['items']?></td>
                    <td><?php echo $row['amount']?></td>
                    
                    <td><?php echo $tsold?></td>
                    
                  </tr>
                <?php }}?>
                <?php
                $all = 0;
                $exp = 0;
                $sql2="SELECT * FROM expenses WHERE date_added BETWEEN '$date1' AND '$date2'";
                if($result=$conn->query($sql2)){
                  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                    # code...
                    $price= $row['price'];
                    $all += $price;
                    $exp = $gp - $all;
                 

                ?>
              <?php }}?>
                <tr>
                   <td colspan="" style="text-align: ; font-size: 18px; font-weight: bold;">Total </td><td></td><td></td><td colspan="" style="text-align: ; font-size: 18px; font-weight: bold;"><?php echo $stotal?></td>
                </tr>
                
                
              <?php }?>
                </tbody>
               
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
  
</div>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>





<!-- PAGE SCRIPTS -->

<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
	$('#example').DataTable();
      }); 
</script>
</body>
<?php } else{?>
<?php 
session_unset();
session_destroy();
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>



