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
            <h1>Amount Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Amount Page</li>
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
                Amount
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
               
                <form role="form" action="" method="POST">
                 <div class="card-body">
                  <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                <div class="form-group">
              <label>Item</label>
              <input type="text" name="item" value="<?php echo $item?>" required="" placeholder="Enter the item name" class="form-control">
            </div>
            
            <div class="form-group">
              <label>Amount</label>
              <input type="text" name="new" value="" required="" placeholder="Enter the item amount per one" class="form-control">
            </div>

                   
                  <button type="submit" name="sub" class="btn btn-primary">Update</button> <a href="available_items.php" class="btn btn-info">Back</a>
                </div>
              </form>
               
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



