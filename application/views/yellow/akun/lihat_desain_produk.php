<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Riwayat Desain Produk
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8">
      <div class="form-group form-impian table-responsive">
        <table class="table table-striped profile" style="border:1px solid #ddd">
          <thead>
            <tr>
              <td>Nama Desain</td>
              <td>Bahan</td>
              <td>Finishing</td>
              <td>Deskripsi</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $result['judul_desain']?></td>
              <td><?php echo $result['bahan_desain']?></td>
              <td><?php echo $result['finishing_desain']?></td>
              <td><?php echo $result['deskripsi_desain']?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h3>Gambar Desain</h3>
      <div class="form-group form-impian table-responsive">
        <table class="table table-striped profile" style="border:1px solid #ddd">
          <thead>
            <tr>
              <td width="70%">Gambar</td>
              <td>Jenis</td>
            </tr>
          </thead>
          <tbody>
            <?php 
              if($results!=FALSE){
                foreach ($results as $rows) {
                  ?>
                  <tr>
                    <td>
                      <img src="<?php echo base_url($rows->url_desain_produk)?>" height="200px">
                    </td>
                    <td>
                      <?php
                        if($rows->jenis_desain == 0)
                          echo "Gambar Dimensi Produk";
                        else if($rows->jenis_desain == 1)
                          echo "Gambar 3D Produk";
                      ?>
                    </td>
                  </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
