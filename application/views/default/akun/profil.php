<div class="container">
  <div class="col-sm-3 col-md-2 sidebar">
          <?php $this->load->view('default/akun/sidebar');?>
  </div>
  <div class="col-md-9">
          <h3>Informasi Personal</h3><br />
          <?php echo form_open();
            echo validation_errors();
           ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Nama" name="nama" value="<?php echo $result['nama_lengkap']?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Username" name="username" disabled value="<?php echo $result['username']?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Email" name="email" value="<?php echo $result['email']?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="No Ponsel" name="no_hp" value="<?php echo $result['no_hp']?>">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
            <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $result['alamat']?></textarea>
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-newspaper-o fa-fw"></i></span>
            <textarea name="tentang_user" class="form-control" placeholder="Tentang User"><?php echo $result['tentang_user']?></textarea>
          </div>
          <div class=" form-group">
            <label>Jenis Kelamin</label>
            <label><input type="radio" name="jenis_kelamin" value="0" <?php if($result['jenis_kelamin'] == 0) echo "checked" ?>> Perempuan</label>
            <label><input type="radio" name="jenis_kelamin" value="1" <?php if($result['jenis_kelamin'] == 1) echo "checked" ?>> Laki-laki</label>
          </div>
          <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-warning" name="save">
          </div>
          <?php echo form_close(); ?>
  </div>  
</div>