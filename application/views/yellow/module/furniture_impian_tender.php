<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
      Ajukkan Tender
  </div>
  <?php echo form_open_multipart();?>
  <div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-group form-impian">
      <div class="row">
        <?php
    if(!$this->form_validation->run() && isset($_POST['range_harga'])){
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
            <strong>Hore!</strong> Kamu Berhasil Mengajukkan Tender
          </div>
          <?php
        }
  ?>  
      </div>
      <?php
        $tender = $this->mod->getDataWhere('tender_desain','id_desain_produk',$this->uri->segment(3));
        if($tender == FALSE){
      ?>
      <input type="text" class="form-control" placeholder="Tanggal Selesai Tender" name="tanggal_selesai_tender" id="datepicker">
      <input type="text" class="form-control" placeholder="Range Harga (ex: 1.0000.000 - 5.0000.0000" name="range_harga">
      <button class="btn fur-btn-primary form-control" id="fur-btn-primary" role="button" type="submit">Selesai <i class="fa fa-check fa-fw"></i></button>
      <?php
      }
      else{
        ?>
        <h4>Anda Sudah Melakukan Tender</h4>
        <?php
      }
      ?>
      <?php echo form_close('')?>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>