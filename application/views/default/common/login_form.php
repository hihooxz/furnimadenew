<!-- Modal -->
  <div class="modal fade" id="loginForm" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Masuk ke Halaman Member</h4>
        </div>
        <div class="modal-body">
          <?php
            echo form_open(base_url('halaman/login'));
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
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>