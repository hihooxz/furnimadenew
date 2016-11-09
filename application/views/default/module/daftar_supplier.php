<div class="container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <h3>Daftar Supplier</h3><br />
<?php
            echo form_open('');
            if($this->session->flashdata('post') == TRUE)
              echo "<span class=\"label label-success\">Anda Berhasil Mendaftar, Silahkan Verifikasi Email Anda.</span><br /><br />";
          ?>
          <?php if(!$this->form_validation->run() && isset($_POST['username'])){ ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              <?php echo validation_errors()?>
            </div>
            <?php } ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Username" name="username">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" type="password" placeholder="Confirm Password" name="confirm">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Email" name="email">
          </div>
          <div class="form-group">
                <input type="submit" value="Daftar" class="btn btn-warning">
                Sudah Punya Akun? <a href="<?php echo base_url('halaman/login')?>">Login Disini</a>
          </div>
          <?php
            echo form_close();
          ?>
          </div>
  <div class="col-md-3">
  </div>
</div>