<div class="container" style="margin-bottom:25px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center modal-title">
      <div style="margin-bottom:20px">
        <i class="fa fa-user" aria-hidden="true"></i> Daftar
      </div>
      <?php echo form_open('');
      if(!$this->form_validation->run() && isset($_POST['username'])){
        ?>
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>              
            </button>
            <strong>Ouch!</strong>
            <?php echo validation_errors();?>
          </div>
        <?php
      }
      ?>
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="password" placeholder="Konfirmasi Password" name="confirm">
            </div>
            <div class="input-group margin-bottom-sm form-group">
              <span class="input-group-addon modal-fa"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" placeholder="Alamat Email" name="email">
            </div>
            <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px" type="submit">Daftar</button>
            <?php echo form_close('')?>
    </div>
    <div class="col-md-3"></div>
  </div>
  <div class="text-center">
      <a href="<?php echo base_url('hal/daftar-supplier')?>">
        Daftar Sebagai Supplier
      </a>
  </div>
</div>