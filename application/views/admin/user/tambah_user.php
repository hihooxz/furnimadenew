<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah User</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['username'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors()?>
    </div>
    <?php } ?>
    <form role="form" method="POST" action="">
      <!-- text input -->
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="username" name="username">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="password" name="password">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="furnimade@gmail.com" name="email">
      </div>
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control"  placeholder="Furnimade" name="nama_lengkap" >
      </div>
      <div class="form-group">
        <div class="radio">
          <label> Jenis Kelamin</label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="optionsRadios2" value="1" name="jenis_kelamin">
            Laki-Laki
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="optionsRadios3" value="0" name="jenis_kelamin" >
            Perempuan
          </label>
        </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
      </div>
      <div class="form-group">
        <label>Tentang User</label>
        <textarea class="form-control" rows="3"  name="tentang_user"></textarea>
      </div>
      <div class="form-group">
        <label>Hak Akses</label>
        <select class="form-control" name="hak_akses">
          <option value="1">Admin</option>
          <option value="2">Tukang Kayu</option>
          <option value="3">Customer</option>
        </select>
      </div>
      <div class="form-group">
        <label>Status User</label>
        <select class="form-control" name="status_user">
          <option value="1">Aktif</option>
          <option value="2">Non Aktif</option>
          </select>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
