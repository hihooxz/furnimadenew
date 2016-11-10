<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat Pembayaran</h3>
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
                'no_rekening'=> 'Rekening',
                'nama_bank'=>'Bank'
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
        <th>Atas Nama</th>
        <th>Bank</th>
        <th>Gambar</th>
        <th>No Rekening</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->atas_nama ?></td>
                <td><?php echo $rows->nama_bank ?></td>
                <td><?php if($rows->gambar_bank!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->gambar_bank)?>" height="150px">
                  <?php
                } ?></td>
                <td><?php echo $rows->no_rekening?></td>
                  <td>
                  <a href ="<?php echo base_url('adminpanel/pembayaran/ubah_pembayaran/'.$rows->id_pembayaran)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/pembayaran/hapus_pembayaran/'.$rows->id_pembayaran)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
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
        <th>Atas Nama</th>
        <th>Bank</th>
        <th>Gambar</th>
        <th>No Rekening</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
