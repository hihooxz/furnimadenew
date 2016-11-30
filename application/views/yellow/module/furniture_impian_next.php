<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
      Pilih Penjual
  </div>
  <?php echo form_open_multipart();?>
  <div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group form-impian">
      <div class="row">
        <?php
    if(!$this->form_validation->run() && isset($_POST['username'])){
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
    if($this->session->flashdata('success_form') == TRUE){
          ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hore!</strong> Kamu Berhasil Memilih penjual. Silahkan Tunggu kabar dari Penjual kami.
          </div>
          <?php
        }
  ?>  
      </div>
      <?php
        $tender = $this->mod->getDataWhere('desain_produk','id_desain_produk',$this->uri->segment(3));
        if($tender['id_penjual'] != 0){
      ?>
      <input type="text" class="form-control" placeholder="Username" name="username">
      <button class="btn fur-btn-primary form-control" id="fur-btn-primary" role="button" type="submit">Selesai <i class="fa fa-check fa-fw"></i></button>
      <?php
      }
      else{
        ?>
        <h4>Anda Sudah Memilih Penjual</h4>
        <?php
      }
      ?>
      <?php echo form_close('')?>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>