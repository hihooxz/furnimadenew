<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit konfigurasi</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['judul_website'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors()?>
    </div>
    <?php } ?>
    <form role="form" method="POST" action="">
      <!-- text input -->
      <div class="form-group">
        <label>Judul Website</label>
        <input type="text" class="form-control"  name="judul_website" value="<?php echo $result['judul_website']?>">
      </div>
      <div class="form-group">
        <label>FAQ</label>
        <div class="hero-unit" style="margin-top:40px">
                <textarea class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px;"><?php echo $result['faq']?></textarea>
            </div>
      </div>
      <div class="form-group">
        <label>Syarat Ketentuan</label>
        <div class="hero-unit" style="margin-top:40px">
                <textarea class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px;"><?php echo $result['syarat_ketentuan']?></textarea>
            </div>
      </div>
      <div class="form-group">
        <label>Tentang Kami</label>
        <div class="hero-unit" style="margin-top:40px">
                <textarea class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px;"><?php echo $result['tentang_kami']?></textarea>
            </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3"  name="alamat_kantor"><?php echo $result['alamat_kantor']?></textarea>
      </div>
      <div class="form-group">
        <label>Telepone</label>
        <input type="text" class="form-control"   name="no_telp" value="<?php echo $result['no_telp']?>">
      </div>
      <div class="form-group">
        <label>Facebook</label>
        <input type="text" class="form-control"   name="link_facebook" value="<?php echo $result['link_facebook']?>">
      </div>
      <div class="form-group">
        <label>Twitter</label>
        <input type="text" class="form-control"   name="link_twitter" value="<?php echo $result['link_twitter']?>">
      </div>
      <div class="form-group">
        <label>instagram</label>
        <input type="text" class="form-control"   name="link_instagram" value="<?php echo $result['link_instagram']?>">
      </div>
      <div class="form-group">
        <label>Path</label>
        <input type="text" class="form-control"   name="link_path" value="<?php echo $result['link_path']?>">
      </div>
      <div class="form-group">
        <label>Gplus</label>
        <input type="text" class="form-control"   name="link_gplus" value="<?php echo $result['link_gplus']?>">
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
