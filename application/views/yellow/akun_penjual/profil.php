<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Profil
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <?php
    echo form_open('');?>
    <div class="col-md-8 form-group form-impian">
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
    if(!$this->form_validation->run() && isset($_POST['nama_lengkap'])){
      ?>
      <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Ouch!</strong> 
        <?php echo validation_errors()?>
      </div>
      <?php
    }?>
      </div>
      <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Nama" value="<?php echo $result['nama_lengkap']?>" name="nama">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Email" value="<?php echo $result['email']?>" name="email">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Alamat" value="<?php echo $result['alamat']?>" name="alamat">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-mobile-phone fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Nomor Handphone" name="no_hp" value="<?php echo $result['no_hp']?>">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          <span class="input-group-addon"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i></span>
            <input class="form-control" type="text" placeholder="Tentang Anda" name="tentang_user" value="<?php echo $result['tentang_user']?>">
        </div>
        <div class="input-group margin-bottom-sm form-group">
          Jenis Kelamin: 
          <label class="radio-inline">
            <input type="radio" name="jenis_kelamin" value="1" <?php if($result['jenis_kelamin'] == 1) echo "checked"?>>
            Laki - laki
          </label>
          <label class="radio-inline">
            <input type="radio" name="jenis_kelamin" value="2" <?php if($result['jenis_kelamin'] == 2) echo "checked"?>>
            Perempuan
          </label>
        </div>
        <button class="btn btn-md form-control fur-btn-primary" style="border-radius:0px" type="submitS">Simpan</button>
    </div>
    <?php echo form_close('');?>
    <div class="col-md-1"></div>
  </div>
</div>