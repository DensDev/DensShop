  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('seller/dashboard')?>">
            <i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- menu produk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('seller/produk')?>"><i class="fa fa-table"></i> All Products</a></li>
            <li><a href="<?php echo base_url('seller/produk/add')?>"><i class="fa fa-plus"></i> Add Product</a></li>
            <!-- <li><a href="<?php echo base_url('seller/kategori')?>"><i class="fa fa-tags"></i>Kategori</a></li> -->
          </ul>
        </li>
                <!-- menu user -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('seller/user/foto_profil')?>"><i class="fa fa-plus"></i> Photo User</a></li>
          </ul>
        </li>
        <!-- end menu user -->
        <li>
          <a href="<?php echo base_url('seller/rekening') ?>">
            <i class="fa fa-bank text-aqua"></i> <span>Rekening</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">