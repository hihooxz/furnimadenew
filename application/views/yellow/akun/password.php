<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Ganti Password
  </div>
  <div class="row text-center">
    <div class="col-md-3">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8 form-group form-impian">
      <?php echo form_open(''); 
      echo validation_errors();
      ?>
      <div class="row">
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
