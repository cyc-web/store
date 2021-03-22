
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
          <div class="col-sm-6">
            <h1>Task Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Task Page</li>
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
                Task
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
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Task Title</label>
                    <input type="text" class="form-control" name="task" id="exampleInputEmail1" placeholder="Enter task title">
                  </div>
                  
                  </div>
                  </div>

                   
                  <button type="submit" name="create" class="btn btn-primary">Submit</button> <a href="task.php" class="btn btn-info">Back</a>
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
    <?php
        if (isset($_POST['create'])) {
            $task = $_POST['task'];

            $sql = "INSERT INTO tasks (task) VALUES ('$task')";
            $conn->query($sql);
            $last_id = mysqli_insert_id($conn);
            if ($last_id) {
                echo "<script>alert('Task created successfully');</script>";
            }else{
                echo "<script>alert('Unable to create task');</script>";
            }
        }
    
    ?>
    <!-- /.content -->
  </div>
  <?php include"footer.php"?>
</div>
</body>



