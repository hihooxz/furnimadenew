<div class="container">
  <div class="modal-title text-center" style="margin-bottom:25px">
        <?php echo $result['judul_blog'] ?>
  </div>
  <div class="row">
      <div class="col-md-2">
        <i class="fa fa-pencil" aria-hidden="true"></i>  Created by: <?php echo $result['username'] ?>
      </div>
      <div class="col-md-2">
        <i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo date('d M Y',strtotime($result['tanggal_blog'])) ?>
      </div>
      <div class="col-md-2">
        <i class="fa fa-eye" aria-hidden="true"></i>  Dilihat <?php echo $result['dilihat'] ?> kali
      </div>
      <div class="col-md-6"></div>
    </div>
  <div class="blog-preview">
    <div style="margin-bottom:15px">
    </div>
    <div class="row">
      <div class="col-md-3">
      <?php
        if($result['gambar_blog'] == ""){
          ?>
          <img class="img-responsive" src="<?php echo base_url('asset/asset_yellow/images/sofa.png')?>">
          <?php
        }
        else{
          ?>
          <img class="img-responsive" src="<?php echo base_url($result['gambar_blog'])?>">
          <?php
        }
      ?>
      </div>
      <div class="col-md-9">
        <?php echo $result['artikel'] ?>
      </div>
    </div>
    </div>
  </div>
</div>