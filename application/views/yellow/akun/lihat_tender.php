<div class="container" style="margin-bottom:70px">
  <div class="modal-title text-center" style="margin-bottom:25px">
      Lihat Tender
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <?php $this->load->view('yellow/akun/nav_member');?>
    </div>
    <div class="col-md-8 ">
      <div class="row">
      </div>
    <div class="form-group form-impian table-responsive">
          <table class="table table-striped profile" style="border:1px solid #ddd">
            <thead>
              <tr>
                <td>Judul Desain</td>
                <td width="20%">Gambar</td>
                <td>Keterangan</td>
                <td>Range Harga</td>
                <td>Tanggal Selesai</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
                    <tr>
                      <td><?php echo $result['judul_desain'];?></td>
                      <td>
                        <?php
                          $img = $this->mod->getDataWhere('gambar_desain','id_desain_produk',$result['id_desain_produk']);
                        ?>
                        <img class="img-responsive" src="<?php echo base_url($img['url_desain_produk']) ?>">
                      </td>
                      <td><?php echo substr($result['deskripsi_desain'],0,100)?></td>
                      <td><?php echo $result['range_harga'] ?></td>
                      <td><?php echo date('d M Y',strtotime($result['tanggal_selesai_tender'])) ?></td>
                      <td>
                        <?php
                          if($result['status_tender'] == 0){
                            echo "Terbuka";
                          }
                          else echo "Tutup";
                        ?>
                      </td>
                    </tr>
            </tbody>
      </table>
        </div>
        <div class="form-group form-impian table-responsive">
          <table class="table table-striped profile" style="border:1px solid #ddd">
            <thead>
              <tr>
                <td>Penjual</td>
                <td>Pengerjaan</td>
                <td>Harga</td>
                <td>Bahan</td>
                <td>Keterangan</td>
                <td>Tanggal Bid</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php
                if($results!=FALSE){
                  foreach ($results as $rows) {
                    ?>
                    <tr>
                      <td><?php echo $rows->username?></td>
                      <td><?php echo $rows->lama_pengerjaan?></td>
                      <td><?php echo number_format($rows->harga)?></td>
                      <td><?php echo $rows->bahan?></td>
                      <td><?php echo $rows->keterangan?></td>
                      <td><?php echo date('d M Y',strtotime($rows->tanggal_tender_penjual))?></td>
                      <td>
                        <a href="<?php echo base_url($this->uri->segment(1).'/pemenang-tender/'.$rows->id_tender_penjual)?>" title="Jadikan Pemenang" onclick="return confirm('Apakah anda yakin jadikan <?php echo $rows->username;?> sebagai pemenang?')">
                          <button class="btn btn-default dropdown-toggle">
                            <i class="fa fa-check"></i>
                          </button>
                        </a>
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
