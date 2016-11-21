<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Lihat Katalog dari <?php echo $result['nama_kategori']?>
  </div>
  <?php
    if($results!=FALSE){
      $i = 1;
      foreach ($results as $rows) {
        if($i%4==1){
          ?>
          <div class="row text-center btn-produk" style="margin-top:20px">
          <?php
        }
        ?>
          <div class="col-md-3 col-sm-4 col-xs-6 slick">
            <a href="<?php echo base_url('produk/detail-produk/'.$rows->id_produk.'/'.$this->mod->toAscii($rows->nama_produk))?>" title="Lihat <?php echo $rows->nama_produk?>">
              <?php
                if($rows->gambar_produk!=""){
                  ?>
                  <img class="img" width="250" height="180" src="<?php echo base_url($rows->gambar_produk) ?>">
                  <?php
                }
                else{
                  ?>
                  <i class="fa fa-cube fa-5x"></i>
                  <?php
                }
              ?>
              <b><?php echo $rows->nama_produk?></b><br/>
              <!-- <span class="produk-disc"><strike>7,120,000</strike> <b>25% off</b></span><br/> -->
              Rp <?php echo number_format($rows->harga_produk)?>
            </a>
          </div>
        <?php
        if($i%4==0 || $total_rows == $i){
          ?>
          </div>
          <?php
        }
      }
    }
    else{
      ?>
      <div class="row text-center">
        <h3>Katalog Kosong</h3>
      </div>
      <?php
    }
  ?>
</div>