<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat Blog</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control">
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'artikel'=> 'Artikel',
                'judul_blog'=>'Judul'
                );
          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
        ?>
      </div>
      <div class="col-md-3">
        <button type="submit"class="btn btn-default">Search</button>
      </div>
    </form>
    </div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Judul</th>
        <th>Isi Blog</th>
        <th>Gambar</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->judul_blog ?></td>
                <td><?php echo $rows->artikel ?></td>
                <td><?php if($rows->gambar_blog!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->gambar_blog)?>" height="150px">
                  <?php
                } ?></td>
                <td><?php echo $rows->tanggal_blog?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/blog/ubah_blog/'.$rows->id_blog)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/blog/hapus_blog/'.$rows->id_blog)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
                </td>
              </tr>
      				<?php
      			}
      		}
      	?>
      	<?php
      		echo $links;
      	?>
      </tbody>
      <tfoot>
      <tr>
        <th>Judul</th>
        <th>Isi Blog</th>
        <th>Gambar</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
