<?php
    include"head.php";
        if (in_array(6, $userss)) {
      
?>
<?php include "head.php"?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<?php include "navbar.php"?>
<?php include "sidebar.php"?>
<?php
error_reporting(0);
$id = base64_decode($_GET['id']);
  if (isset($_POST['update_user'])) {
    $tasks = $_POST['tasks'];
    $task = implode(",", $tasks);

    $update ="UPDATE admin SET task_id = '$task' WHERE id='$id'";
    $conn->query($update);
    echo "<script>alert('successfully updated');</script>";
    echo "<script>window.open('users.php', '_self');</script>";
  }
?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">User Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
    $code = substr(str_shuffle('yourcompanyname'), 0, 3).rand(000, 999);
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                User
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
               <?php
                $id = base64_decode($_GET['id']);
                $users = getUser($id);
                foreach ($users as $key) {
                    $surname = $key['surname'];
                    $othername = $key['othername'];
                    $telephone = $key['telephone'];
                    $email = $key['email'];
                    $userss = $key['task_id'];
                    $users_tasks = explode(",", $userss);
                    $code = $key['user_code'];
                }
               ?>
                <form role="form" action="" method="POST">
                 
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">User Code</label>
                    <input type="text" class="form-control" name="code" value="<?php echo $code?>" id="exampleInputEmail1" readonly>
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Surname</label>
                    <input type="text" class="form-control" name="surname" id="exampleInputEmail1" placeholder="Enter surname" value="<?php echo $surname?>" readonly>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Othernames</label>
                    <input type="text" class="form-control" name="othername" id="exampleInputEmail1" placeholder="Enter othernames" value="<?php echo $othername?>" readonly>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $email?>" readonly>
                  </div>
                  <div class="row">
                   
                         <?php
                            $tasks = getTasks();
                            foreach ($tasks as $value) {
                           
                          ?>
                          
                          <div class="col-md-4">
                          <div class="form-group">
                        <input type="checkbox" name="tasks[]" value="<?php echo $value['id']?>" id=""
                        <?php
                          foreach ($users_tasks as $key) {
                           if ($key == $value['id']) {
                             
                           
                        ?>
                        checked
                        <?php }}?>
                        > <?php echo $value['task']?>
                         </div>
                    
                    </div>
                        
                         <?php }?>
                  </div>
                  <button type="submit" name="update_user" class="btn btn-primary">Update</button> <a href="users.php" class="btn btn-info">Back</a>
                  
                  </div>
                  </div>

                   
                  
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
<?php } else{?>
<?php 
session_unset();
session_destroy();
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>



