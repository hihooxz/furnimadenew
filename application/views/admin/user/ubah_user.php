<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah User</h3>
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
        <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $result['username'] ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="password" name="password">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="furnimade@gmail.com" name="email"value="<?php echo $result['email'] ?>">
      </div>
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control"  placeholder="Furnimade" name="nama_lengkap" value="<?php echo $result['nama_lengkap'] ?>">
      </div>
      <div class="form-group">
        <div class="radio">
          <label> Jenis Kelamin</label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="optionsRadios2" value="1" name="jenis_kelamin" <?php if($result['jenis_kelamin']== 1) echo "checked"?>>
            Laki-Laki
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="optionsRadios3" value="0" name="jenis_kelamin" <?php if($result['jenis_kelamin']== 0) echo "checked"?>>
            Perempuan
          </label>
        </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?php echo $result['alamat'] ?></textarea>
      </div>
      <div class="form-group">
        <label>Tentang User</label>
        <textarea class="form-control" rows="3"  name="tentang_user"><?php echo $result['tentang_user'] ?></textarea>
      </div>
      <div class="form-group">
        <label>Hak Akses</label>
        <?php
        $options = array(
            '1' => 'Admin',
            '2' => 'Tukang Kayu',
            '3' => 'Customer'
        );
        echo form_dropdown('hak_akses',$options,$result['hak_akses'],'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <label>Status User</label>
        <?php
        $options = array(
            '1' => 'Aktif',
            '2' => 'Non Aktif'
        );
        echo form_dropdown('status_user',$options,$result['status_user'],'class="form-control"');
        ?>
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
