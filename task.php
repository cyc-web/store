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
                Task Body
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
               
                <a href="create_task.php" class="btn btn-success">Create Task</a>
               
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Task Name</th>
                      
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sn = 0;
                        $tasks = getTasks();
                        foreach ($tasks as $task) {
                          
                      ?>
                    <tr>
                        <td><?php echo ++$sn?></td>   
                      <td><?php echo $task['task']?></td>
                      
                      <td class="text-center">
                        
                        <a href="edit_task.php?id=<?php echo base64_encode($task['id'])?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                       
                      <form id="delete-form-<?php echo $task['id']?>" action="delete_task.php?id=<?php echo base64_encode($task['id'])?>" method="post" style="display: none;">
                       
                      </form>
                       <a href="" onclick="
                       if(confirm('Are you sure you want to delete this record ?'))
                       {
                         event.preventDefault();document.getElementById('delete-form-<?php echo $task['id']?>').submit();
                        }else
                        {
                          event.preventDefault();
                        }" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                       
                        </td>
                    </tr>
                    <?php }?>
                  
                    </tbody>
                    <tfoot>
                    <tr>
                       <th>S/N</th>
                      <th>Task Name</th>
                      
                      <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
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