<div class="container">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Furnimade <i class="fa fa-bold" aria-hidden="true"></i>log
  </div>
  <?php
    if($results!=FALSE){
      foreach ($results as $rows) {
        ?>
        <div class="blog-preview">
          <div style="margin-bottom:15px">
          <div class="blog-title">
            <a href="<?php echo base_url('hal/baca-blog/'.$rows->id_blog.'/'.$this->mod->toAscii($rows->judul_blog))?>"><?php echo $rows->judul_blog; ?></a>
          </div>
          <div class="row">
            <div class="col-md-2">
              <i class="fa fa-pencil" aria-hidden="true"></i>  Dibuat oleh: <?php echo $rows->username;?>
            </div>
            <div class="col-md-2">
              <i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo date('d M Y',strtotime($rows->tanggal_blog)) ?>
            </div>
            <div class="col-md-2">
              <i class="fa fa-eye" aria-hidden="true"></i>  Dilihat <?php echo number_format($rows->dilihat);?> kali
            </div>
            <div class="col-md-6"></div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <?php
                if($rows->gambar_blog == ""){
                  ?>
                  <img class="img-responsive" src="<?php echo base_url('asset/asset_yellow/images/sofa.png')?>">
                  <?php
                }
                else{
                  ?>
                  <img class="img-responsive" src="<?php echo base_url($rows->gambar_blog)?>">
                  <?php
                }
              ?>
            </div>
            <div class="col-md-9">
              <?php
                echo substr($rows->artikel, 0,200);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
              <a href="<?php echo base_url('hal/baca-blog/'.$rows->id_blog.'/'.$this->mod->toAscii($rows->judul_blog))?>">
                <button class="btn btn-md fur-btn-primary" style="border-radius:0px">Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
              </a>
            </div>
          </div>
        </div>
        <?php
      }
    }
  ?>
</div>