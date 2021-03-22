<?php include "head.php"?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php include "navbar.php"?>
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
              <h3 class="card-title">Cart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                      <th>S/N</th>
                      <th>ITEM</th>
                      <th>QUANTITY</th>
                      <th>AMOUNT</th>
                      <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
               <?php

if(empty($_SESSION['cart'])){
  echo "Cart is empty";
  $total=0;
  $qty2 ="";
}else{
  $cart = $_SESSION['cart'];
  $total = 0;
  $sn = 0;
  $orders = "";
  foreach ($cart as $order) {
    # code...
    //echo $order['item'] . " - " . $order['amount'] . " - " . $order['total'] ."<hr>";
    //$orders = $orders. "-" . implode(',',$order);
    $total += $order['total'];
    $qty2 = $order['qty2'];
  
  //echo $total . '<br>';
  //echo $orders;
  //$_SESSION['cart'] = array();
//header('location:pos.php');
    ?>

                  <tr>
                    <td><?php echo ++$sn?></td>
                <td><?php echo $order['item']?></td>
                <td><?php echo $order['qty']?></td>
                <td><?php echo $order['amount']?></td>
                <td><?php echo $order['total']?></td>
                   </tr>

                              <?php }}?>
                 <td colspan="4" style="text-align: right;"><?php echo "Total"?></td><td colspan=""><?php echo $total?></td>
                </tbody>
               
              </table>
               <div class="row">
              <div class="col-md-6">
            <a href="check.php?qty2=" class="btn btn-success">Check Out</a>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <a href="uncheck.php" class="btn btn-danger">Empty cart</a>
          </div>
             </div>
            </div>
            <!-- /.card-body -->
          </div>
         
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S/N</th>
                <th>Item</th>
                <th>Amount</th>
                <th>Qty Available</th>
                <th class="text-center">Quantity</th>
                </tr>
                </thead>
                <tbody>
                 <?php include 'conn.php';
                    $items= getItem();
                    $sn=0;
                    foreach ($items as $item) {
                      # code...
                    
                  ?>
                  <tr>
                    <td><?php echo ++$sn;?></td>
                    <td><?php echo $item['item'];?></td>
                    <td><?php echo $item['amount'];?></td>
                    <td><?php echo $item['qty'];?></td>
                  
                <form action="add.php?item=<?php echo $item['item']?>&amount=<?php echo $item['amount']?>&id=<?php echo $item['id']?>&qty=<?php echo $item['qty']?>" method="POST">
                <td class="text-center"><input type="number" name="qty" required=""></td>
              </form>
              </tr>
              <?php }?>
               
                </tbody>
                <tfoot>
                <tr>
                 <th>S/N</th>
                <th>Item</th>
                <th>Amount</th>
                <th>Qty Available</th>
                <th class="text-center">Quantity</th>
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



