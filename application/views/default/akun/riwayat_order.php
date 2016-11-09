<div class="container">
  <div class="col-sm-2 col-md-2 sidebar">
          <?php $this->load->view('default/akun/sidebar');?>
  </div>
  <div class="col-md-10">
          <h3>Riwayat Pesanan</h3><br />
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Nama Produk</th>
                <th>Deskripsi Furniture</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  if($results!=FALSE){
                    $i = 1;
                    foreach ($results as $rows) {
                      ?>
                      <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $rows->username ?></td>
                        <td><?php echo $rows->nama_produk?></td>
                        <td><?php echo $rows->deskripsi_produk?></td>
                        <td><?php echo $rows->tanggal_buat?></td>
                        <td><?php echo $rows->tanggal_selesai?></td>
                        <td>
                          <?php
                            if($rows->status_buat == 1)
                              echo "Pending";
                            if($rows->status_buat == 2)
                              echo "Proses";
                            if($rows->status_buat == 3)
                              echo "Selesai";
                            if($rows->status_buat == 4)
                             echo "dibatalkan";
                          ?>
                        </td>
                        <td><a href="<?php echo base_url('akun/lihat_progress/'.$rows->id_buat_produk)?>"><button type="button" class="btn btn-warning" >Lihat Progress</button></a>


                      <?php
                      $i++;
                    }
                  }
                ?>
            </tbody>
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Supplier</th>
                <th>Nama Produk</th>
                <th>Deskripsi Furniture</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
  </div>
</div>
