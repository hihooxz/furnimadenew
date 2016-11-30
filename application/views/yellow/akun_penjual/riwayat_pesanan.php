<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
        Riwayat Pesanan
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun_penjual/nav_penjual');?>
    </div>
    <div class="col-md-8 form-group form-impian table-responsive">
      <div class="row">
      </div>
      <table class="table table-striped profile" style="border:1px solid #ddd">
        <thead>
          <tr>
            <td>No</td>
            <td>Kode Pesanan</td>
            <td>Jumlah Barang</td>
            <td>Total</td>
            <td style="padding:0px 50px 0px 50px">Tanggal Pesan</td>
            <td>Status</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
        <?php
          if($results!=FALSE){
            $i = 1;
            foreach ($results as $rows) {
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $rows->id_pesanan ?></td>
                <td>
                  <?php
                    echo $this->mp->totalPesanan($rows->id_pesanan);
                  ?>
                </td>
                <td>Rp <?php echo number_format($rows->total)?></td>
                <td><?php echo date('d M Y',strtotime($rows->tanggal_pesan))?></td>
                <td>
                  <?php
                    if($rows->status_pesanan == 0)
                      echo "Pending";
                    if($rows->status_pesanan == 1)
                      echo "Proses";
                    else if($rows->status_pesanan == 2)
                      echo "Terkirim";
                  ?>
                </td>
                <td>
                  <a href="<?php echo base_url($this->uri->segment(1).'/detail-pesanan/'.$rows->id_pesanan) ?>" title="Lihat Detail Pesanan">
                    <button class="btn btn-default dropdown-toggle">
                      <i class="fa fa-eye"></i>
                    </button>
                  </a>
                  <!-- <button class="btn btn-default dropdown-toggle">
                    <i class="fa fa-trash"></i>
                  </button>-->
                </td> 
              </tr>
              <?php
              $i++;
            }
          }
        ?>
        </tbody>
  </table>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
