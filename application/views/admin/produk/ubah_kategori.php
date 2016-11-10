<script src="<?php echo base_url('asset/asset_lte/plugins/jQUeryUI/jquery-ui.js')?>"></script>
<script>
  $(function() {
    var parentKategori = [
    <?php
      if($parent_kategori != FALSE){
        $total_rows = $this->mod->countWhereData('kategori','id_parent',0);
        $i = 1;
        foreach ($parent_kategori as $rows) {
          if($i == $total_rows){
            echo '"'.$rows->nama_kategori.'"';
          }
          else echo '"'.$rows->nama_kategori.'",';
          $i++;
        }
      }
    ?>
    ];
    $( "#parentKategori" ).autocomplete({
      source: parentKategori
    });
  });
  </script>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah Kategori</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php if(!$this->form_validation->run() && isset($_POST['nama_kategori'])){ ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      <?php echo validation_errors();
      ?>
    </div>
    <?php }

    ?>
    <?php echo form_open_multipart('');?>
      <!-- text input -->
      <div class="form-group">
        <label>Parent Kategori</label>
        <?php
        $options = array(''=>'Pilih Parent');
          if($parent != FALSE){
            foreach ($parent as $rows) {
              $options[$rows->id_kategori] = $rows->nama_kategori;
            }
          }
          echo form_dropdown('id_parent',$options,$result['id_parent'],'class="form-control"');

        ?>
      </div>
      <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori"value="<?php echo $result['nama_kategori']?>">
      </div>
      <div class="form-group">
        <label>Gambar Kategori</label>
        <input type="file" class="form-control"  name="userfile" >
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <textarea class="form-control" rows="3" name="keterangan_kategori"><?php echo $result['keterangan_kategori']?></textarea>
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
