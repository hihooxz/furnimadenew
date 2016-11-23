<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Wujudkan Furniture Impian Anda
  </div>
  <div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group form-impian">
      <div class="row">
        <div class="col-md-6">
          Gambar Dimensi Produk
          <input type="file" class="form-control" name="userfile[]">
        </div>
        <div class="col-md-6">
          Gambar 3D Produk
          <input type="file" class="form-control" name="userfile[]">
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Material yang digunakan">
      <input type="text" class="form-control" placeholder="Finishing yang digunakan">
      <input type="text" class="form-control" placeholder="Nama Produk">
      <textarea class="form-control" placeholder="Deskripsi Furniture"></textarea>
      <?php
        if($this->session->userdata('loginMember') == TRUE){
      ?>
      <button class="btn fur-btn-primary form-control" id="fur-btn-primary" role="button" type="submit">Next <i class="fa fa-arrow-right fa-fw"></i></button>
      <?php
      }
      else{
        ?>
        <button class="btn fur-btn-primary form-control" id="fur-btn-primary" role="button" data-toggle="modal" data-target="#loginModal">Next <i class="fa fa-arrow-right fa-fw"></i></button>
        <?php
      }
      ?>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>