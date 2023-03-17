  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('admin/dashboard')?>">
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
            <li><a href="<?php echo base_url('admin/produk')?>"><i class="fa fa-table"></i> All Products</a></li>
            <li><a href="<?php echo base_url('admin/produk/add')?>"><i class="fa fa-plus"></i> Add Product</a></li>
            <li><a href="<?php echo base_url('admin/kategori')?>"><i class="fa fa-tags"></i>Kategori</a></li>
          </ul>
        </li>
        <!-- end menu user -->
        <!-- menu user -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user')?>"><i class="fa fa-table"></i> All Users</a></li>
            <li><a href="<?php echo base_url('admin/user/add')?>"><i class="fa fa-plus"></i> Add User</a></li>
            <li><a href="<?php echo base_url('admin/user/foto_profil')?>"><i class="fa fa-plus"></i> Photo User</a></li>
          </ul>
        </li>
        <!-- end menu user -->

        <li>
          <a href="<?php echo base_url('admin/rekening') ?>">
            <i class="fa fa-bank text-aqua"></i> <span>Rekening</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/transaksi')?>">
            <i class="fa fa-check text-aqua"></i> <span>Transaksi</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/inbox') ?>">
            <i class="fa fa-envelope text-aqua"></i><span>Inbox</span>
          </a>
        </li>


        <!-- menu konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi')?>"><i class="fa fa-home"></i>Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo')?>"><i class="fa fa-image"></i>Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon')?>"><i class="fa fa-envira"></i>Konfigurasi Icon</a></li>
          </ul>
        </li>
        <!-- end menu konfigurasi -->
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