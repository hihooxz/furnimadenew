<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat Produk</h3>
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
                'nama_produk'=>'Nama Produk'

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
        <th>Penjual</th>
        <th>Nama Produk</th>
        <th>Deskripsi Produk</th>
        <th>Gambar Produk</th>
        <th>Tanggal Produk</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php echo $rows->username ?></td>
                <td><?php echo $rows->nama_produk ?></td>
                <td><?php echo $rows->deskripsi_produk ?></td>
                <td><?php if($rows->gambar_produk!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->gambar_produk)?>">
                  <?php
                } ?></td>
                  <td><?php echo $rows->tanggal_produk ?></td>
                <td>Rp <?php echo number_format($rows->harga_produk) ?></td>
                  <td>

                  <a href ="<?php echo base_url('adminpanel/produk/ubah_produk/'.$rows->id_produk)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/produk/hapus_produk/'.$rows->id_produk)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
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
        <th>Penjual</th>
        <th>Nama Produk</th>
        <th>Deskripsi Produk</th>
        <th>Gambar Produk</th>
        <th>Tanggal Produk</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
