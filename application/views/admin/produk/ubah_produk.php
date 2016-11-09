<script src="<?php echo base_url('asset/asset_lte/plugins/jQUeryUI/jquery-ui.js')?>"></script>
<script>
  $(function() {
    var kategori = [
    <?php
      if($kategori != FALSE){
        $total_rows = $this->mod->countData('kategori');
        $i = 1;
        foreach ($kategori as $rows) {
          if($i == $total_rows){
            echo '"'.$rows->nama_kategori.'"';
          }
          else echo '"'.$rows->nama_kategori.'",';
          $i++;
        }
      }
    ?>
    ];
    $( "#kategori" ).autocomplete({
      source: kategori
    });
  });
  </script>

<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah Produk</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['nama_produk'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors()?>
    </div>
    <?php } ?>
    <form role="form" method="POST" action="">
      <!-- text input -->
      <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="kategori" id="kategori" value = "<?php echo $result['nama_kategori'] ?>">
      </div>
      <div class="form-group">
        <label>Kode Produk</label>
        <input type="text" class="form-control" placeholder="KDXXX" name="kode_produk"value="<?php echo $result['kode_produk'] ?>">
      </div>
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" value="<?php echo $result['nama_produk'] ?>">
      </div>
      <div class="form-group">
        <label>Gambar Produk</label>
        <input type="file" class="form-control"  name="gambar_produk">
      </div>
      <div class="form-group">
        <label>Deskripsi Produk</label>
        <textarea class="form-control" rows="3" name="deskripsi_produk"><?php echo $result['deskripsi_produk'] ?></textarea>
       </div>
       <div class="form-group">
         <label>Harga</label>
         <input type="text" class="form-control"  name="harga" value = "<?php echo $result['harga'] ?>">
       </div>
       <div class="form-group">
         <label>Harga Promo (Hanya Diisi Jika Sedang Promo)</label>
         <input type="text" class="form-control"  name="harga_promo" value = "<?php echo $result['harga_promo'] ?>">
       </div>
       <div class="form-group">
         <label>Status Produk</label>
         <?php
          $options = array(
              '0' => 'Public',
              '1' => 'Private',
              '2' => 'Blocked'
            );
          echo form_dropdown('status_produk',$options,$result['status_produk'],'class="form-control"');
         ?>
       </div>
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
