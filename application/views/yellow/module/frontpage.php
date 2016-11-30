<?php $this->load->view('yellow/common/slider'); ?>
<div class="row text-center">
  <div class="col-md-2"></div>
  <div class="col-md-8 btn-mid" id="btn-mid">
    <div class="col-md-4 col-xs-12">
      <a class="btn btn-block fur-btn-primary" href="#" role="button">Lihat Katalog</a>
    </div>
    <div class="col-md-4 col-xs-12">
      <a class="btn btn-block fur-btn-primary" href="#" role="button">Buat Furnitur Impianmu</a>
    </div>
    <div class="col-md-4 col-xs-12">
      <a class="btn btn-block fur-btn-primary" href="#" role="button">Temukan Inspirasi</a>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="container">
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
    <div class="col-md-4 col-sm-6 col-xs-8 text-center" style="margin-top:-38px">
      <h2>Cara Kerja</h2>
    </div>
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
  </div>
  <div class="row text-center">
    <div class=col-md-4>
      <div class="col-md-4"></div>
      <div class="col-md-8">
        <i class="fa fa-cloud-upload fa-5x fur-fa"></i><br/>
        <h3>1. Upload Gambar Desain Furnitur Kamu</h3>
      </div>
    </div>
    <div class=col-md-4>
      <i class="fa fa-check fa-5x fur-fa"></i><br/>
        <h3>2. Pilih Material Terbaik & Konfirmasi Pembayaran</h3>
    </div>
    <div class=col-md-4>
      <div class="col-md-8">
        <i class="fa fa-gift fa-5x fur-fa"></i><br/>
        <h3>3. Terima Furnitur Impian Anda</h3>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
    <div class="col-md-4 col-sm-6 col-xs-8 text-center" style="margin-top:-38px">
      <h2>Produk Terbaru</h2>
    </div>
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
  </div>
  <div class="row text-center" style="margin-top:20px">
    <div class="col-md-2 col-sm-4 col-xs-6">
      <?php
        if($results!=FALSE){
          foreach ($results as $rows) {
            ?>

      <a href="#" title="Lihat Sofa Ketje">
        <?php
                  if($rows->gambar_produk!= ""){
                    ?>
                    <img class="img" width="250" height="180" src="<?php echo base_url($rows->gambar_produk) ?>">
                    <?php
                  }
                  else{
                    ?>
                    <i class="fa fa-cube fa-3x"></i>
                    <?php
                  }
                ?>
      </a>
      <span class="label label-warning">
        <b>Rp <?php echo number_format($rows->harga_produk) ?></b>
      </span><br/>
      <?php echo $rows->nama_produk ?>
    </div>
    <?php
    }
  }
  ?>
  </div>
</div>
<div class="container">
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
    <div class="col-md-4 col-sm-6 col-xs-8 text-center" style="margin-top:-38px">
      <h2>Katalog Produk</h2>
    </div>
    <div class="col-md-4 col-sm-3 col-xs-2" style="border-bottom:1px solid #333"></div>
  </div>
  <div class="container">

    <?php
  if($results2!=false){
    foreach ($results2 as $rows) {
      ?>
      <div class="col-md-2">
        <center>
          <a href="<?php echo base_url('produk/kategori/'.$rows->id_kategori)?>" title="Lihat Katalog dari <?php echo $rows->nama_kategori?>">
          <?php if($rows->gambar_kategori!= "") {
                    ?>
                      <img src="<?php echo base_url($rows->gambar_kategori)?>">
                    <?php
                  } else{
                    ?>
                      <i class="fa fa-archive fa-5x" style="color:#f2bb00"></i>
                    <?php
                  }?>
                  </a><br />
          <b><?php echo $rows->nama_kategori?></b><br /><br />
        </center>
      </div>
      <?php
          }
        }
      ?>
  </div>
</div>
