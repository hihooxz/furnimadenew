<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Ganti Password
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <div class="col-md-8 form-group form-impian">
      <?php echo form_open(''); 
      ?>
      <div class="row">
      <?php
        if($this->session->flashdata('success_form') == TRUE){
          ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hore!</strong> Kamu Berhasil Mengupdate Profil
          </div>
          <?php
        }
        if(!$this->form_validation->run() && isset($_POST['current'])){
          ?>
          <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Ouch!</strong> 
            <?php echo validation_errors()?>
          </div>
          <?php
        }
      ?>
      </div>
      <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="password" placeholder="Password Sekarang" name="current">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="password" placeholder="Password Baru" name="password">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="confirm">
        </div>
        <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px">Simpan</button>
        <?php echo form_close(); ?>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
