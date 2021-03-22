
<?php
    include"head.php";
        if (in_array(6, $userss)) {
      
?>

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
            <h1>Users Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Users Page</li>
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
                Users Body
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
               
                <a href="create_user.php" class="btn btn-success">Create User</a>
               
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>User Code</th>
                      <th>Name</th>
                      <th>Task</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sn = 0;
                        $users = getUsers();
                        foreach ($users as $task) {
                           $tasks =explode(",", $task['task_id']);
                           
                      ?>
                    <tr>
                   
                        <td><?php echo ++$sn?></td>   
                        <td><?php echo $task['user_code']?></td>
                      <td><?php echo $task['surname']?> <?php echo $task['othername']?></td>
                      <td>
                      <?php
                      foreach($tasks as $t){
                        //for ($i=1; $i <= count($tasks) ; $i++) { 
                         
                      ?>
                      <?php echo getTask($t)?>,&nbsp; 
                      <?php }?>
                        </td>
                        <td><?php echo $task['status'] == 0 ? '<p class="text-warning">Inactive</p>' : '<p class="text-success"> Active </p>'?></td>
                      
                      <td class="text-center">
                        
                        <a href="edit_user.php?id=<?php echo base64_encode($task['id'])?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                       
                      <form id="delete-form-<?php echo $task['id']?>" action="delete_user.php?id=<?php echo base64_encode($task['id'])?>" method="post" style="display: none;">
                       
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
                       <th>User Code</th>
                      <th>Name</th>
                      <th>Task</th>
                      <th>Status</th>
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