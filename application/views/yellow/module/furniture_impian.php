<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Wujudkan Furniture Impian Anda
  </div>
  <?php echo form_open_multipart();?>
  <div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group form-impian">
      <div class="row">
        <?php
    if(!$this->form_validation->run() && isset($_POST['bahan'])){
      ?>
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php
          echo validation_errors();
        ?>
      </div>
      <?php
    }
    if(isset($error)){
      ?>
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php
          echo $error;
        ?>
      </div>
      <?php
    }
    if($this->session->flashdata('success_form') == TRUE){
          ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hore!</strong> Kamu Berhasil Mengupload desain furniture impian menggunakan Tender.
            Silahkan tunggu tender kamu dibid penjual.
          </div>
          <?php
        }
  ?>  
      </div>
      <div class="row">
        <div class="col-md-6">
          Gambar Dimensi Produk
          <input type="file" class="form-control" name="userfile[]" multiple>
        </div>
        <div class="col-md-6">
          Gambar 3D Produk
          <input type="file" class="form-control" name="userfile2[]" multiple>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Material yang digunakan" name="bahan">
      <input type="text" class="form-control" placeholder="Finishing yang digunakan" name="finishing">
      <input type="text" class="form-control" placeholder="Nama Produk" name="nama">
      <textarea class="form-control" placeholder="Deskripsi Furniture" name="deskripsi"></textarea>
      <label><input type="radio" name="ditenderkan" value="1"> Ditenderkan</label>
      <label><input type="radio" name="ditenderkan" value="0"> Pilih Penjual</label>
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
      <?php echo form_close('')?>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>