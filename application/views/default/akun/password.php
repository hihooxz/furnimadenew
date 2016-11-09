<div class="container">
  <div class="col-sm-3 col-md-2 sidebar">
          <?php $this->load->view('default/akun/sidebar');?>
  </div>
  <div class="col-md-9">
          <h3>Ganti Password</h3><br />
          <?php echo form_open(); 
            echo validation_errors();
            if($this->session->flashdata('result') == TRUE){
              echo "Password Berhasil Diubah";
            }
          ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Password Sekarang" name="current">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Password Baru" name="password">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="confirm">
          </div>
          <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-warning" name="save">
          </div>
          <?php echo form_close(); ?>
  </div>  
</div>