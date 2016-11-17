<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Riwayat Produk
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <div class="form-group text-left">
        <a href="<?php echo base_url('akun-penjual/unggah-produk')?>">
          <button class="btn btn-md fur-btn-primary" style="margin-top:10px"   type="submit">
               <i class="fa fa-plus"></i> Tambah Produk
          </button>
        </a>
      </div>
    <div class="col-md-8 form-group form-impian table-responsive">
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead>
          <tr>
            <td>No</td>
            <td style="padding:0px 50px 0px 50px">Kategori</td>
            <td style="width:10%">Gambar</td>
            <td>Nama Produk</td>
            <td>Harga</td>
            <td style="padding:0px 50px 0px 50px">Deskripsi</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
          		if($results!=FALSE){
                $i= 1;
          			foreach ($results as $rows) {
          				?>
          				<tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $rows->nama_kategori ?></td>
                    <td><?php if($rows->gambar_produk!= "") {
                      ?>
                      <img src="<?php echo base_url($rows->gambar_produk)?>"class="img-responsive">
                      <?php
                    } ?></td>
                    <td><?php echo $rows->nama_produk ?></td>
                    <td>Rp <?php echo number_format($rows->harga_produk) ?></td>
                    <td><?php echo $rows->deskripsi_produk ?></td>
                    <td>
                      <a  class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/edit-produk/'.$rows->id_produk)?>">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/delete-produk/'.$rows->id_produk)?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
          				<?php
                  $i++;
          			}
          		}
          	?>
          	<?php
          		echo $links;
          	?>

        </tbody>
  </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
