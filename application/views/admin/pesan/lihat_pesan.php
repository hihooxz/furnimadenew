<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat Pesan</h3>
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
                'pesan'=> 'Isi pesan'

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
        <th>Isi pesan</th>
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
                <td><?php echo $rows->pesan ?></td>
                <td><?php if($rows->gambar_pesan!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->gambar_pesan)?>" height="150px">
                  <?php
                } ?></td>
                <td><?php echo $rows->tanggal_pesan?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/pesan/ubah_pesan/'.$rows->id_pesan)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/pesan/hapus_pesan/'.$rows->id_pesan)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
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
        <th>Isi pesan</th>
        <th>Gambar</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
