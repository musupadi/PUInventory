<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      <?php
                foreach ($user as $data){

                ?>
        <div class="pull-left image">
          <img src="<?php echo base_url();?>img/profile/<?php echo $data->photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $data->name?></p>
                <?php } ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Matakuliah')?>"><i class="fa fa-book"></i>Item</a></li>
            <li><a href="<?php echo base_url('Jurusan')?>"><i class="fa fa-book"></i>Item Non Asset</a></li>
            <li><a href="<?php echo base_url('Ruang')?>"><i class="fa fa-list"></i>Type</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Vendor/List')?>"><i class="fa fa-briefcase"></i>Vendor</a></li>
            <li><a href="<?php echo base_url('Vendor/Origin')?>"><i class="fa fa-list"></i>Origin</a></li>
            <li><a href="<?php echo base_url('Vendor/Brand')?>"><i class="fa fa-list"></i>Brand</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
            <li><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url("Pengumuman")?>"><i class="fa fa-map"></i> <span>Location</span></a></li>
        <li><a href="<?php echo base_url("Jadwal")?>"><i class="fa fa-exchange"></i> <span>Transaction Asset Item</span></a></li>
        <li><a href="<?php echo base_url("Ujian")?>"><i class="fa fa-exchange"></i> <span>Transaction Non Asset Item</span></a></li>
        <li><a href="<?php echo base_url("Login/logout")?>"><i class="fa fa-user-times"></i> <span>Sign Out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->