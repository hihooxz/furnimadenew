<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Riwayat Desain Produk
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>

    <div class="col-md-8 form-group form-impian table-responsive">
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama Desain</td>
            <td>Bahan</td>
            <td>Finishing</td>
            <td>Deskripsi</td>
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
                    <td><?php echo $rows->judul_desain ?></td>
                    <td><?php echo $rows->bahan_desain ?></td>
                    <td><?php echo $rows->finishing_desain ?></td>
                    <td><?php echo substr($rows->deskripsi_desain, 0,50) ?></td>
                    <td>
                      <a  class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/lihat-desain/'.$rows->id_desain_produk)?>">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a class="btn btn-default dropdown-toggle" href="<?php echo base_url($this->uri->segment(1).'/delete-desaom/'.$rows->id_desain_produk)?>">
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
