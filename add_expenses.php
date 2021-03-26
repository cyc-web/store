<?php
    include"head.php";
        if (in_array(2, $userss)) {
      
?>

<?php include "head.php"?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php include "navbar.php"?>
<?php include "sidebar.php"?>

<?php
error_reporting(0);
//session_start();
include 'conn.php';
$id = $_GET['id'];
//$am=$_GET['amount'];
$price=0;
$sql="SELECT * FROM items WHERE id='$id'";
$result=$conn->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);
$id= $row['id'];
$item= $row['item'];
$amount= $row['amount'];
//$amount = $_GET['amount'];
//$price = $_POST['price'];
//$total = $amount + $rice;
if (isset($_POST['sub'])) {
	# code...
	$new=$_POST['new'];
	$item=$_POST['item'];
	$price += $new;
	$sql1="UPDATE items SET amount='$price', item='$item', user='$user' where id='$id'";
	$conn->query($sql1);

echo "<script>alert ('Price updated successfully');</script>";
echo "<script> window.open ('available_items.php', '_self');</script>";

}



//$order = array('item'=>$item, 'amount'=>$amount, 'qty'=>$qty, 'total'=>$total);
//array_push($cart, $order);
//$_SESSION['cart'] = $cart;
//header('location:pos.php');
?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expenses Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Expenses Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Expenses
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
               
               <p style="color: red; font-size: 20px; margin-top: 50px; text-align: center;">Please make sure that the items typed in excel and save as csv(comma delimited) in the below format</p>
        <div style="max-width: 700px; margin: auto; margin-top: 50px;">
          
          <form method="POST" action="functions.php" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <label>Please select the month and year</label>
              <input type="date" name="date_added" class="form-control" required=""><br>

            <div class="form-group">
              <input type="file" name="file" accept=".csv" required="">
            </div>
          
            <button type="submit" name="up" class="btn btn-info">Upload</button>
          </form>
        </div>
          <table class="table table-bordered" style="margin-top: 50px;">
            <tr>
            <th>Name of the item</th>
            <th>Amount being spent</th>
          </tr>
          </table>
              </div>
               
              </div>
             
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
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


