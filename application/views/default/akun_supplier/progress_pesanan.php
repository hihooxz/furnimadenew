<div class="container">
  <div class="col-sm-2 col-md-2 sidebar">
          <?php $this->load->view('default/akun_supplier/sidebar');?>
  </div>
  <div class="col-md-10">
          <h3>Progress Pesanan</h3><br />
          <?php
          if($this->session->flashdata('result') == TRUE){
            echo "Kamu telah berhasil menambahkan progress, silahkan tunggu konfirmasi dari kami";
          }
           ?>
          <table class="table table-striped">
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
                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#berihargaForm<?php echo $i;?>" style="margin-bottom:5px;">Laporkan</button>
                          <!--  <a href="<?php echo base_url('akun-supplier/lihat-detail-produk/'.$rows->id_buat_produk)?>"><button type="button" class="btn btn-warning" >Lihat Detail</button></a>
                        </td>
                      </tr>
                      <!-- Modal -->
  <div class="modal fade" id="berihargaForm<?php echo $i;?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Progress</h4>
        </div>
        <div class="modal-body">
          <?php
            echo form_open_multipart(base_url('akun-supplier/tambah_progress/'.$rows->id_buat_produk));
          ?>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-book fa-fw"></i></span>
            <textarea class="form-control" rows="3" placeholder="Progress" name="progress"></textarea>
          </div>
          <div class="input-group margin-bottom-sm form-group">
            <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
            <input class="form-control" type="file"  name="userfile">
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
