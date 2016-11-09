<div class="container">
  <div class="col-sm-2 col-md-2 sidebar">
          <?php $this->load->view('default/akun_supplier/sidebar');?>
  </div>
  <div class="col-md-10">
          <h3>Daftar Pesanan</h3><br />
          <?php
          if($this->session->flashdata('result') == TRUE){
            echo "Kamu telah berhasil memberi harga, silahkan tunggu konfirmasi dari kami";
          }
           ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>E-mail</th>
                <th>No Ponsel</th>
                <th>Lokasi</th>
                <th>Deskripsi Furniture</th>
                <th>Nama Produk</th>
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
                        <td><?php echo $rows->nama_lengkap ?></td>
                        <td><?php echo $rows->email?></td>
                        <td><?php echo $rows->no_hp ?></td>
                        <td><?php echo $rows->alamat?></td>
                        <td><?php echo $rows->deskripsi_produk?></td>
                        <td><?php echo $rows->nama_produk?></td>
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
                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#berihargaForm<?php echo $i;?>" style="margin-bottom:5px;">Beri Harga</button>
                            <a href="<?php echo base_url('akun-supplier/lihat-detail-produk/'.$rows->id_buat_produk)?>"><button type="button" class="btn btn-warning" >Lihat Detail</button></a>
                        </td>
                      </tr>
                      <!-- Modal -->
  <div class="modal fade" id="berihargaForm<?php echo $i;?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Beri Harga</h4>
        </div>
        <div class="modal-body">
          <?php
            echo form_open(base_url('akun-supplier/beri-harga/'.$rows->id_buat_produk));
          ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Harga" name="harga">
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
            <input class="form-control" type="text" placeholder="Waktu Pengerjaan (hari)" name="waktupengerjaan">
          </div>
          <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-warning">

          </div>
          <?php
            echo form_close();
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
                      <?php
                      $i++;
                    }
                  }
                ?>
            </tbody>
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>E-mail</th>
                <th>No Ponsel</th>
                <th>Lokasi</th>
                <th>Deskripsi Furniture</th>
                <th>Nama Produk</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>

  </div>
</div>
