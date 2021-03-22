<?php
    include"head.php";
        if (in_array(8, $userss)) {
      
?>
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
              <h3 class="card-title">List of items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name of item</th>
                    <th>Amount</th>
                    <th>Current Qty</th>
                     <?php
    
        if (in_array(4, $userss)) {
      
      ?>
                    <th>New Qty</th>
                    <th>Action</th>
                    <?php }?>
                  </tr>
                </thead>
                <tbody>
                <?php include 'conn.php';
                    $items= getItems();
                    $sn=0;
                    foreach ($items as $item) {
                      # code...
                      $id=$item['id'];
                      $amount=$item['amount'];
                    
                  ?>
                  <tr>
                    <!--td><?php echo ++$sn;?></td-->
                    <td><?php echo $item['item'];?></td>
                    <td><?php echo $item['amount'];?></td>
                    <td><?php echo $item['qty'];?></td>
                     <?php
    
        if (in_array(4, $userss)) {
      
      ?>
                    <form action="update_qty.php?id=<?php echo $item['id']?>&qty=<?php echo $item['qty']?>" method="POST">
                <td><input type="number" name="new" required=""></td>

                    </form>
                <td style="text-align: center;">
                
      <button type="submit" title="Update quantity" class="btn btn-primary"><i class="fa fa-plus"></i></button> <a title="Update amount" href="update_amount.php?id=<?php echo $id?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
      <?php }?></td>
              </form>
                  </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Name of item</th>
                    <th>Amount</th>
                    <th>Current Qty</th>
                       <?php
    
        if (in_array(4, $userss)) {
      
      ?>
                    <th>New Qty</th>
                    <th>Action</th>
                    <?php }?>
                    
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


