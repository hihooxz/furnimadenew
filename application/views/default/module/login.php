<div class="container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <h3>Masuk ke Halaman Member</h3><br />
<?php
            echo form_open('');
            if($this->session->flashdata('error_session') == TRUE)
              echo "<span class=\"label label-danger\">Session Member Anda Sudah Berakhir. Silahkan login kembali</span><br /><br />";
          ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Username" name="username">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
                <input type="submit" value="Login" class="btn btn-warning">
                Belum Punya Akun? <a href="<?php echo base_url('halaman/daftar')?>">Daftar Disini</a>
          </div>
          <?php
            echo form_close();
            echo validation_errors();
          ?>
          </div>
  <div class="col-md-3">
  </div>
</div>