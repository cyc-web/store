<?php 
  
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CYC Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $name?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Generate Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <?php
    
        if (in_array(5, $userss)) {
      
      ?>
              <li class="nav-item">
                <a href="all_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Report</p>
                </a>
              </li>
              <?php }?>

               <?php
    
        if (in_array(5, $userss)) {
      
      ?>
              <li class="nav-item">
                <a href="generate_sold_items.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Sold</p>
                </a>
              </li>
              <?php }?>
               <?php
    
        if (in_array(5, $userss)) {
      
      ?>
              <li class="nav-item">
                <a href="report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>
              <?php }?>
 <?php
    
        if (in_array(3, $userss)) {
      
      ?>

              <li class="nav-item">
                <a href="more_items.php" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Upload Items</p>
                </a>
              </li>
              <?php }?>
            </ul>
          </li>
          
           <?php
    
        if (in_array(1, $userss)) {
      
      ?>
            
              <li class="nav-item">
                <a href="users.php" class="nav-link">
                  <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;
                  <p>Users</p>
                </a>
              </li>
              <?php }?>
 <?php
    
        if (in_array(2, $userss)) {
      
      ?>
               <li class="nav-item">
                <a href="add_expenses.php" class="nav-link">
                  <i class="fas fa-fw fa-file"></i>&nbsp;&nbsp;&nbsp;
                  <p>Upload All Expenses</p>
                </a>
              </li>
              <?php }?>
             <?php
    
        if (in_array(4, $userss)) {
      
      ?>
               <li class="nav-item">
                <a href="available_items.php" class="nav-link">
                  <i class="fas fa-table"></i>&nbsp;&nbsp;&nbsp;
                  <p>Available Items</p>
                </a>
              </li>
              <?php }?>
               <?php
    
                if (in_array(8, $userss)) {
              
              ?>
              <li class="nav-item">
                <a href="task.php" class="nav-link">
                  <i class="fas fa-cog"></i>&nbsp;&nbsp;&nbsp;
                  <p>Task</p>
                </a>
              </li>
              <?php }?>
      <?php
    
        if (in_array(1, $userss)) {
      
      ?>
               <li class="nav-item">
                <a href="pos.php" class="nav-link">
                  <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;
                  <p>Point of sale</p>
                </a>
              </li>
              <?php }?>
             <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-power-off"></i>&nbsp;&nbsp;&nbsp;
                  <p>Logout</p>
                </a>
              </li>
              
          </li>
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  