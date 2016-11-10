<!-- Logo -->
<a href="index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>A</b>PN</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Admin</b>Panel</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->

      <!-- Notifications: style can be found in dropdown.less -->

      <!-- Tasks: style can be found in dropdown.less -->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >

          <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->

          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer">

            <div class="pull-right">
              <a href="<?php echo base_url('adminpanel/dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>
