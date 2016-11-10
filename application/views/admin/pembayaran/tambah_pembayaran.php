<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Pembayaran</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['nama_bank'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors();
      ?>
    </div>
    <?php }
    echo $error;
    ?>
    <?php echo form_open_multipart('');?>
      <!-- text input -->

      <div class="form-group">
        <label>Nama Bank</label>
        <input type="text" class="form-control" placeholder="Nama Bank" name="nama_bank">
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" class="form-control"  name="userfile">
      </div>
      <div class="form-group">
        <label>Atas Nama</label>
        <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama">
      </div>
      <div class="form-group">
        <label>Nomor Rekening</label>
        <input type="text" class="form-control" placeholder="Norek" name="no_rekening">
      </div>
       </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
  <!-- /.box-body -->
</div> <!-- end of div box body -->
</div> <!-- end of div cols 6 -->
</div> <!-- end of div row-->
</section>
