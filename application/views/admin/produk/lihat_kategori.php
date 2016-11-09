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
                'nama_kategori'=>'Nama kategori',
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
        <th>Parent Kategori</th>
        <th>Nama Kategori</th>
        <th>Keterangan Kategori</th>
        <th>Gambar Kategori</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
      		if($results!=FALSE){
      			foreach ($results as $rows) {
      				?>
      				<tr>
                <td><?php if($rows->id_parent==0) echo "-";
                  else{
                    $result = $this->mod->getDataWhere('kategori','id_kategori',$rows->id_parent);
                    echo $result['nama_kategori'];
                  }
                  ?></td>
                <td><?php echo $rows->nama_kategori ?></td>
                <td><?php echo $rows->keterangan_kategori ?></td>
                <td><?php if($rows->gambar_kategori!= "") {
                  ?>
                  <img src="<?php echo base_url($rows->gambar_kategori)?>">
                  <?php
                } else{
                  ?>
                  <img data-src="holder.js/141x232" class="img-thumbnail">
                  <?php
                }?></td>
                <td>
                  <a href ="<?php echo base_url('adminpanel/produk/ubah_kategori/'.$rows->id_kategori)?>">Ubah</a> |
                  <a href ="<?php echo base_url('adminpanel/produk/hapus_kategori/'.$rows->id_kategori)?>" onclick="return confirm('Apakah Kamu yakin data tersebut ingin dihapus ?')">Hapus</a>
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
        <th>Parent Kategori</th>
        <th>Nama Kategori</th>
        <th>Keterangan Kategori</th>
        <th>Gambar Kategori</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
