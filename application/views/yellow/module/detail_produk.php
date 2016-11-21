<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        <?php echo $result['nama_produk']?>
  </div>
  <div class="row text-center btn-produk" style="margin-top:20px">
  <span class="pull-right">Product by: <i class="fa fa-user fa-fw"></i> <?php echo $result['username']?></span>
    <div class="col-md-6 col-sm-4 col-xs-6">
      <?php
                if($result['gambar_produk']!=""){
                  ?>
                  <img class="img" width="250" height="180" src="<?php echo base_url($result['gambar_produk']) ?>">
                  <?php
                }
                else{
                  ?>
                  <i class="fa fa-cube fa-5x"></i>
                  <?php
                }
              ?>
    </div>

    <div class="col-md-6 col-sm-8 col-xs-6 text-left">
        <b>Spesifikasi Produk</b><br/>
        <?php
          echo $result['deskripsi_produk'];
        ?>
    </div><br/>
    <div class="produk-price cart-btn text-left row">
        <span class="col-md-3"><i class="fa fa-tag fa-fw"></i> Rp <?php echo number_format($result['harga_produk'])?></span>
        <span class="col-md-3 text-center"><a href="#"><i class="fa fa-cart-plus fa-fw"></i>Add to Cart</a></span>
    </div>
  </div>
</div>