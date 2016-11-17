<nav class="navbar navbar-default">
  <div class="fur-topbar hidden-xs">

      <div class="row text-center">
        <div class="col-md-5 col-sm-5 hidden-xs" style="padding-top:5px">
          <a href="#">TENTANG KAMI</a>
          <a href="#">FAQ's</a>
          <a href="<?php echo base_url('hal/blog/'); ?>">BLOG</a>
          <a href="#">SYARAT & KETENTUAN</a>
          <a href="#">PARTNER</a>
          <a href="#">GABUNG SEBAGAI SUPPLIER</a>
        </div>
        <div class="col-md-5 col-sm-5 hidden-xs"></div>
        <div class="col-md-2 col-sm-5 hidden-xs" style="font-size:20px">
          <a href="#"><i class="fa fa-facebook-square fa-fw"></i></a>
          <a href="#"><i class="fa fa-twitter-square fa-fw"></i></a>
          <a href="#"><i class="fa fa-instagram fa-fw"></i></a>
          <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
          <a href="#"><i class="fa fa-pinterest-square fa-fw"></i></a>
        </div>
      </div>

  </div>
  <div class="container">
  <?php
    if($this->session->userdata('loginMember') != TRUE){
  ?>
    <div class="row">
      <div class="col-md-4 col-xs-12">
        <img class="img-responsive" src="<?php echo base_url('asset/asset_yellow/images/logo.png')?>">
      </div>
      <div class="col-md-4 hidden-xs fur-navbar">
        <a href="<?php echo base_url('produk/katalog/')?>"><b><i class="fa fa-bed fa-fw"></i> Lihat Katalog</b></a>
        <a href="<?php echo base_url('hal/furniture-impian/')?>"><b><i class="fa fa-pencil fa-fw"></i> Buat Furniture Impianmu</b></a>
      </div>
      <div class="col-md-4 hidden-xs">
        <div class="col-md-9 fur-navbar">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Search">
            <span class="input-group-addon fur-btn-sa">
              <button type="submit" class="button" style="background-color: transparent;">
                <i class="fa fa-search fa-fw"></i>
              </button>
            </span>
          </div>
        </div>
        <div class="col-md-3 text-center" style="margin-top:35px">
          <a class="btn fur-btn-primary" data-toggle="modal" data-target="#loginModal" id="fur-btn-primary" href="#" role="button">Login</a>
        </div>
      </div>    
    </div>
    <?php
      }
      else if($this->session->userdata('hakAkses') == 2){
        ?>
        <div class="row">
      <div class="col-md-4 col-xs-12">
        <img class="img-responsive" src="<?php echo base_url('asset/asset_yellow/images/logo.png')?>">
      </div>
      <div class="col-md-4 hidden-xs fur-navbar">
        <a href="#"><b><i class="fa fa-bed fa-fw"></i> Lihat Katalog</b></a>
        <a href="#"><b><i class="fa fa-pencil fa-fw"></i> Buat Furniture Impianmu</b></a>
      </div>
      <div class="col-md-4 hidden-xs">
        <div class="col-md-7 fur-navbar">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Search">
            <span class="input-group-addon fur-btn-sa">
              <button type="submit" class="button" style="background-color: transparent;">
                <i class="fa fa-search fa-fw"></i>
              </button>
            </span>
          </div>
        </div>
        <div class="col-md-5 text-center" style="padding-top:30px">
          <span class="dropdown">
            <button class="btn btn-primary dropdown-toggle user" type="button" data-toggle="dropdown">
            <i class="fa fa-user fa-fw"></i>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('akun-penjual/profil')?>"><i class="fa fa-user"></i> Profil</a></li>
              <li><a href="<?php echo base_url('akun-penjual/riwayat-pesanan')?>"><i class="fa fa-fw fa-shopping-bag"></i> Riwayat Pesanan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/konfirmasi-pembayaran')?>"><i class="fa fa-check-square fa-fw"></i> Konfirmasi Pembayaran</a></li>
              <li><a href="<?php echo base_url('akun-penjual/barang-diterima')?>"><i class="fa fa-th-large fa-fw"></i> Barang Diterima</a></li>
              <li><a href="<?php echo base_url('akun-penjual/pesan')?>"><i class="fa fa-comments fa-fw"></i> Pesan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/konfirmasi-pengerjaan')?>"><i class="fa fa-exchange fa-fw"></i> Konfirmasi Pengerjaan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/unggah-produk')?>"><i class="fa fa-cloud-upload fa-fw"></i> Unggah Produk</a></li>
              <li><a href="<?php echo base_url('akun-penjual/riwayat-produk')?>"><i class="fa fa-th-list fa-fw"></i> Riwayat Produk</a></li>
              <li><a href="<?php echo base_url('akun-penjual/tender')?>"><i class="fa fa-briefcase fa-fw"></i> Tender</a></li>
              <li><a href="<?php echo base_url('akun-penjual/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
            </ul>
          </span>
            <button class="btn btn-primary user" type="button">
            <i class="fa fa-shopping-cart fa-fw"></i>
           </button>
        </div>
      </div>    
      <div class="visible-xs col-xs-12 text-left" style="padding-top:30px">
          <span class="dropdown">
            <button class="btn btn-primary dropdown-toggle user" type="button" data-toggle="dropdown">
            <i class="fa fa-user fa-fw"></i>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('akun-penjual/profil')?>"><i class="fa fa-user"></i> Profil</a></li>
              <li><a href="<?php echo base_url('akun-penjual/riwayat-pesanan')?>"><i class="fa fa-fw fa-shopping-bag"></i> Riwayat Pesanan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/konfirmasi-pembayaran')?>"><i class="fa fa-check-square fa-fw"></i> Konfirmasi Pembayaran</a></li>
              <li><a href="<?php echo base_url('akun-penjual/barang-diterima')?>"><i class="fa fa-th-large fa-fw"></i> Barang Diterima</a></li>
              <li><a href="<?php echo base_url('akun-penjual/pesan')?>"><i class="fa fa-comments fa-fw"></i> Pesan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/konfirmasi-pengerjaan')?>"><i class="fa fa-exchange fa-fw"></i> Konfirmasi Pengerjaan</a></li>
              <li><a href="<?php echo base_url('akun-penjual/unggah-produk')?>"><i class="fa fa-cloud-upload fa-fw"></i> Unggah Produk</a></li>
              <li><a href="<?php echo base_url('akun-penjual/riwayat-produk')?>"><i class="fa fa-th-list fa-fw"></i> Riwayat Produk</a></li>
              <li><a href="<?php echo base_url('akun-penjual/tender')?>"><i class="fa fa-briefcase fa-fw"></i> Tender</a></li>
              <li><a href="<?php echo base_url('akun-penjual/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
            </ul>
          </span>
            <button class="btn btn-primary user" type="button">
            <i class="fa fa-shopping-cart fa-fw"></i>
           </button>
        </div>
    </div>
        <?php
      }
    ?>
  </div>
  <div class="nav menu sf-menu responsive-menu superfish sf-js-enabled">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fur-collapse-nav" id="#fur-collapse-nav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
            <div class="collapse navbar-collapse" id="fur-collapse-nav">
              <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('')?>">Home <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruang Tamu<span class="caret"></span></a>
                      <ul class="dropdown-menu bpt-submenu">
                        <?php
                          $category = $this->mod->fetchDataWhere('kategori','id_parent',1);
                          if($category!=FALSE){
                            foreach ($category as $rows) {
                              ?>
                                <li><a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori.'/'.$this->mod->toAscii($rows->nama_kategori,'','-'))?>"><?php echo $rows->nama_kategori?></a></li>
                              <?php
                            }
                          }
                          else{
                            ?>
                              <li><i>No Data</i></li>
                              <li></li>
                            <?php
                          }
                        ?>
                      </ul>
                    </li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruang Makan & Dapur<span class="caret"></span></a>
                      <ul class="dropdown-menu bpt-submenu">
                        <?php
                          $category = $this->mod->fetchDataWhere('kategori','id_parent',2);
                          if($category!=FALSE){
                            foreach ($category as $rows) {
                              ?>
                                <li><a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori.'/'.$this->mod->toAscii($rows->nama_kategori,'','-'))?>"><?php echo $rows->nama_kategori?></a></li>
                              <?php
                            }
                          }
                          else{
                            ?>
                              <li><i>No Data</i></li>
                              <li></li>
                            <?php
                          }
                        ?>
                      </ul>
                    </li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kamar Tidur<span class="caret"></span></a>
                      <ul class="dropdown-menu bpt-submenu">
                        <?php
                          $category = $this->mod->fetchDataWhere('kategori','id_parent',8);
                          if($category!=FALSE){
                            foreach ($category as $rows) {
                              ?>
                                <li><a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori.'/'.$this->mod->toAscii($rows->nama_kategori,'','-'))?>"><?php echo $rows->nama_kategori?></a></li>
                              <?php
                            }
                          }
                          else{
                            ?>
                              <li><i>No Data</i></li>
                              <li></li>
                            <?php
                          }
                        ?>
                      </ul>
                    </li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kamar Tidur Anak<span class="caret"></span></a>
                      <ul class="dropdown-menu bpt-submenu">
                        <?php
                          $category = $this->mod->fetchDataWhere('kategori','id_parent',9);
                          if($category!=FALSE){
                            foreach ($category as $rows) {
                              ?>
                                <li><a href="<?php echo base_url('hal/lihat-kategori/'.$rows->id_kategori.'/'.$this->mod->toAscii($rows->nama_kategori,'','-'))?>"><?php echo $rows->nama_kategori?></a></li>
                              <?php
                            }
                          }
                          else{
                            ?>
                              <li><a href="#"><i>No Data</i></a></li>
                            <?php
                          }
                        ?>
                      </ul>
                    </li>
                    <!-- <li><a href="#contact">Cari Inspirasi Ruangan</a></li> -->
                  </ul>
            </div>
</nav>