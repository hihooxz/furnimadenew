<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Furnimade</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>

    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-files-o"></i>
        <span>User</span>
        <span class="label label-primary pull-right"></span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('adminpanel/user/tambah-user') ?>"><i class="fa fa-circle-o"></i> Tambah user</a></li>
        <li><a href="<?php echo base_url('adminpanel/user/lihat-user') ?>"><i class="fa fa-circle-o"></i> Lihat Semua user</a></li>
      </ul>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-th"></i> <span>Produk</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('adminpanel/produk/tambah-produk') ?>"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
          <li><a href="<?php echo base_url('adminpanel/produk/lihat-produk') ?>"><i class="fa fa-circle-o"></i> Lihat Semua Produk</a></li>
          <li><a href="<?php echo base_url('adminpanel/produk/tambah-kategori') ?>"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>
          <li><a href="<?php echo base_url('adminpanel/produk/lihat-kategori') ?>"><i class="fa fa-circle-o"></i> Lihat Semua Kategori</a></li>
        </ul>
    </li>

    <li>
      <a href="#">
        <i class="fa fa-newspaper-o"></i> <span>Blog</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('adminpanel/blog/tambah-blog') ?>"><i class="fa fa-circle-o"></i> Tambah Blog</a></li>
          <li><a href="<?php echo base_url('adminpanel/blog/lihat-blog') ?>"><i class="fa fa-circle-o"></i> Lihat Blog</a></li>
        </ul>
    </li>

    <li>
      <a href="#">
        <i class="fa fa-th"></i> <span>Pesan</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('adminpanel/pesan/tambah-pesan') ?>"><i class="fa fa-circle-o"></i> Tambah Pesan</a></li>
          <li><a href="<?php echo base_url('adminpanel/pesan/lihat-pesan') ?>"><i class="fa fa-circle-o"></i> Lihat Pesan</a></li>
        </ul>
    </li>


</section>
<!-- /.sidebar -->
